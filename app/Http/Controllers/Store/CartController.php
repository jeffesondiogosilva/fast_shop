<?php

namespace App\Http\Controllers\Store;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['sucess' => false, 'message' => 'fazer login']);
        }

        // Verifica se o carrinho já existe
        $cart = Cart::firstOrCreate([
            'customer_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->product_price
        ]);

        return response()->json(['success' => true, 'message' => 'Item adicionado ao carrinho']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCartQuantity($id)
    {
        // Buscar a quantidade de itens no carrinho do cliente
        $quantity = Cart::where('customer_id', $id)->get('quantity')->sum('quantity');        

        return response()->json([
            'success' => true,
            'quantity' => $quantity
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
