<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class MarcaController
 * @package App\Http\Controllers
 */
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(5);

        return view('marca.index', compact('marcas'))
            ->with('i', (request()->input('page', 1) - 1) * $marcas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = new Marca();
        return view('marca.create', compact('marca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'nombre_m' => 'required',
            'foto' => 'required|image',
        ]);

        // Carga de la foto y asignación de la ruta a la entidad "Marca"
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $rutaFoto = $foto->store('marcas', 'public');
        }

        // Creación de la entidad "Marca" con los datos ingresados
        $marca = new Marca();
        $marca->nombre_m = $request->nombre_m;
        $marca->foto = $rutaFoto ?? null; // Asignación de la ruta de la foto o null si no se cargó ninguna foto
        $marca->save();

        }catch (QueryException $queryException){
            Log::debug($queryException->getMessage());
            return redirect()->route('marcas.index')->with('alertaQery', 'noo');
        } catch (\Exception $exception){

            Log::debug($exception->getMessage());

            return redirect()->route('marcas.index')->with('alertaa', 'sii');
        }
        return redirect()->route('marcas.index')->with('MarcaGuardado', 'Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);

        return view('marca.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);

        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Marca $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        request()->validate(Marca::$rules);

        $marca->update($request->all());

        return redirect()->route('marcas.index')
            ->with('MarcaModificado', 'Modificado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
        $marca = Marca::find($id)->delete();

        return redirect()->route('marcas.index')
            ->with('MarcaEliminado', 'Eliminado');
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return redirect()->route('marcas.index')
                ->with('alerta','sii');
        }
    }
}
