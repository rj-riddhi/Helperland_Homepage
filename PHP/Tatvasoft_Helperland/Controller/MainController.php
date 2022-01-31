<?php

class MainController

{
  function __construct(){
  	include 'Model/DBConnections.php';
  	$this->model = new Connection();
  }
  public function HomePage()
    {
        include("./View/homepage.php");
    }

  public function ContactUs()
    {
        
        if (isset($_POST)) {
            $base_url = "http://localhost/Tatvasoft_Helperland/View/Contact.php";
            $mobile =  $_POST['mobile'];
            $email = $_POST['email'];
            $subject = $_POST['sub'];
            $message = $_POST['message'];
            $name = $_POST['firstname'] . " " . $_POST['lastname'];
            $array = [
                'name' => $name,
                'email'=> $email,
                'mobile' => $mobile,
                'sub' => $subject,
                'msg'=> $message,
            ];
            $result = $this->model->Contactus($array);
            $_SESSION['firstname'] = $results[0];
            header('Location:' . $base_url);
            
        }
    }
}
?>

