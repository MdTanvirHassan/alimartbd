<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Order; 
use App\Models\Address; 
use App\Models\User; 
use App\Models\Consignment; 

class SteadfastCourierController extends Controller
{
 
    public $base_url = "https://portal.steadfast.com.bd/api/v1";
    
    public function index(Request $request){
        $this->issueToken();
        $this->create_order($request->id);
    }

    public function issueToken(){
        $url = $this->base_url;
        $apiKey = env("Steadfast_Api_Key");
        $secretKey = env("Steadfast_Secret_Key");

        $data = array(
            'key' => 'value'
        );

        $dataJson = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Api-Key: ' . $apiKey,
            'Secret-Key: ' . $secretKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if ($response === false) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            $responseData = json_decode($response, true);
        }
        curl_close($ch);
    }

    public function create_order($order_id){

        $url = 'https://portal.steadfast.com.bd/api/v1/create_order';

        $apiKey = env("Steadfast_Api_Key");
        $secretKey = env("Steadfast_Secret_Key");

        $order = Order::where('id',$order_id)->first();
        $Recipient = User::where('id',$order->user_id)->first();
        $shipping_address = json_decode($order->shipping_address);

        $data = array(
            'invoice' => $order->code,
            'recipient_name' => $Recipient->name,
            'recipient_phone' => $Recipient->phone,
            'recipient_address' => $shipping_address->address,
            'cod_amount' => $order->grand_total,
            'note' => 'Deliver'
        );

        $dataJson = json_encode($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Api-Key: ' . $apiKey,
            'Secret-Key: ' . $secretKey,
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] == 200 && isset($responseData['consignment'])) {
            $consignmentData = $responseData['consignment'];
            $consignments = new Consignment();
            $consignments->consignment_id = $consignmentData['consignment_id'];
            $consignment->invoice = $consignmentData['invoice'];
            $consignment->tracking_code = $consignmentData['tracking_code'];
            $consignment->recipient_name = $consignmentData['recipient_name'];
            $consignment->recipient_phone = $consignmentData['recipient_phone'];
            $consignment->recipient_address = $consignmentData['recipient_address'];
            $consignment->cod_amount = $consignmentData['cod_amount'];
            $consignment->status = $consignmentData['status'];
            $consignment->note = $consignmentData['note'];
            $consignments->save();
        }
    }

    public function bulk_order(Request $request){
        if(empty($request->id)){
            return 0;
        }
        $this->issueToken();
        $api_key = env("Steadfast_Api_Key");
        $secret_key = env("Steadfast_Secret_Key");
        $data = array();

        foreach ($request->id as $order_id) {
            $order = Order::where('id',$order_id)->first();
            $Recipient = User::where('id',$order->user_id)->first();
            $shipping_address = json_decode($order->shipping_address);

            $item = [
                'invoice' => $order->code,
                'recipient_name' => $Recipient->name,
                'recipient_phone' => $Recipient->phone,
                'recipient_address' => $shipping_address->address,
                'cod_amount' => $order->grand_total,
                'note' => 'Deliver'
            ];
            $data[] = $item;
        }

        $data=json_encode($data);
        
        $response = Http::withHeaders([
            'Api-Key' => $api_key,
            'Secret-Key' => $secret_key,
            'Content-Type' => 'application/json'
        ])->post($this->base_url.'/create_order/bulk-order', [
                'data' => $data,
        ]);

        $responsebody = json_decode($response->getBody()->getContents());
        if ($responsebody['status'] == 200) {
            foreach ($responsebody as $consignmentData) {
                $consignment = new Consignment();
                $consignment->consignment_id = $consignmentData['consignment_id'];
                $consignment->invoice = $consignmentData['invoice'];
                $consignment->tracking_code = $consignmentData['tracking_code'];
                $consignment->recipient_name = $consignmentData['recipient_name'];
                $consignment->recipient_phone = $consignmentData['recipient_phone'];
                $consignment->recipient_address = $consignmentData['recipient_address'];
                $consignment->cod_amount = $consignmentData['cod_amount'];
                $consignment->status = $consignmentData['status'];
                $consignment->note = $consignmentData['note'];
                $consignment->save();
            }
        }
        return 1;
    }
}