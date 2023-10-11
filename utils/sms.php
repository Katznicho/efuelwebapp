<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("./dbaccess.php");

class infobip
{

    public function formatMobileInternational($mobile)
    {
        $length = strlen($mobile);
        $m = '+256';
        //format 1: +256752665888
        if ($length == 13)
            return $mobile;
        elseif ($length == 12) //format 2: 256752665888
            return "+" . $mobile;
        elseif ($length == 10) //format 3: 0752665888
            return $m .= substr($mobile, 1);
        elseif ($length == 9) //format 4: 752665888
            return $m .= $mobile;

        return $mobile;
    }

    //new faster way
    public function sms_faster($message, $receivers, $status)
    {
        if ($status == 1) {
            $receipients = $receivers;

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.africastalking.com/version1/messaging',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'username=katznicho&to=' . urlencode($this->formatMobileInternational($receipients)) . '&message=' . urlencode($message) . '',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/x-www-form-urlencoded',
                    'apiKey: c5c7c7f8fb98ab8db46120194f430f71e9b1482f8d9ee2e00390d2f309b6e9c7'
                ),
            ));
            $result = curl_exec($curl);
            if (curl_errno($curl)) {
                return 'Error:' . curl_error($curl);
            }
            curl_close($curl);

            return substr($result, 0, 4); // "1701" indicates success */
        }
    }
    // new faster way

    //    public function sendsms($from, $to, $msg) {
    //        $curl = curl_init();
    //        // $to=256772093837;

    //        curl_setopt_array($curl, array(
    //            CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
    //            CURLOPT_RETURNTRANSFER => true,
    //            CURLOPT_ENCODING => "",
    //            CURLOPT_MAXREDIRS => 10,
    //            CURLOPT_TIMEOUT => 30,
    //            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //            CURLOPT_CUSTOMREQUEST => "POST",
    //            CURLOPT_POSTFIELDS => "{ \"from\":\"" . $from . "\", \"to\":[ \"" . $to . "\" ], \"text\":\"" . $msg . "\" }",
    //            CURLOPT_HTTPHEADER => array(
    //                "accept: application/json",
    //                "authorization:Basic Y3JlZGl0cGx1c2RldjpUZXN0MTIzNEA=",
    //                "content-type: application/json"
    //            ),
    //        ));

    //        $response = curl_exec($curl);
    //        $err = curl_error($curl);

    //        curl_close($curl);

    //        if ($err) {
    //            //   
    //            return 0;
    //        } else {

    //            $decodedcontent = json_decode($response);


    //            $data['tel'] = $to;
    //            $data['message'] = $msg;
    //            foreach ($decodedcontent as $cont) {
    //                foreach ($cont as $res) {


    //                    $data['message_id'] = $res->messageId;
    //                    $data['success_code'] = $res->status->groupId;
    //                    $data['status'] = $res->status->name;
    //                }
    //            }
    //            $db = new Cursor;
    //            $table = "sms_gateway";
    //            $id = $db->insert($table, $data);

    //            return $id;
    //        }
    //    }

    public function sendsms($from, $to, $msg)
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://apidocs.speedamobile.com/api/SendSMS?api_id=API34247417254&api_password=!Log10tan10&sms_type=P&encoding=T&sender_id=CREDITPLUS&phonenumber=" . $to . "&textmessage=" . urlencode($msg),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            //            CURLOPT_HTTPHEADER => array(
            //                "cache-control: no-cache",
            //                "postman-token: ca383ae7-063a-2e07-a8b8-acb6712e61c4"
            //            ),
        ));

        $response = curl_exec($curl);
        //echo $response;
        $err = curl_error($curl);

        curl_close($curl);
        if ($response) {

            $decodedcontent = json_decode($response);


            $data['tel'] = $to;
            $data['message'] = $msg;

            $data['message_id'] = $decodedcontent->{'message_id'};
            $data['success_code'] = $decodedcontent->{'remarks'};
            $data['status'] = $decodedcontent->{'status'};

            $db = new DbAccess();
            $table = "sms_gateway";
            $db->insert($table, $data);

            //return $id;
            //die("sent message");
            //return null;
        } else {
            die("not sent");
            return 0;

            //echo $ex;
        }
    }
}
//
//$infobip = new infobip();
//
//$content = $infobip->sendmessageone("BULKSMS", "256772093837", "hello333 world");
// echo$content;
// $decodedcontent=json_decode($content);
// print_r($decodedcontent->messages[0]->to);