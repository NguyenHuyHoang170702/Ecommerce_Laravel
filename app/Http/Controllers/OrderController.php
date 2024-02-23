<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function cash_order()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = session()->get('cart');
        $user = Auth::user();

        foreach ($cart as $c){
            $newOrder = new Order();

            $newOrder->user_id = $user->id;
            $newOrder->name = $user->name;
            $newOrder->email = $user->email;
            $newOrder->phonenumber = $user->phonenumber;
            $newOrder->address = $user->address;

            $newOrder->product_id = $c['id'];
            $newOrder->product_title = $c['title'];
            $newOrder->quantity = $c['quantity'];
            $newOrder->price = $c['price'];
            $newOrder->image = $c['image'];

            $newOrder->payment_status = env('PAYMENT_UNPAID');
            $newOrder->delivery_status = env('PREPARING_GOODS');
            $newOrder->save();
        }
        \Illuminate\Support\Facades\Session::forget('cart');
        return view('home.success');
    }
}
