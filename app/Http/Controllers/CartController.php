<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Clientes;
use Cart;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        //dd($products);
        return view('shop')->withTitle('Byte Teach')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();

        foreach ($cartCollection as $item) {
            $product = Product::find($item->id);
            $item->attributes->foto = $product->foto;
        }
        //dd($cartCollection);
        return view('cart')->withTitle('Byte Teach')->with(['cartCollection' => $cartCollection]);
    }
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'foto' => $request->foto,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function checkout(){
        return view('checkout');
    }

    public function storeVenta(){
        // Accede al contenido del carrito
        $cartItems = Cart::getContent();

        // Crea una nueva venta
        $venta = new Venta();

        $venta->total = Cart::getTotal();

        // Guarda la venta en la base de datos
        $venta->save();

        // Asocia los productos del carrito con la venta
        foreach ($cartItems as $item) {
            $venta->products()->attach($item->id, ['cantidad' => $item->quantity]);
        }

        // Vacía el carrito después de guardar la venta
        \Cart::clear();

        // Redirige o muestra un mensaje de éxito al x|cliente
        return redirect()->back()->with('success_msg', 'La venta se ha registrado correctamente.');
    }
}



