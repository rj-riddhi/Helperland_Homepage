<?php
class Connection
{

    private  $host = "localhost";
	private $username = "root";
	private $pass = "";
	private $db = "helperland";
	private $conn;


	 function __construct(){
	 	$this->conn = $this->connectDB();
	 }

	 function connectDB(){

	 	$conn = mysqli_connect($this->host,$this->username,$this->pass,$this->db);
	 	return $conn;
	 }

    public function ContactUs($array)
    {
         $name = $array['name'];
         $email = $array['email'];
         $sub = $array['sub'];
         $mobile = $array['mobile'];
         $msg = $array['msg'];
            $sql = "INSERT INTO contactus (Name , Email , Subject , PhoneNumber , Message)
            VALUES ('$name' ,'$email','$sub','$mobile','$msg')";
            $result =mysqli_query($this->conn, $sql);
            return $result;
           
            if ($result = 'yes') {
                $_SESSION['message'] = "Message Has Been Sent Succesfully";
            } else {
                $_SESSION['message'] = "Your Account is not Created Please Try Again.";
            }
            return $_SESSION['message'];

            
    }

}
?>
