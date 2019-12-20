<?php
function phpmail($receiver,$receivername,$subject,$contents){
    $frommail="cameran.jonah@owee.org";
    $mailuser="f89cee30bc98c9ed157087465715c650";
    $frompass="27889ef53aa266bb4d6dcacbefc4d88a";
    $mailhost="in-v3.mailjet.com";
    $mailport=587;
    $mailssl=1;
    mb_internal_encoding('UTF-8');    // 內部預設編碼改為UTF-8
    include_once(__DIR__. "/PHPMailer-master/class.smtp.php");
    include_once(__DIR__. "/PHPMailer-master/class.phpmailer.php");
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    if($mailssl==1){
        //$mail->SMTPSecure = "ssl";
        $mail->SMTPSecure = "tls";
    }
    $mail->Host = $mailhost;
    $mail->Port = $mailport;
    $mail->CharSet = "utf-8";
    $mail->Encoding = "base64";
    $mail->Username = $mailuser;
    $mail->Password = $frompass;
    $mail->FromName = $frommail;
    $mail->From = $frommail;
    $mail->AddAddress($receiver,$receivername);
    $mail->AddReplyTo($frommail,"自動寄件人-請勿回覆");
    $mail->WordWrap = 50;
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = mb_encode_mimeheader($subject, "UTF-8");
    $mail->Body = $contents;
    //$mail->AltBody = $contents;
    if($mail->Send()){
        return true;
    }else{
        echo $mail->ErrorInfo;
        return false;
    }
}
