<?php
require_once "sms_api.php";

if (isset($_POST['sub_phone'])) {
    $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
    if (strlen($phone) === 11) {
        $tel = PhoneVerify::Instance($phone);
        $verification = $tel->verification();
        header("location: code.php?service=" . $tel->service->sid . "&phone=" . $phone);
    } else {
        header("location: index.php?error=please fill form with 11 number!");
    }
}

if (isset($_POST['sub_code'])) {
    if ( isset($_POST['code']) && isset($_POST['service']) && isset($_POST['phone'])){
        $tel = PhoneVerify::Instance($_POST['phone']);
        $verification = $tel->verificat_check($_POST['code'], $_POST['service'])->status;

        if($verification  == 'approved'){
            setcookie("valid", true, time() + (86400 * 30), '/');
            session_start();
            $_SESSION['valid'] = true; 
            header("location: userform.php");
        }else{
            header("location: index.php?error=please try again!");
        }

    } else {
        header("location: code.php?error=please fill form with 11 number!");
    }
}
?>