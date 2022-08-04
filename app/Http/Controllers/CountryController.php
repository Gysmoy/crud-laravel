<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Response;
use Exception;
use Illuminate\Http\Request;

/**
 * Class CountryController
 * @package App\Http\Controllers
 */
class CountryController extends Controller
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
            $countriesJpa = Country::all();

            $response->setStatus(200);
            $response->setMessage('Operación correcta');
            $response->setData($countriesJpa);
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
            $countryJpa = new Country();
            $countryJpa->country = $request->country;
            $countryJpa->save();

            $response->setStatus(200);
            $response->setMessage('El país ha sido agregado correctamente');
            $response->setData($countryJpa);
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
        $country = Country::find($id);

        return view('country.show', compact('country'));
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
            $countryJpa = Country::find($request->id);
            if ($countryJpa == null) {
                throw new Exception('El pais que deseas editar no existe', 1);
            }
            $countryJpa->country = $request->country;
            $countryJpa->save();

            $response->setStatus(200);
            $response->setMessage('El país ha sido actualizado correctamente');
            $response->setData($countryJpa);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        request()->validate(Country::$rules);

        $country->update($request->all());

        return redirect()->route('countries.index')
            ->with('success', 'Country updated successfully');
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
            $countryJpa = Country::find($request->id);
            if ($countryJpa == null) {
                throw new Exception('La persona que deseas eliminar no existe', 1);
            }
            $countryJpa->delete();
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
