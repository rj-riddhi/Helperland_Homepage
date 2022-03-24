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
        $this->mail->Username = '7a9d37225e19e4';
        $this->mail->Password = '957dab2426ebaa';

        $this->mail->IsHTML(true);
        
    }

    public function sendEmail($email){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $email;

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


    public function sendRequestAcceptedmail($mail,$serviceid,$spname){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $mail;

        //Can Send Email Now
        $subject = "Your request  has been accepted by Service Provider";
        $message = "<h1>Accepted</h1><br><p>Ypur Request ".$serviceid." is accepted by ".$spname." </p>";
        $message .= "<p>Thanks and regards.</p>";

        $this->mail->setFrom('TheBoss@gmail.com');
        // $this->mail->isHTML(true);
        $this->mail->isHTML($message);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    }

    public function registrationMail($mail,$username,$pwd)
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $mail;
        // $url = 'http://localhost/controllers/Users.php?';
        $url = 'http://localhost/Helperland/views/Homepage.php?login=true1';

        //Can Send Email Now
        $subject = "Account created";
        $message = "<h1>Hello</h1><br><p> ".$username." , </p>";
        $message .= "<p>Your new account is created please activate it using below link.</p>";
        $message .= "<p><a href = '".$url."' >Login</a></p>";
        $message .= "<br><strong>Username : </strong> ".$username;
        $message .= "<br><strong>Email : </strong> ".$mail;
        $message .= "<br><strong>Passwword : </strong> ".$pwd;
        

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    }

    public function spregistrationMail($mail,$username,$pwd)
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $mail;
        // $url = 'http://localhost/controllers/Users.php?q=logout_login';

        //Can Send Email Now
        $subject = "Account created";
        $message = "<h1>Hello</h1><br><p> ".$username." , </p>";
        $message .= "<p>Your new account is created Your account will be activated by administrator so please wait...</p>";
        $message .= "<br><strong>Username : </strong> <p>".$username."</p>";
        $message .= "<br><strong>Email : </strong> <p>".$mail."</p>";
        $message .= "<br><strong>Passwword : </strong> <p>".$pwd."</p>";
        

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->IsHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    }

    public function sendUpdationByAdmin($email,$username,$serviceid,$adminname){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $Email = $email;
        // $url = 'http://localhost/controllers/Users.php?q=logout_login';

        //Can Send Email Now
        $subject = "Service Updated By Admin";
        $message = "<h1>Hello</h1><br><p> ".$username." , </p>";
        $message .= "<p>Your Booked/Accepted service ".$serviceid." is updated by ".$adminname."</p>";
        
        

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->IsHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();
    }

    
}

$init = new client_service_request_confirmation_mail;
// $init->sendEmail();



