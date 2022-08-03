@extends('layouts.app')

@section('template_title')
Personas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Personas') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Agregar') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead">
                                <tr>
                                    <th rowspan="2">ID</th>

                                    <th colspan="2">Documento</th>
                                    <th rowspan="2">Apellidos</th>
                                    <th rowspan="2">Nombres</th>
                                    <th rowspan="2">Fecha de nacimiento</th>
                                    <th rowspan="2">Correo electrónico</th>
                                    <th rowspan="2">Teléfono</th>
                                    <th rowspan="2">Nacionalidad</th>

                                    <th rowspan="2">Acción</th>
                                </tr>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Número</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $person)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $person->type_doc }}</td>
                                    <td>{{ $person->number_doc }}</td>
                                    <td>{{ $person->lastnames }}</td>
                                    <td>{{ $person->names }}</td>
                                    <td>
                                        @if ($person->birthdate != null)
                                        {{ $person->birthdate }}
                                        @else
                                        <i>Sin fecha de nacimiento</i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($person->email != null)
                                        {{ $person->email }}
                                        @else
                                        <i>No tiene correo</i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($person->phone != null)
                                        {{ $person->phone }}
                                        @else
                                        <i>No tiene teléfono</i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($person->_country != null)
                                        {{ $person->country->country }}
                                        @else
                                        <i>Sin nacionalidad</i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('people.destroy',$person->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('people.show',$person->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('people.edit',$person->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $people->links() !!}
        </div>
    </div>
</div>
@endsection