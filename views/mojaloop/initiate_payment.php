<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost:4040/thirdpartyTransaction/b51ec534-ee48-4575-b6a9-ead2955b8069/initiate',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"payee":{"partyIdInfo":{"partyIdType":"MSISDN","partyIdentifier":"9876543210","fspId":"dfspb"}},"payer":{"partyIdType":"THIRD_PARTY_LINK","partyIdentifier":"1234567890","fspId":"dfspa"},"amountType":"SEND","amount":{"amount":"10","currency":"EUR"},"transactionType":{"scenario":"TRANSFER","initiator":"PAYER","initiatorType":"CONSUMER"},"expiration":"2044-07-15T22:17:28.985-01:00"}',
  CURLOPT_HTTPHEADER => array(
    'content-type: application/json',
    'traceparent: 00-aabbe6798be25ba0fd8b227e95ba53aa-0123456789abcdef0-00',
    'user-agent: axios/0.27.2'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
session_start();
$_SESSION['initiatePayment'] =   $response;

// Redirect to the new page
header("Location:confirmPayment.php");
exit;
