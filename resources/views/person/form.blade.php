<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Tipo de documento') }}
            {{ Form::select('type_doc', $docs, $person->type_doc, ['class' => 'form-control' . ($errors->has('type_doc') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de documento']) }}
            {!! $errors->first('type_doc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Número de documento') }}
            {{ Form::text('number_doc', $person->number_doc, ['class' => 'form-control' . ($errors->has('number_doc') ? ' is-invalid' : ''), 'placeholder' => 'Número de documento']) }}
            {!! $errors->first('number_doc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos *') }}
            {{ Form::text('lastnames', $person->lastnames, ['class' => 'form-control' . ($errors->has('lastnames') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) }}
            {!! $errors->first('lastnames', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombres *') }}
            {{ Form::text('names', $person->names, ['class' => 'form-control' . ($errors->has('names') ? ' is-invalid' : ''), 'placeholder' => 'Nombres']) }}
            {!! $errors->first('names', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de nacimiento') }}
            {{ Form::date('birthdate', $person->birthdate, ['class' => 'form-control' . ($errors->has('birthdate') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de nacimiento (opcional)']) }}
            {!! $errors->first('birthdate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo electrónico') }}
            {{ Form::text('email', $person->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico (opcional)']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Teléfono') }}
            {{ Form::text('phone', $person->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono (opcional)']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nacionalidad') }}
            {{ Form::select('_country', $countries, $person->_country, ['class' => 'form-control' . ($errors->has('_country') ? ' is-invalid' : ''), 'placeholder' => 'Nacionalidad (opcional)']) }}
            {!! $errors->first('_country', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>