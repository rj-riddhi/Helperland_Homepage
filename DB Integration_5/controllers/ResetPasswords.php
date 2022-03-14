<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../models/ResetPassword.php';
require_once '../helpers/msgs.php';
require_once '../models/Database.php';
//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

class ResetPasswords{
    private $resetModel;
    private $userModel;
    private $mail;
    
    public function __construct(){
        $this->resetModel = new ResetPassword;
        $this->userModel = new Database;
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
        $Email = trim($_POST['Email']);

        if(empty($Email)){
            flash("reset", "Please input email");
            redirect("..views/homeNav.php");
        }

        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            flash("reset", "Invalid email");
            redirect("../views/homeNav.php");
        }
        //Will be used to query the user from the database
        $selector = bin2hex(random_bytes(8));
        //Will be used for confirmation once the database entry has been matched
        $token = random_bytes(32);
        //URL will vary depending on where the website is being hosted from
        $url = 'http://localhost/Helperland/views/create-new-password.php?selector='.$selector.'&validator='.bin2hex($token);
        //Expiration date will last for half an hour
        $expires = date("U") + 600;
        if(!$this->resetModel->deleteEmail($Email)){
            die("There was an error");
        }
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        if(!$this->resetModel->insertToken($Email, $selector, $hashedToken, $expires)){
            die("There was an error");
        }
        //Can Send Email Now
        $subject = "Reset your password";
        $message = "<p>We recieved a password reset request.</p>";
        $message .= "<p>Here is your password reset link: </p>";
        $message .= "<a href='".$url."'>".$url."</a>";

        $this->mail->setFrom('TheBoss@gmail.com');
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
        $this->mail->addAddress($Email);

        $this->mail->send();

        flash("reset", "Check your email", 'alert alert-success');
        //redirect("../views/reset-password.php");
        redirect("../views/Homepage.php");
    }

    public function resetPassword(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'selector' => ($_POST['selector']),
            'validator' => ($_POST['validator']),
            'pwd' => ($_POST['pwd']),
            'pwd-repeat' => ($_POST['pwd-repeat'])
        ];
        $url = '../views/create-new-password.php?selector='.$data['selector'].'&validator='.$data['validator'];

        if(empty($_POST['pwd'] || $_POST['pwd-repeat'])){
            flash("newReset", "Please fill out all fields");
            redirect($url);
        }else if($data['pwd'] != $data['pwd-repeat']){
            flash("newReset", "Passwords do not match");
            redirect($url);
        }else if(strlen($data['pwd']) < 6){
            flash("newReset", "Invalid password");
            redirect($url);
        }

        $currentDate = date("U");
        if(!$row = $this->resetModel->resetPassword($data['selector'], $currentDate)){
            flash("newReset", "Sorry. The link is no longer valid");
            redirect($url);
        }

        $tokenBin = hex2bin($data['validator']);
        $array = $row['array'];
        // echo ($array['pwdResetToken']);exit;
        $tokenCheck = password_verify($tokenBin, $array['pwdResetToken']);
        if(!$tokenCheck){
            flash("newReset", "You need to re-Submit your reset request");
            redirect($url);
        }

        $tokenEmail = $array['pwdResetEmail'];
        if(!$this->userModel->findUserByEmailOrUsername($tokenEmail, $tokenEmail)){
            flash("newReset", "There was an error in finding user");
            redirect($url);
        }

        $newPwdHash = password_hash($data['pwd'], PASSWORD_DEFAULT);
        if(!$this->userModel->resetPassword($newPwdHash, $tokenEmail)){
            flash("newReset", "There was an error in reset pass");
            redirect($url);
        }

        if(!$this->resetModel->deleteEmail($tokenEmail)){
            flash("newReset", "There was an error in delete user");
            redirect($url);
        }

        flash("login", "Password Updated", 'alert alert-success');
        redirect("../views/Homepage.php?login=true");
    }
}

$init = new ResetPasswords;

//Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'send':
            $init->sendEmail();
            break;
        case 'reset':
            $init->resetPassword();
            break;
        default:
        redirect("../index.php");
    }
}else{
     redirect("../index.php");
}




