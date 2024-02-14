<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pathao_courier;
use App\Models\Pathao_store; 
use App\Models\Pathao_courier_order; 
use App\Models\Pathao_city; 
use App\Models\Order; 
use App\Models\Address; 
use App\Models\User; 
// use App\Models\Pathao_zone; 


class PathaoCourierController extends Controller
{
    public $access_token = '';

    public $base_url;

    public function __construct()
    {
        $this->base_url = env("pathao_base_url");
       
    }
    // public $base_url = "https://courier-api-sandbox.pathao.com";
    // public $base_url = "https://api-hermes.pathao.com";
    

    public function issueToken(){

        $client_id = env("Cilent_ID");
        $username = env("Cilent_Email");
        $client_secret = env("Cilent_Secret");
        $password = env("Cilent_Password");
        $grant_type = "password";

        
        $request_body = json_encode(array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'username' => $username,
            'password' => $password,
            'grant_type' => $grant_type
        ));
        

        $request_headers = array(
            'Accept: application/json',
            'Content-Type: application/json'
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "$this->base_url/aladdin/api/v1/issue-token");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        curl_close($curl);

     
        $responseData = json_decode($response, true);
        
        $accessToken = $responseData['access_token'];
        $refresh_token = $responseData['refresh_token'];
        return $accessToken;
    }

    public function store_list(){
        $Pathao_store =  Pathao_store::get();
        return view("backend.pathao.store_index", compact('Pathao_store'));
    }

    public function getZone(Request $request)
    {   
        $selectedCityId = $request->input('cityId');
        $this->access_token = $this->issueToken();
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .  $this->access_token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get("$this->base_url/aladdin/api/v1/cities/$selectedCityId/zone-list");
        
        $zonesResponse = $response->json();
        $zones = $zonesResponse['data']['data'];
        return $zones;
    }

    public function getArea(Request $request){
              
        $selectedZoneId = $request->input('zoneId');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' .  $this->access_token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get("$this->base_url/aladdin/api/v1/zones/$selectedZoneId/area-list");
        
        $areasResponse = $response->json();
        $areas = $areasResponse['data']['data'];
        return $areas;
    }

    public function order(Request $request){
        $this->access_token = $this->issueToken();
        $order = Order::where('id',$request->id)->first();
        $user = Order::where('id',$request->id)->value('user_id');
        $shipping_address = json_decode($order->shipping_address);
        return view("backend.pathao.order", compact('order','shipping_address'));
    }

    public function saveOrder(Request $request){
        
        $shipping_address = json_decode(Order::where('code', $request->merchant_order_id)->value('shipping_address'));
     
        $accessToken = $this->issueToken();
        $item_weight = 0;
        if($request->item_weight==0){
            $item_weight = 0.1;
        }else{
            $item_weight = $request->item_weight;
        }

        $request_body = json_encode(array(
            'store_id' => $request->store_id,
            'merchant_order_id' => $request->merchant_order_id,
            'sender_name' => $request->contactName,
            'sender_phone' => $request->contactNumber,
            'recipient_name' => $request->recipientName,
            'recipient_phone' => $request->recipientNumber,
            'recipient_address' => $shipping_address->address,
            'recipient_city' => $shipping_address->city,
            'recipient_zone' => $shipping_address->zone,
            'recipient_area' => $shipping_address->area,
            'delivery_type' => $request->delivery_type,
            'item_type' => $request->item_type,
            'special_instruction' => $request->special_instruction,
            'item_quantity' => $request->item_quantity,
            'item_weight' => $item_weight,
            'amount_to_collect' => (int)$request->amount_to_collect,
            'item_description' => $request->item_description
        ));

        $request_headers = array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json',
            'Content-Type: application/json'
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "$this->base_url/aladdin/api/v1/orders");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        curl_close($curl);

        $responseData = json_decode($response, true);

        
        
        if(isset($responseData['data']['consignment_id'])){
            $consignment_id = $responseData['data']['consignment_id'];
            $merchant_order_id = $responseData['data']['merchant_order_id'];
            $order_status = $responseData['data']['order_status'];
            $delivery_fee = $responseData['data']['delivery_fee'];
    
            $pathao_courier_order = new Pathao_courier_order();
            $pathao_courier_order->store_id = $request->store_id;
            $pathao_courier_order->consignment_id = $consignment_id;
            $pathao_courier_order->merchant_order_id = $merchant_order_id;
            $pathao_courier_order->order_status = $order_status;
            $pathao_courier_order->delivery_fee = $delivery_fee;
            $pathao_courier_order->delivery_type = $request->delivery_type;
            $pathao_courier_order->item_type = $request->item_type;
            $pathao_courier_order->item_type = $request->special_instruction;
            $pathao_courier_order->item_type = $request->item_description;
            $pathao_courier_order->save();
    
            
            flash(translate('Order has been placed'))->success();
            return back();
        }
        else{
            flash(translate('Pathao Courier Order not placed'))->error();
            return back();
        }
    }

    public function getInfo(Request $request){
        $store=$request->storeId;
        $storeInfo = Pathao_store::where('store_id',$store)->first();
        return $storeInfo;
    }

    public function Store(){
        $this->access_token = $this->issueToken();

        return view("backend.pathao.store");
    }

    public function saveStore(Request $request){
        
        $accessToken = $this->issueToken();
       
        $request_body = json_encode(array(
            'name' => $request->storeName,
            'contact_name' => $request->contactName,
            'contact_number' => $request->contactNumber,
            'secondary_contact' => $request->secondaryContact,
            'address' => $request->address,
            'city_id' => $request->city_id,
            'zone_id' => $request->zone_id,
            'area_id' => $request->area_id
        ));
        

        $request_headers = array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json',
            'Content-Type: application/json'
        );

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "$this->base_url/aladdin/api/v1/stores");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        curl_close($curl);

        $responseData = json_decode($response, true);
        
        if(isset($responseData['data']['consignment_id'])){
            $consignment_id = $responseData['data']['consignment_id'];
            $merchant_order_id = $responseData['data']['merchant_order_id'];
            $order_status = $responseData['data']['order_status'];
            $delivery_fee = $responseData['data']['delivery_fee'];
    
            $pathao_courier_order = new Pathao_courier_order();
            $pathao_courier_order->store_id = $request->store_id;
            $pathao_courier_order->consignment_id = $consignment_id;
            $pathao_courier_order->merchant_order_id = $merchant_order_id;
            $pathao_courier_order->order_status = $order_status;
            $pathao_courier_order->delivery_fee = $delivery_fee;
            $pathao_courier_order->delivery_type = $request->delivery_type;
            $pathao_courier_order->item_type = $request->item_type;
            $pathao_courier_order->item_type = $request->special_instruction;
            $pathao_courier_order->item_type = $request->item_description;
            $pathao_courier_order->save();
    
            
            flash(translate('Order has been placed'))->success();
            return back();
        }
        else{
            flash(translate('Pathao Courier Order not placed'))->error();
            return back();
        }
        
    }

    public function bulk_order(Request $request){
        $accessToken = $this->issueToken();
        $request_headers = array(
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json',
            'Content-Type: application/json'
        );
    
        $orders = [];
    
        if (!is_null($request->id) && (is_array($request->id) || is_object($request->id))) {
            $storeId = $request->store_id;
            $itemType = $request->item_type;
            $deliveryType = $request->delivery_type;
            $order_id = $request->id;  

            $order = Order::where('id', $order_id)->value('code');
           

           
    
            foreach ($request->id as $order_id) {
                $order = Order::where('id', $order_id)->first();
                $pathao_courier_order = Pathao_courier_order::where('merchant_order_id', $order->code)->exists();
                if(!$pathao_courier_order){
    
                if (!$order) {
                    // Handle case where order is not found
                    flash(translate('Error: Order not found'))->error();
                    return back();
                }
    
                $Recipient = User::where('id', $order->user_id)->first();
                $item_quantity = Order::join('order_details','orders.id','order_details.order_id')->where('orders.id',$order->id)->sum('order_details.quantity');
                $item_weight = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                            ->join('products', 'products.id', '=', 'order_details.product_id')
                            ->where('orders.id', $order->id)
                            ->sum(\DB::raw('products.weight * order_details.quantity'));
                $shipping_address = json_decode(Order::where('orders.id', $order->id)->value('shipping_address'));
                $orderData = [
                    'item_type' => $itemType,
                    'store_id' => $storeId,
                    'merchant_order_id' => $order->code,
                    'recipient_name' => $Recipient->name,
                    'recipient_phone' => $Recipient->phone,
                    'recipient_city' => $shipping_address->city,
                    'recipient_zone' => $shipping_address->zone,
                    'recipient_area' => $shipping_address->area,
                    'recipient_address' => $shipping_address->address,
                    'amount_to_collect' => $order->grand_total,
                    'item_quantity' => $item_quantity,
                    'item_weight' => $item_weight,
                    'item_description' => '',
                    'special_instruction' => '',
                    'delivery_type' => $deliveryType
                ];
                $orders[] = $orderData;
            }else{
                flash(translate('Error: Order already placed'))->error();
                return back();
            }
        }
        } else {
            // Handle the case where $request->id is null or not an array/object
            flash(translate('Error: Invalid order IDs'))->error();
            return back();
        }
    
        
        $request_body = json_encode(['orders' => $orders]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->base_url/aladdin/api/v1/orders/bulk");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);   
        
        $responseBody = json_decode($response);
        $message = $responseBody->message;
        $type = $responseBody->type;
    
        if (isset($responseBody->message) && isset($responseBody->type)) {
            $message = $responseBody->message;
            $type = $responseBody->type;
        } else {
            // Handle case where response body is not as expected
            flash(translate('Error: Invalid response'))->error();
            return back();
        }
    
        // Save Pathao courier orders
        foreach ($request->id as $order_id) {
            $merchant_order_id = Order::where('id', $order_id)->value('code');
           
            $pathao_courier_order = new Pathao_courier_order();
            $pathao_courier_order->store_id = $request->store_id;
            $pathao_courier_order->merchant_order_id = $merchant_order_id;
            $pathao_courier_order->delivery_type = $request->delivery_type;
            $pathao_courier_order->item_type = $request->item_type;
            $pathao_courier_order->save();
        }
    
        flash(translate('Order has been placed'))->success();
        return [$message, $type];
    }
    
   
}
