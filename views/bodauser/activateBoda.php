<?php

include_once '../../utils/session.php';
include_once("../../utils/sms.php");
include_once("../../utils/pin.php");
include_once("../../utils/dbaccess.php");

$sms =  new sms();
$pin =  new pin();
$dbAccess = new DbAccess();

try {
    if (isset($_POST["activate"])) {
        $bodaUserId = $_POST['id'];

        $stageId = $_POST['stageId'];

        $oneTymPin =  $pin->randomkey(5);
        $hashedPin = $pin->hashPass($oneTymPin);
        //check if stage is active
        $stageStatus = $dbAccess->select("stage", ["stageStatus"], ["stageId" => $stageId]);
        if (strval($stageStatus[0]['stageStatus']) == 0) {
            $_SESSION['info'] = "Cannot activate boda user because the stage is not yet active!!Please Activate the stage";
            header("Location:index.php");
        }
        $allbodaUser = $dbAccess->select("bodauser", ["bodaUserName", "bodaUserPhoneNumber"], ["bodaUserId" => $bodaUserId]);

        $message = "Hello " . $allbodaUser[0]["bodaUserName"] . " Your  have been activated on E-Fuel Dail *217# to get started Remember your one time pin is " . $oneTymPin;
        $res = $sms->sendSms($message, $sms->formatMobileInternational($allbodaUser[0]["bodaUserPhoneNumber"]));
        if ($dbAccess->update("bodauser", ['bodaUserStatus' => '1', 'pin' => $hashedPin], ["bodaUserId" => $bodaUserId])) {
            $_SESSION['success'] = "Boda User has been activated successfully";
            header("Location:index.php");
        } else {
            $_SESSION['error'] = "Oops something occurred please contact support or try again";
            header("Location:index.php");
        }
    } else {
        //die("not id found please contact support ")
        $_SESSION['error'] = "Oops something occurred please contact support or try again";
        header("Location:index.php");
    }
} catch (\Throwable $th) {
    //throw $th;
    var_dump($th->getMessage());
    die("am here");
}