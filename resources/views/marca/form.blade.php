<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_m') }}
            {{ Form::text('nombre_m', $marca->nombre_m, ['class' => 'form-control' . ($errors->has('nombre_m') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre_m', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::file('foto', ['class' => 'form-control-file' . ($errors->has('foto') ? ' is-invalid' : '')]) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
