<?php namespace MyFatoorah\Library; use Exception; class  MyfatoorahApiV2{protected $apiURL='';protected $apiKey;protected $loggerObj;protected $loggerFunc;public function __construct($apiKey,$countryMode='KWT',$isTest=false,$loggerObj=null,$loggerFunc=null){$mfCountries=$this->getMyFatoorahCountries();$code=strtoupper($countryMode);if(isset($mfCountries[$code])){$this->apiURL=($isTest)?$mfCountries[$code]['testv2']:$mfCountries[$code]['v2'];}else{$this->apiURL=($isTest)?'https://apitest.myfatoorah.com':'https://api.myfatoorah.com';}$this->apiKey=$apiKey?trim($apiKey):'';$this->loggerObj=$loggerObj;$this->loggerFunc=$loggerFunc;}public function callAPI($url,$postFields=null,$orderId=null,$function=null){ini_set('precision',14);ini_set('serialize_precision',-1);$request=isset($postFields)?'POST':'GET';$fields=json_encode($postFields);$msgLog="Order #$orderId ----- $function";if($function!='Direct Payment'){$this->log("$msgLog - Request: $fields");}$curl=curl_init($url);curl_setopt_array($curl,array(CURLOPT_CUSTOMREQUEST=>$request,CURLOPT_POSTFIELDS=>$fields,CURLOPT_HTTPHEADER=>["Authorization: Bearer $this->apiKey",'Content-Type: application/json'],CURLOPT_RETURNTRANSFER=>true));$res=curl_exec($curl);$err=curl_error($curl);curl_close($curl);if($err){$this->log("$msgLog - cURL Error: $err");throw new Exception($err);}$this->log("$msgLog - Response: $res");$json=json_decode((string) $res);$error=$this->getAPIError($json,(string) $res);if($error){$this->log("$msgLog - Error: $error");throw new Exception($error);}return $json;}protected function getAPIError($json,$res){if(isset($json->IsSuccess)&&$json->IsSuccess==true){return '';}$stripHtmlStr=strip_tags($res);if($res!=$stripHtmlStr&&stripos($stripHtmlStr,'apple-developer-merchantid-domain-association')!==false){return trim(preg_replace('/\s+/',' ',$stripHtmlStr));}$err=$this->getJsonErrors($json);if($err){return $err;}if(!$json){return(!empty($res)?$res:'Kindly review your MyFatoorah admin configuration due to a wrong entry.');}if(is_string($json)){return $json;}return '';}protected function getJsonErrors($json){if(isset($json->ValidationErrors)||isset($json->FieldsErrors)){$errorsObj=isset($json->ValidationErrors)?$json->ValidationErrors:$json->FieldsErrors;$blogDatas=array_column($errorsObj,'Error','Name');return implode(', ',array_map(function($k,$v){return"$k: $v";},array_keys($blogDatas),array_values($blogDatas)));}if(isset($json->Data->ErrorMessage)){return $json->Data->ErrorMessage;}if(isset($json->Message)){return $json->Message;}return '';}public static function getPhone($inputString){$newNumbers=range(0,9);$persianDecimal=['&#1776;','&#1777;','&#1778;','&#1779;','&#1780;','&#1781;','&#1782;','&#1783;','&#1784;','&#1785;'];$arabicDecimal=['&#1632;','&#1633;','&#1634;','&#1635;','&#1636;','&#1637;','&#1638;','&#1639;','&#1640;','&#1641;'];$arabic=['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];$persian=['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];$string0=str_replace($persianDecimal,$newNumbers,$inputString);$string1=str_replace($arabicDecimal,$newNumbers,$string0);$string2=str_replace($arabic,$newNumbers,$string1);$string3=str_replace($persian,$newNumbers,$string2);$string4=preg_replace('/[^0-9]/','',$string3);if(strpos($string4,'00')===0){$string4=substr($string4,2);}if(!$string4){return['',''];}$len=strlen($string4);if($len<3||$len>14){throw new Exception('Phone Number lenght must be between 3 to 14 digits');}if(strlen(substr($string4,3))>3){return[substr($string4,0,3),substr($string4,3)];}else{return['',$string4];}}public function log($msg){if(!$this->loggerObj){return;}if(is_string($this->loggerObj)){error_log(PHP_EOL.date('d.m.Y h:i:s').' - '.$msg,3,$this->loggerObj);}elseif(method_exists($this->loggerObj,$this->loggerFunc)){$this->loggerObj->{$this->loggerFunc}($msg);}}public static function getWeightRate($unit){$lUnit=strtolower($unit);$rateUnits=['1'=>['kg','kgs','كج','كلغ','كيلو جرام','كيلو غرام'],'0.001'=>['g','جرام','غرام','جم'],'0.453592'=>['lbs','lb','رطل','باوند'],'0.0283495'=>['oz','اوقية','أوقية'],];foreach($rateUnits as $rate=>$unitArr){if(array_search($lUnit,$unitArr)!==false){return (float) $rate;}}throw new Exception('Weight units must be in kg, g, lbs, or oz. Default is kg');}public static function getDimensionRate($unit){$lUnit=strtolower($unit);$rateUnits=['1'=>['cm','سم'],'100'=>['m','متر','م'],'0.1'=>['mm','مم'],'2.54'=>['in','انش','إنش','بوصه','بوصة'],'91.44'=>['yd','يارده','ياردة'],];foreach($rateUnits as $rate=>$unitArr){if(array_search($lUnit,$unitArr)!==false){return (float) $rate;}}throw new Exception('Dimension units must be in cm, m, mm, in, or yd. Default is cm');}public function getCurrencyRate($currency){$json=$this->getCurrencyRates();foreach($json as $value){if($value->Text==$currency){return $value->Value;}}throw new Exception('The selected currency is not supported by MyFatoorah');}public function getCurrencyRates(){$url="$this->apiURL/v2/GetCurrenciesExchangeList";return $this->callAPI($url,null,null,'Get Currencies Exchange List');}protected function calcGatewayData($totalAmount,$currency,$paymentCurrencyIso,$allRatesData){foreach($allRatesData as $data){if($data->Text==$currency){$baseCurrencyRate=$data->Value;}if($data->Text==$paymentCurrencyIso){$gatewayCurrencyRate=$data->Value;}}if(isset($baseCurrencyRate)&&isset($gatewayCurrencyRate)){$baseAmount=ceil(((int)($totalAmount*1000))/$baseCurrencyRate/10)/100;$number=ceil(($baseAmount*$gatewayCurrencyRate*100))/100;return['GatewayTotalAmount'=>number_format($number,2,'.',''),'GatewayCurrency'=>$paymentCurrencyIso];}else{return['GatewayTotalAmount'=>$totalAmount,'GatewayCurrency'=>$currency];}}public static function isSignatureValid($dataArray,$secret,$signature,$eventType=0){if($eventType==2){unset($dataArray['GatewayReference']);}uksort($dataArray,'strcasecmp');$output=implode(',',array_map(function($v,$k){return sprintf("%s=%s",$k,$v);},$dataArray,array_keys($dataArray)));$hash=base64_encode(hash_hmac('sha256',$output,$secret,true));if($signature===$hash){return true;}else{return false;}}public static function getMyFatoorahCountries(){$mfConfigFile=__DIR__.'/mf-config.json';if(file_exists($mfConfigFile)){if((time()-filemtime($mfConfigFile)>3600)){self::updateMFConfigFile($mfConfigFile);}$content=file_get_contents($mfConfigFile);return($content)?json_decode($content,true):[];}return[];}protected static function updateMFConfigFile($mfConfigFile){if(!is_writable($mfConfigFile)){$mfError='To enable MyFatoorah auto-update, kindly give the write/read permissions to the library folder '.__DIR__.' on your server and its files.';trigger_error($mfError,E_USER_WARNING);return;}touch($mfConfigFile);$mfCurl=curl_init('https://portal.myfatoorah.com/Files/API/mf-config.json');curl_setopt_array($mfCurl,array(CURLOPT_HTTPHEADER=>['Content-Type: application/json'],CURLOPT_RETURNTRANSFER=>true));$mfResponse=curl_exec($mfCurl);$mfHttpCode=curl_getinfo($mfCurl,CURLINFO_HTTP_CODE);curl_close($mfCurl);if($mfHttpCode==200&&is_string($mfResponse)){file_put_contents($mfConfigFile,$mfResponse);}}}