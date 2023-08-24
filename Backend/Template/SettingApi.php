<?php
include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');

// Config Timezone
date_default_timezone_set('Asia/Bangkok');

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Http_Response{
    public function Ok($msg = null){
        http_response_code(200);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function Create($msg = null){
        http_response_code(201);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function BadRequest($msg = null){
        http_response_code(400);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function Unauthorize($msg = null){
        http_response_code(401);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function Forbidden($msg = null){
        http_response_code(403);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function NotFound($msg = null){
        http_response_code(404);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    public function MethodNotAllowed($msg = null){
        http_response_code(405);
        if($msg) echo json_encode($msg, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
}





// function sendingMail($to, $subject, $body)
// {
//     try {
//         $mail = new PHPMailer(true);
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'junlavonno1200@gmail.com';
//         $mail->Password = 'mrecxidflhhuhnmb';
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;

//         $mail->setFrom('junlavonno1200@gmail.com'); // Replace with your Gmail address
//         $mail->addAddress($to); // Replace with the recipient email address

//         $mail->isHTML(true);
//         $mail->CharSet = 'UTF-8';
//         $mail->Subject = $subject;
//         $mail->Body = $body;
//         return $mail->send();
//     } catch (Exception $e) {
//         throwError($mail->ErrorInfo);
//     }
// }
