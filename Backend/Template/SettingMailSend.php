<?php

use PHPMailer\PHPMailer\PHPMailer;

//include '0.Connect.php';
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

class Mailing
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->Host = "10.101.97.26"; // SMTP server ถ้าใช้ชื่อ soms.scg.com ต้องมีการ Authen 
        $this->mail->Port = 25;
        $this->mail->SMTPDebug = 0;
        $this->mail->SetFrom("sts_automail@scg.com");
        $this->mail->IsHTML(true);
        $this->mail->SMTPAutoTLS = false;
        $this->mail->SMTPSecure = 'none';
        $this->mail->CharSet = 'UTF-8';
    }

    public function addSubject($subject){
        $this->mail->Subject = $subject;
    }

    public function addBody($body){
        $this->mail->Body = $body; // allow a html tag to this mail
    }

    public function sendTo($email){
        $this->mail->addAddress($email);
    }

    public function sendToSCG($emailWithoutDomain){
        $this->mail->addAddress($emailWithoutDomain."@scg.com");
    }

    public function send()
    {
        if($this->mail->send()){
            return true;
        }else{
            return false;
        }
    }
}