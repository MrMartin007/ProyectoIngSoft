<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Proveedore;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::with('marca')->paginate(5);
        $marcas = Marca::pluck('nombre_m', 'id');
        return view('proveedore.index', compact('proveedores','marcas'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        $marcas = Marca::pluck('nombre_m', 'id');
        return view('proveedore.create', compact('proveedore','marcas'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { try{
        request()->validate(Proveedore::$rules);

        $proveedore = Proveedore::create($request->all());
    }catch (QueryException $queryException){
        Log::debug($queryException->getMessage());
        return redirect()->route('proveedores.index')->with('alertaQery', 'noo');
    } catch (\Exception $exception){

        Log::debug($exception->getMessage());

        return redirect()->route('proveedores.index')->with('alertaa', 'sii');
    }
        return redirect()->route('proveedores.index')->with('ProveedorGuardado', 'Guardado');
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $proveedore = Proveedore::find($id);
        $marcas = Marca::pluck('nombre_m', 'id'); // Obtener todas las marcas disponibles
        return view('proveedore.edit', compact('proveedore', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());
        return redirect()->route('proveedores.index')
            ->with('ProveedorModificado', 'Modificado');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
        $proveedore = Proveedore::find($id)->delete();

        return redirect()->route('proveedores.index')
            ->with('ProveedorEliminado', 'Eliminado');

}catch (\Exception $exception){
    Log::debug($exception->getMessage());
    return redirect()->route('proveedores.index')
        ->with('alerta','sii');
}
    }
}
