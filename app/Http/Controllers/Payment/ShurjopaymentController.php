<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CustomerPackage;
use App\Models\SellerPackage;
use App\Models\CombinedOrder;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\CustomerPackageController;
use App\Http\Controllers\SellerPackageController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CheckoutController;
use Session;

use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class ShurjopaymentController extends Controller{

    public function pay(Request $request)
    {
        $amount = 0;
        if(Session::has('payment_type')){
            if(Session::get('payment_type') == 'cart_payment'){
                $combined_order = CombinedOrder::findOrFail(Session::get('combined_order_id'));
                $amount = round($combined_order->grand_total);
            }
            elseif (Session::get('payment_type') == 'wallet_payment') {
                $amount = round(Session::get('payment_data')['amount']);

            }
            elseif (Session::get('payment_type') == 'customer_package_payment') {
                $customer_package = CustomerPackage::findOrFail(Session::get('payment_data')['customer_package_id']);
                $amount = round($customer_package->amount);
            }
            elseif (Session::get('payment_type') == 'seller_package_payment') {
                $seller_package = SellerPackage::findOrFail(Session::get('payment_data')['seller_package_id']);
                $amount = round($seller_package->amount);
                dd("prince4");
            }
        }

        Session::put('amount', $amount);

        $order=Order::where('id',$combined_order->id)->first();
        $user=User::where('id',$combined_order->user_id)->first();
        $shipping_address=json_decode($order->shipping_address);

        $info = array( 
            'currency' => "BDT",
            'amount' => $amount, 
            'order_id' => $order->code, 
            'discsount_amount' =>$order->coupon_discount, 
            'disc_percent' =>0, 
            'client_ip' => $request->ip(), 
            'customer_name' => $shipping_address->name, 
            'customer_phone' => $shipping_address->phone, 
            'email' => $shipping_address->email, 
            'customer_address' => $shipping_address->address, 
            'customer_city' => $shipping_address->city, 
            'customer_state' => $shipping_address->state, 
            'customer_postcode' => $shipping_address->postal_code, 
            'customer_country' => "BD",
            'value1' => "Order111",
        );

        $shurjopay_service = new ShurjopayController();
        return $shurjopay_service->checkout($info);
    }


    public function verifyPayment(Request $request)
    {
       
        $order_id = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data = $shurjopay_service->verify($order_id);
   
        $payment_type = Session::get('payment_type');

        if ($payment_type == 'cart_payment') {
            return (new CheckoutController)->checkout_done(Session::get('combined_order_id'), $data);
        }
        if ($payment_type == 'wallet_payment') {
            return (new WalletController)->wallet_payment_done(Session::get('payment_data'), $data);
        }
        if ($payment_type == 'customer_package_payment') {
            return (new CustomerPackageController)->purchase_payment_done(Session::get('payment_data'), $data);
        }
        if($payment_type == 'seller_package_payment') {
            return (new SellerPackageController)->purchase_payment_done(Session::get('payment_data'), $data);
        }

    }
}