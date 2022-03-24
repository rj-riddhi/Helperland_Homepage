<?php

use PHPMailer\PHPMailer\PHPMailer;

//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';
// require_once "Customer_Pages.php";

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
        $this->mail->Username = '7a9d37225e19e4';
        $this->mail->Password = '957dab2426ebaa';

        $this->mail->IsHTML(true);
        
    }

    public function sendEmail($mail,$id,$date,$time){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $Email = $mail;
        $id1 =$id;
        $date1 = $date;
        $time1 = $time;
        //Can Send Email Now
        $subject = "Service Updated please check new time and date";
        $message = "<h1>Updated</h1><br><p>Service Request ".$id1." has been rescheduled by customer. New date and time are ".$date1." ".$time1."</p>";
        
        $message .= "<p>Thanks and regards.</p>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    

        
    }
    public function senddeletemail($email,$id){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $Email = $email;
        $id1 =$id;
       
        //Can Send Email Now
        $subject = "Service Deleted";
        $message = "<h1>Deleted</h1><br><p>Service Request ".$id1." has been deleted by customer</p>";
        
        $message .= "<p>Thanks and regards.</p>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();

    }

    
}

$init = new Mail_for_serviceproviders;
// $init->sendEmail();



