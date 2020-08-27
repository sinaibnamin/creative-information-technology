<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Invoice\Invoice;
use App\Model\Product\Product;
use Illuminate\Http\Request;
use Cart;
use App\Model\Client\Order;
use App\Model\Client\payment;
use Session;
use Mail;
use DB;

class OrderController extends Controller
{
    public function confirm_order(Request $request)
    {


//         return $request->all();
//         exit();

        $order = new Order();
        $order->first_name = $request->name;
        $order->last_name = $request->lastname;
        $order->phone_number = $request->phonenumber;
        $order->address = $request->address;
        $order->client_id = Session::get('client_id');
        $order->total_cost = Cart::priceTotal();
        $order->save();


        $cartProduct = Cart::content();
        foreach ($cartProduct as $v_cart) {
            $pinfo = Product::find($v_cart->id);
            $invoice = new Invoice();
            $invoice->order_id = $order->id;
            $invoice->client_id = Session::get('client_id');
            $invoice->product_id = $v_cart->id;
            $invoice->product_unit_price = $v_cart->price;
            $invoice->product_quantity = $v_cart->qty;
            //   $invoice->vendor_id          = $pinfo->vendor->id;
            $invoice->save();

        }

        $payment = new payment();
        $payment->order_id = $order->id;
        $payment->client_id = Session::get('client_id');
        $payment->payment_type = $request->payment;
        $payment->comment = $request->comment;
        $payment->save();


        Cart::destroy();


    }
}
