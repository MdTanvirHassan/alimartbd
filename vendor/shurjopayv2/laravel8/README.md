# spV2-laravel8
#### To integrate the shurjoPay Payment Gateway in your Laravel project do the following tasks sequentially.

### Installation and Configuration

``composer require shurjopayv2/laravel8
``

###### After successful installation of shurjopay-laravel-package, go to your project and open config folder and then click on app.php file. Append the following line in providers array.
``
shurjopayv2\ShurjopayLaravelPackage8\ShurjopayServiceProvider::class
``

###### After successfully doing the above steps add the following Keys in .env file with the credentials provided from shurjoMukhi Limited

``MERCHANT_USERNAME=""  
``

``MERCHANT_PASSWORD=""
``

``MERCHANT_PREFIX=""
``

``MERCHANT_RETURN_URL=""
``

``MERCHANT_CANCEL_URL=""
``

``ENGINE_URL=""
``
###### Now add this line of code in your method where you want to call shurjoPay Payment Gateway. You can use any code segment of below

``
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
``

``$info = array(
'currency' => "",
'amount' => ,
'order_id' => "",
'discsount_amount' => ,
'disc_percent' => ,
'client_ip' => "",
'customer_name' => "",
'customer_phone' => "",
'email' => "",
'customer_address' => "",
'customer_city' => "",
'customer_state' => "",
'customer_postcode' => "",
'customer_country' => "",
);``

``$shurjopay_service = new ShurjopayController();
return $shurjopay_service->checkout($info);``

###### for verifying,

``$shurjopay_service = new ShurjopayController();
return $shurjopay_service->verify($order_id);``