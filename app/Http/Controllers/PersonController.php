<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Country;
use App\Models\Response;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PersonController
 * @package App\Http\Controllers
 */
class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = new Response();
        try {
            $peopleJpa = Person::all();
            $peopleJpa = Person::select([
                    'people.*',
                    'countries.id AS country.id',
                    'countries.country AS country.country',
                    'countries.updated_at AS country.updated_at',
                    'countries.created_at AS country.created_at'
                ])
                -> leftjoin('countries', 'people._country', '=', 'countries.id')
                -> get();

            $people = array();
            foreach($peopleJpa as $personJpa) {
                $person = new Person();
                $person -> id = $personJpa -> id;
                $person -> type_doc = $personJpa -> type_doc;
                $person -> number_doc = $personJpa -> number_doc;
                $person -> lastnames = $personJpa -> lastnames;
                $person -> names = $personJpa -> names;
                $people[] = $person;
            }

            $response->setStatus(200);
            $response->setMessage('Operación correcta');
            $response->setData($people);
        } catch (\Throwable $th) {
            $response->setMessage($th->getMessage());
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = new Response();
        try {

            if (!in_array($request->type_doc, ['DNI', 'RUC', 'CE'])) {
                throw new Exception('type_doc debe ser DNI, RUC o CE', 1);
            }

            $personJpa = new Person();
            $personJpa->type_doc = $request->type_doc;
            $personJpa->number_doc = $request->number_doc;
            $personJpa->lastnames = $request->lastnames;
            $personJpa->names = $request->names;
            $personJpa->birthdate = $request->birthdate;
            $personJpa->email = $request->email;
            $personJpa->phone = $request->phone;
            $personJpa->_country = $request->_country;
            $personJpa->save();

            $response->setStatus(200);
            $response->setMessage('Operación correcta');
            $response->setData($personJpa -> toArray());
        } catch (\Throwable $th) {
            $response->setMessage($th->getMessage());
        } finally {
            return response(
                $response->toArray(),
                $response->getStatus()
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $response = new Response();
        try {
            if (!in_array($request->type_doc, ['DNI', 'RUC', 'CE'])) {
                throw new Exception('type_doc debe ser DNI, RUC o CE', 1);
            }

            $personJpa = Person::find($request->id);
            if ($personJpa == null) {
                throw new Exception('La persona que deseas editar no existe', 1);
            }
            $personJpa->type_doc = $request->type_doc;
            $personJpa->number_doc = $request->number_doc;
            $personJpa->lastnames = $request->lastnames;
            $personJpa->names = $request->names;
            $personJpa->birthdate = $request->birthdate;
            $personJpa->email = $request->email;
            $personJpa->phone = $request->phone;
            $personJpa->_country = $request->_country;
            $personJpa->save();

            $response->setStatus(200);
            $response->setMessage('Operación correcta');
            $response->setData($personJpa);
        } catch (\Throwable $th) {
            $response->setMessage($th->getMessage());
        } finally {
            return response(
                $response->toArray(),
                $response->getStatus()
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Person $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        request()->validate(Person::$rules);

        $person->update($request->all());

        return redirect()->route('people.index')
            ->with('success', 'Person updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $response = new Response();
        try {
            $personJpa = Person::find($request->id);
            if ($personJpa == null) {
                throw new Exception('La persona que deseas eliminar no existe', 1);
            }
            $personJpa->delete();
            $response->setStatus(200);
            $response->setMessage('Eliminado correctamente');
        } catch (\Throwable $th) {
            $response->setMessage($th->getMessage());
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }
}
