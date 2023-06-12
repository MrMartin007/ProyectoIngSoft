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
                                {{ __('Producto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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
										<th>Precio</th>
										<th>Cantidad</th>
                                        <th>Foto</th>
                                        <th>Marca</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->precio }}</td>
											<td>{{ $producto->cantidad }}</td>
                                            <td>
                                                @if($producto->foto)
                                                    <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto" width="100">
                                                @else
                                                    Sin imagen
                                                @endif
                                            </td>
                                            <td>{{ $producto->marca->nombre_m }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="Alert-eliminar">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }} </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('productoModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Producto Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('productoGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Producto Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('productoEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino el producto exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar el producto?',
                text: "Si presiona si se eliminara definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    @if(session('alerta')=='si')

        <script>
            Swal.fire({
                title: 'No se puede eliminar el producto ',
                text:'Este producto ya esta ligado a  una venta, por ende es imposible eliminarlo',
                width: 600,
                padding: '3em',
                color: '#050404',
                background: '#fff url(/images/trees.png)',
                backdrop: `#F82D23`
            })
        </script>
    @endif


        @if(session('alertaa')=='sii')

            <script>
                Swal.fire({
                    title: 'No se pudo agregar El producto',
                    width: 600,
                    padding: '3em',
                    color: '#050404',
                    background: '#fff url(/images/trees.png)',
                    backdrop: `#F82D23`
                })
            </script>
        @endif

        @if(session('alertaQery')=='noo')

            <script>
                Swal.fire({
                    title: 'No se pudo agregar El producto',
                    text:'Es un error de Base de datos',
                    width: 600,
                    padding: '3em',
                    color: '#050404',
                    background: '#fff url(/images/trees.png)',
                    backdrop: `#F82D23`
                })
            </script>
        @endif
    @stop
