@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles de la Marca</h1>
@stop
@section('template_title')
    {{ $marca->name ?? "{{ __('Show') Marca" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Marca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('marcas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $marca->nombre }}
                        </div>
                        <strong>Foto:</strong>
                        @if($marca->foto)
                            <img src="{{ asset('storage/' . $marca->foto) }}" alt="Foto">
                        @else
                            Sin imagen
                        @endif
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
