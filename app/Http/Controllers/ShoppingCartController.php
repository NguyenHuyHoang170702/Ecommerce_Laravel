<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function add_shoppingCart(Request $request,$id)
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
            if($request->count != null){
                $cart[$id] = [
                    'id' => $id,
                    'title' => $product->title,
                    'quantity' => $request->count,
                    'price' => $product->discount_price,
                    'image' => $product->image,
                ];
            }else{
                $cart[$id] = [
                    'id' => $id,
                    'title' => $product->title,
                    'quantity' => 1,
                    'price' => $product->discount_price,
                    'image' => $product->image,
                ];
            }

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

    public function plus($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Added a Product to shopping cart successfully');
    }

    public function minus($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Minus a Product to shopping successfully');
    }

    public function delete($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        if($cart == null){
            return redirect('/');
        }

        return redirect()->back()->with('success', 'Product deleted to shopping cart successfully');
    }

    public function summary()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = session()->get('cart');
        $user = Auth::user();
        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['quantity'] * $item['price'];
        }
        return view('home.summary', compact('cart', 'user','totalPrice','totalQuantity'));
    }


}
