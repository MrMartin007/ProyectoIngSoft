@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Personal de la Empresa</h1>
@stop

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
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
										<th>Apellido</th>
										<th>Dpi</th>
										<th>Area</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->apellido }}</td>
											<td>{{ $empleado->dpi }}</td>
											<td>{{ $empleado->area }}</td>

                                            <td>
                                                <form action="{{ route('empleados.destroy',$empleado->id) }}" method="POST" class="Alert-eliminar">
                                                    <a class="btn btn-sm btn-success" href="{{ route('empleados.edit',$empleado->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('EmpleadoModificado')=='Modificado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Empleado Modificado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('EmpleadoGuardado')=='Guardado')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Emplead Guardado',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if(session('EmpleadoEliminado')=='Eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se elimino el Empleado exitosamente',
                'success'
            )
        </script>
    @endif
    <script>
        $('.Alert-eliminar').submit(function (e){
            e.preventDefault();

            Swal.fire({
                title: '¿Esta seguro que desea eliminar el Empleado?',
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
                title: 'No se puede eliminar el Empleado ',
                text:'Este Empleado ya esta ligado a  una venta, por ende es imposible eliminarlo',
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
                title: 'No se pudo agregar El Empleado',
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
                title: 'No se pudo agregar El Empleado',
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
