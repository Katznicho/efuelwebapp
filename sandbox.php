<?php
try {
    $curl = curl_init();
        
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://sandbox.mojaloop.io/switch-ttk-backend/thirdpartyTransaction/partyLookup',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{ 
        "transactionRequestId": "b51ec534-ee48-4575-b6a9-ead2955b8069",
        "payee": {
          "partyIdType": "MSISDN",
          "partyIdentifier":"16135551212"
        }
      }',
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    //convert json to array
    //$data = json_decode($response, true);
    var_dump($response);
} catch (\Throwable $th) {
    //throw $th;
    echo $th;
    die("An error occured");
}