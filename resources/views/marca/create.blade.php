@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Marca</h1>
@stop

@section('template_title')
    {{ __('Create') }} Marca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Marca</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('marcas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('marca.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
