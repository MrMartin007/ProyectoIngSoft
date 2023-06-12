@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles del Empleado</h1>
@stop

@section('template_title')
    {{ $empleado->name ?? "{{ __('Show') Empleado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $empleado->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Dpi:</strong>
                            {{ $empleado->dpi }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $empleado->area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
