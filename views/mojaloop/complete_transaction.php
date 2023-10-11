<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost:4040/thirdpartyTransaction/b51ec534-ee48-4575-b6a9-ead2955b8069/approve',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"authorizationResponse":{"responseType":"ACCEPTED","signedPayload":{"signedPayloadType":"FIDO","fidoSignedPayload":{"id":"45c-TkfkjQovQeAWmOy-RLBHEJ_e4jYzQYgD8VdbkePgM5d98BaAadadNYrknxgH0jQEON8zBydLgh1EqoC9DA","rawId":"45c+TkfkjQovQeAWmOy+RLBHEJ/e4jYzQYgD8VdbkePgM5d98BaAadadNYrknxgH0jQEON8zBydLgh1EqoC9DA==","response":{"authenticatorData":"SZYN5YgOjGh0NBcPZHZgW4/krrmihjLHmVzzuoMdl2MBAAAACA==","clientDataJSON":"eyJ0eXBlIjoid2ViYXV0aG4uZ2V0IiwiY2hhbGxlbmdlIjoiQUFBQUFBQUFBQUFBQUFBQUFBRUNBdyIsIm9yaWdpbiI6Imh0dHA6Ly9sb2NhbGhvc3Q6NDIxODEiLCJjcm9zc09yaWdpbiI6ZmFsc2UsIm90aGVyX2tleXNfY2FuX2JlX2FkZGVkX2hlcmUiOiJkbyBub3QgY29tcGFyZSBjbGllbnREYXRhSlNPTiBhZ2FpbnN0IGEgdGVtcGxhdGUuIFNlZSBodHRwczovL2dvby5nbC95YWJQZXgifQ==","signature":"MEUCIDcJRBu5aOLJVc/sPyECmYi23w8xF35n3RNhyUNVwQ2nAiEA+Lnd8dBn06OKkEgAq00BVbmH87ybQHfXlf1Y4RJqwQ8="},"type":"public-key"}}}}',
  CURLOPT_HTTPHEADER => array(
    'content-type: application/json',
    'traceparent: 00-aabbe6798be25ba0fd8b227e95ba53aa-0123456789abcdef0-00',
    'user-agent: axios/0.27.2'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


session_start();
$_SESSION['completedPaymentDetails'] =   $response;

// Redirect to the new page
header("Location:completedPayment.php");
exit;
