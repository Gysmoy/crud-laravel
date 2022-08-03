@extends('layouts.app')

@section('template_title')
{{ $person->name ?? 'Ver persona' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Ver persona</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('people.index') }}"> Volver</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Tipo de documento:</strong>
                        {{ $person->type_doc }}
                    </div>
                    <div class="form-group">
                        <strong>Número de documento:</strong>
                        {{ $person->number_doc }}
                    </div>
                    <div class="form-group">
                        <strong>Apellidos:</strong>
                        {{ $person->lastnames }}
                    </div>
                    <div class="form-group">
                        <strong>Nombres:</strong>
                        {{ $person->names }}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de nacimiento:</strong>
                        @if ($person->birthdate != null)
                        {{ $person->birthdate }}
                        @else
                        <i>Sin fecha de nacimiento</i>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Correo electrónico:</strong>
                        @if ($person->email != null)
                        {{ $person->email }}
                        @else
                        <i>No tiene correo</i>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        @if ($person->phone != null)
                        {{ $person->phone }}
                        @else
                        <i>No tiene teléfono</i>
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Nacionalidad:</strong>
                        @if ($person->_country != null)
                        {{ $person->country->country }}
                        @else
                        <i>Sin nacionalidad</i>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection