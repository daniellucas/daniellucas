<?php

/* config start */

$emailAddress = 'example@mail.com';

/* config end */


require "phpmailer/class.phpmailer.php";


$msg=
'Name:	'.$_POST['name'].'<br />
Email:	'.$_POST['email'].'<br />
IP:	'.$_SERVER['REMOTE_ADDR'].'<br /><br />

Message:<br /><br />

'.nl2br($_POST['message']).'

';


$mail = new PHPMailer();
$mail->IsMail();

$mail->AddReplyTo($_POST['email'], $_POST['name']);
$mail->AddAddress($emailAddress);
$mail->SetFrom($_POST['email'], $_POST['name']);
$mail->Subject = "A new ".mb_strtolower($_POST['subject'])." from ".$_POST['name']." | contact form feedback";

$mail->MsgHTML($msg);

$mail->Send();


?>
