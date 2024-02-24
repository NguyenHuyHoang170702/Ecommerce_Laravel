<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Stripe;
use PDF;

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

        return view('home.success', compact('newOrder'));
    }

    public function stripe()
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        $line_items = [];
        foreach ($cart as $c){
            $line_items[] = [
                'price_data' => [
                    'currency' => 'vnd',
                    'product_data' => [
                        'name' => $c['title']
                    ],
                    'unit_amount' => $c['price']
                ],
                'quantity' => $c['quantity']
            ];
        }
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('stripeSuccess')."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('stripeCancel'),
        ]);

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
            $newOrder->session_id = $session->id;
            $newOrder->save();
        }
        return redirect()->away($session->url);
    }

    public function stripeSuccess(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sesionId = $request->get('session_id');
        $exitOrder = Order::all();
        foreach ($exitOrder as $order) {
            if($order->session_id == $sesionId){
                $order->payment_status = env('PAYMENT_PAID');
                $order->save();
            }
        }
        \Illuminate\Support\Facades\Session::forget('cart');
        return view('home.success');
    }

    public function stripeCancel()
    {
        return view('404');
    }

    public function getOrderForCustomer()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $data = Order::orderBy('created_at', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('home.order',compact('data'));
    }

    public function getAllOrder()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $data = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.showOrder',compact('data'));
    }

    public function Paid($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $order = Order::find($id);
        if($order != null){
            $order->payment_status = env('PAYMENT_PAID');
            $order->save();
            return redirect()->back()->with('message','Order status updated successfully');
        }
    }

    public function UnPaid($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $order = Order::find($id);
        if($order != null){
            $order->payment_status = env('PAYMENT_UNPAID');
            $order->save();
            return redirect()->back()->with('message','Order status updated successfully');
        }
    }

    public function Shipping($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $order = Order::find($id);
        if($order != null){
                $order->delivery_status = env('ON_DELIVERY');
                $order->save();
                return redirect()->back()->with('message','Order status shipping successfully');
        }
    }

    public function print_pdf($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $data = Order::find($id);
        $pdf = PDF::loadView('home.pdf',compact('data'));
        return $pdf->download('order_details.pdf');
    }

}
