@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Marca</h1>
@stop

@section('template_title')
    {{ __('Update') }} Marca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Marca</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('marcas.update', $marca->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('marca.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection