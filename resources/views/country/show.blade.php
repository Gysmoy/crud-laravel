@extends('layouts.app')

@section('template_title')
    {{ $country->name ?? 'Ver pais' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver pais</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('countries.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pais:</strong>
                            {{ $country->country }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
