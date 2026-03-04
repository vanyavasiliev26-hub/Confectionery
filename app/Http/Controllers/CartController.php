<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cart.index', [
            'cart' => session()->get('cart', [])
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Недостаточно товара на складе');
        }

        $cart = session()->get('cart', []);
        $productId = $product->id;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $request->quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Товар добавлен в корзину');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (!isset($cart[$productId])) {
            return back()->with('error', 'Товар не найден в корзине');
        }

        $product = Product::find($productId);
        
        if (!$product || $product->stock < $request->quantity) {
            return back()->with('error', 'Недостаточно товара на складе');
        }

        $cart[$productId]['quantity'] = $request->quantity;
        session()->put('cart', $cart);

        return back()->with('success', 'Количество обновлено');
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|integer']);

        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        if (!isset($cart[$productId])) {
            return back()->with('error', 'Товар не найден в корзине');
        }

        unset($cart[$productId]);
        session()->put('cart', $cart);

        return back()->with('success', 'Товар удален из корзины');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Корзина очищена');
    }
}