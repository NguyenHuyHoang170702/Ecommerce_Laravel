<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add_shoppingCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [];
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'title' => $product->title,
                'quantity' => 1,
                'price' => $product->discount_price,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function show_shopping_cart()
    {
        $cart = session()->get('cart');

        if (!$cart || empty($cart)) {
            return view('home.user');
        }

        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['quantity'] * $item['price'];
        }

        return view('home.shopping_cart', compact('cart', 'totalQuantity', 'totalPrice'));
    }

}
