@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Producto</h1>
@stop

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>Linea</th>
										<th>Detalles</th>
										<th>Precio</th>
										<th>Precio Costo</th>
										<th>Descripcion</th>
										<th>Foto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->slug }}</td>
											<td>{{ $product->details }}</td>
											<td>{{ $product->price }}</td>
											<td>{{ $product->shipping_cost }}</td>
											<td>{{ $product->description }}</td>
                                            <td><img src="{{ asset('storage/' . $product->foto) }}" alt="Foto" width="75"></td>


                                            <td>
                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
