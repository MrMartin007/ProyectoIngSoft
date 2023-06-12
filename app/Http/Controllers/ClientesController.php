<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\venta;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Clientes;
use Cart;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClientesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('clientes.create', compact('cliente'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = Cliente::create($request->all());
        $clienteId = $clientes->id;
        // Accede al contenido del carrito
        $cartItems = Cart::getContent();

        // Crea una nueva venta
        $venta = new Venta();
        $venta->total = Cart::getTotal();
        $venta->cliente_id = $clienteId; // Asigna el ID del cliente a la venta
        $venta->save();

        // Asocia los productos del carrito con la venta
        foreach ($cartItems as $item) {
            $venta->products()->attach($item->id, ['cantidad' => $item->quantity]);
        }
        $cliente = $venta->cliente;
        // Vacía el carrito después de guardar la venta
        \Cart::clear();

        return redirect()->route('checkout')
            ->with('success_msg', 'La venta se ha registrado correctamente.');
    }
}
