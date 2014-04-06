<?php
include "lib/okitooEncryption.php";

$api_key = '';      // get your API key from https://noczone.com/?page=api
$api_secret = '';   // get your Secret key from https://noczone.com/?page=api

//required
$data['r'] = 'edit';         // request type [add/delete/edit/disable/enable/notify] >> more here https://noczone.com/?page=api
$data['ip'] = '1.1.1.1';    //  IP Address of the server / NO DOMAIN NAMES only IPv4
$data['new_ip'] = '2.2.2.2';    // new ip of the server

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
