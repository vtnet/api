<?php
// requires module php5-curl
$access_token = 'your_api_token';
$location = 'https://url/API/ligacoes?start_date=2016-09-17'; 
$headers = array(
  "access_token: $access_token"
);
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec($ch);
$curlInfo = curl_getinfo($ch);
curl_close($ch);
switch($curlInfo['http_code']) {
  case '200':
    $message = json_decode($response, true);
    echo "OK\n";
    break;
  default:
    echo "Error: $curlInfo[http_code]\n";
    break;
}
?>