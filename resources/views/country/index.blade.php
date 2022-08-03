@extends('layouts.app')

@section('template_title')
Paises
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Paises') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('countries.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                    <th rowspan="2">Pais</th>

                                    <th colspan="2">Fecha</th>

                                    <th rowspan="2">Acción</th>
                                </tr>
                                <tr>
                                    <th>Actualización</th>
                                    <th>Creación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $country->country }}</td>

                                    <td>{{ $country->updated_at }}</td>
                                    <td>{{ $country->created_at }}</td>

                                    <td>
                                        <form action="{{ route('countries.destroy',$country->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('countries.show',$country->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('countries.edit',$country->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
            {!! $countries->links() !!}
        </div>
    </div>
</div>
@endsection