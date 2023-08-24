<?php
//======== root folder name ===========
//$ROOT_NAME = "pms";
//=====================================

use PHPMailer\PHPMailer\PHPMailer;

//include '0.Connect.php';
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

$mail = new PHPMailer();

// SMTP Settings
$mail->isSMTP();
$mail->Host = "10.101.97.26"; // SMTP server ถ้าใช้ชื่อ soms.scg.com ต้องมีการ Authen 
$mail->Port = 25; 
$mail->SMTPDebug = 0;
$mail->SetFrom("sts_automail@scg.com");
$mail->AddAddress("tanachod.sak@gmaill.com");
// $mail->AddAddress("chalongchaith@gmail.com");
// $mail->AddAddress("ekkaphom@scg.com");
$mail->IsHTML(true); 
$mail->Subject = "Test From Soms";
$mail->Body = "Test From Soms ถ้าเมลเข้าทักผมมาใน line ด้วยนะครับ";
$mail->SMTPAutoTLS = false;
$mail->SMTPSecure = 'none';
$mail->CharSet = 'UTF-8';


        if ($mail->send()) {
            echo "บันทึกข้อมูลสำเร็จ !!!";
            exit;
        } else {
            echo "บันทึกข้อมูลไม่สำเร็จ !!!";
        }
 ?>  
