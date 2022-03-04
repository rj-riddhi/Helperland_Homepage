<?php

use PHPMailer\PHPMailer\PHPMailer;

//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

class client_service_request_confirmation_mail{
    
    // private $userModel;
    private $mail;
    
    public function __construct(){
        
        // $this->userModel = new Database;
        //Setup PHPMailer
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 2525;
        $this->mail->Username = '0c3719fdb92645';
        $this->mail->Password = '2d9270b789a064';
        
    }

    public function sendEmail(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $_SESSION['email'];

        //Can Send Email Now
        $subject = "Your request  is submitted";
        $message = "<h1>Thank You for using Helperland😊</h1><br><p>We recieved a helper request on helperland.We will inform you soon as your request will accept.</p>";
        $message .= "<p>we hope you enjoy your booking process </p>";
        $message .= "<p>Thanks and regards.</p>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();

        
    }

    
}

$init = new client_service_request_confirmation_mail;
$init->sendEmail();



