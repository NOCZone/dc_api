<?php
include "lib/okitooEncryption.php";

$api_key = '';      // get your API key from https://noczone.com/?page=api
$api_secret = '';   // get your Secret key from https://noczone.com/?page=api

//required
$data['r'] = 'add';         // request type [add/delete/edit/disable/enable/notify] >> more here https://noczone.com/?page=api
$data['ip'] = '1.1.1.1';    //  IP Address of the server

//optional
$data['enabled'] = '1';         // [0/1] enable the server once added - or leave th eoption for the user
$data['title'] = '';            // [ string ] A name/title for the server, this will be editable by the user

/* notify the user of adding this server via email,
	otherwise you will need to send them an email yourself with the take-over URL so the user can move the server to his account
	The take-over URL will be sent in the JSON-encoded response
*/
$data['notify'] = '1';


$data['services'] = array('http_1', 'ping');    // services to monitor on the server
$data['email'] = 'rami.dabain@gmail.com';       // email of the user who will receive this server, should be NOCZone.com user

$jsonData = json_encode($data);

$encodedData = okitooEncryption::encrypt($jsonData, ($api_secret));

$url = 'https://noczone.com/api.php';
$fields = array(
	'dc' => $api_key,
	'data' => urlencode($encodedData)
);

foreach ($fields as $key => $value) {
	$fields_string .= $key . '=' . $value . '&';
}
rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

echo $result; // << JSON-encoded response
