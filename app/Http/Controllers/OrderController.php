<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Stripe;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderController extends Controller
{
    public function cash_order()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = session()->get('cart');
        $user = Auth::user();

        // Tạo một bản ghi Order mới
        $newOrder = new Order();
        $newOrder->user_id = $user->id;
        $newOrder->name = $user->name;
        $newOrder->email = $user->email;
        $newOrder->phonenumber = $user->phonenumber;
        $newOrder->address = $user->address;
        $newOrder->payment_status = env('PAYMENT_UNPAID');
        $newOrder->delivery_status = env('PREPARING_GOODS');
        $newOrder->save();

        // Thêm các sản phẩm từ giỏ hàng vào bảng OrderDetail
        foreach ($cart as $item) {
            $product = Product::find($item['productId']);
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $newOrder->id;
            $orderDetail->product_id = $item['productId'];
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->price = $item['price'];
            $orderDetail->image = $item['image'];
            $orderDetail->save();
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

        $cart = session()->get('cart');
        $user = Auth::user();

        // Tạo một bản ghi Order mới
        $newOrder = new Order();
        $newOrder->user_id = $user->id;
        $newOrder->name = $user->name;
        $newOrder->email = $user->email;
        $newOrder->phonenumber = $user->phonenumber;
        $newOrder->address = $user->address;
        $newOrder->payment_status = env('PAYMENT_UNPAID');
        $newOrder->delivery_status = env('PREPARING_GOODS');
        $newOrder->session_id = $session->id;
        $newOrder->save();

        // Thêm các sản phẩm từ giỏ hàng vào bảng OrderDetail
        foreach ($cart as $item) {
            $product = Product::find($item['productId']);
            if ($product) {
                $product->quantity -= $item['quantity'];
                $product->save();
            }

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $newOrder->id;
            $orderDetail->product_id = $item['productId'];
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->price = $item['price'];
            $orderDetail->image = $item['image'];
            $orderDetail->save();
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
                $details = [
                    'greeting' => 'Hi - '.$order->name,
                    'firstline' =>'Your order is shipping',
                    'body'=> 'Your Order id: '.$order->id,
                    'lastline'=> 'Thank you for using our service!!!',
                ];
                Notification::send($order, new SendEmailNotification($details));
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
        // Lấy thông tin về order từ model Order
        $order = Order::findOrFail($id);

        // Lấy thông tin về order details từ model OrderDetail
        $orderDetails = OrderDetail::where('order_id', $id)->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('home.pdf',  compact('order', 'orderDetails')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('order.pdf');
    }

    public function orderDetails($id)
    {
        $order = Order::findOrFail($id);
        $orderDetails = OrderDetail::where('order_id', $id)->get();

        return view('home.order_details', compact('order', 'orderDetails'));
    }


}
