<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost:4040/thirdpartyTransaction/partyLookup',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"transactionRequestId":"b51ec534-ee48-4575-b6a9-ead2955b8069","payee":{"partyIdType":"MSISDN","partyIdentifier":"9876543210"}}',
  CURLOPT_HTTPHEADER => array(
    'content-type: application/json',
    'traceparent: 00-aabb65eaa6ce291ae6f2f8bd023bee84-0123456789abcdef0-00',
    'user-agent: axios/0.27.2'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
// Store the response in a session variable
session_start();
$_SESSION['partyLookupResponse'] =   $response;

// Redirect to the new page
header("Location:displayuser.php");
exit;
