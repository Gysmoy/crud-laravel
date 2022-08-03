@extends('layouts.app')

@section('template_title')
    {{ $country->name ?? 'Show Country' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Country</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('countries.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Country:</strong>
                            {{ $country->country }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
