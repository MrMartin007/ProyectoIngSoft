<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('marca')->paginate();
        $marcas = Marca::pluck('nombre_m', 'id');

        return view('producto.index', compact('productos','marcas'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $marcas = Marca::pluck('nombre_m', 'id');
        return view('producto.create', compact('producto','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try{
            $request->validate([
                'nombre' => 'required',
                'precio' => 'required',
                'cantidad' => 'required',
                'foto' => 'required|image',
                'marcas_id' => 'required',
            ]);
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $rutaFoto = $foto->store('productos', 'public');
            }

            $marca = new Producto();
            $marca->nombre = $request->nombre;
            $marca->precio = $request->precio;
            $marca->cantidad = $request->cantidad;
            $marca->foto = $rutaFoto ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
            $marca->marcas_id = $request->marcas_id;
            $marca->save();

    }catch (QueryException $queryException){
    Log::debug($queryException->getMessage());
    return redirect()->route('productos.index')->with('alertaQery', 'noo');
    } catch (\Exception $exception){

    Log::debug($exception->getMessage());

    return redirect()->route('productos.index')->with('alertaa', 'sii');
}
    return redirect()->route('productos.index')->with('productoGuardado', 'Guardado');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $marcas = Marca::pluck('nombre_m', 'id'); // Obtener todas las marcas disponibles
        return view('producto.edit', compact('producto', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $rutaFoto = $foto->store('productos', 'public');
        }


        return redirect()->route('productos.index')
            ->with('productoModificado', 'Modificado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    
}
