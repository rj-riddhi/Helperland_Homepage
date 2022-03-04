<?php

use PHPMailer\PHPMailer\PHPMailer;

//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

class Mail_for_serviceproviders{
    
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
        // $Email = $_SESSION['spemail'];
        for($i = 0 ; $i < sizeof($_SESSION['spemail'])  ; $i++){
            $Email = $_SESSION['spemail'][$i];
        //Can Send Email Now
        $subject = "New Service request arrived";
        $message = "<h1>New request have been arrived</h1><br><p>We recieved a customer request for service on helperland in your area.If you want then accept it.</p>";
        
        $message .= "<p>Thanks and regards.</p>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    }

        
    }

    
}

$init = new Mail_for_serviceproviders;
$init->sendEmail();



