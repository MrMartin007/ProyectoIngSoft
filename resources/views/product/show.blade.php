@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalles del Producto</h1>
@stop
@section('template_title')
    {{ $product->name ?? "{{ __('Show') Product" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $product->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Details:</strong>
                            {{ $product->details }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping Cost:</strong>
                            {{ $product->shipping_cost }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $product->foto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
