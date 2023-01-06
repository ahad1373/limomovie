<?php

namespace App\Http\Controllers\profile;

use App\helpers\cart\Cart;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        $cart = Cart::instance('webtop');
        $cartitems = $cart->all();


        if ($cartitems->count()){
            $price = $cartitems->sum(function ($cart){
                return  $cart['product']->price * $cart['quantity'];
            });
        }

        $orderitems = $cartitems->mapWithKeys(function ($cart){
            return [$cart['product']->id =>['quantity' => $cart['quantity']]];
        });

        $order =  auth()->user()->orders()->create([
            'status' => 'unpaid',
            'price' => $price ,
            'address_id' => $request->address_id
        ]);

        $order->products()->attach($orderitems);
        $items = $cartitems->all();
        $orders = auth()->user()->orders;


        $address = auth()->user()->address()->get();
        $address= $address->where('id' , $request->address_id)->first();
        $city = City::query();
        $state = State::query();
        return view('home.shopping.shopping' , compact('orders' , 'items' , 'address' , 'city' , 'state'   ));
    }

    public function store()
    {

    }

    public function Details(Order $order)
    {
         $this->authorize('view' , $order);
        return view('profile.order-details' , compact('order'));
    }



    public function payment(Order $order)
    {
        $this->authorize('view' , $order);
        $invoice = (new Invoice)->amount(1000);
        return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function($driver, $transactionId) use ($order,$invoice) {
            $order->payments()->create([
                'resNumber' => $invoice->getUuid(),
            ]);
        })->pay()->render();
    }



}
