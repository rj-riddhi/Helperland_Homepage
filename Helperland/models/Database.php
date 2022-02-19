<?php
	
	class Database{
		private $host = "localhost";
		private $username = "root";
		private $pass = "";
		private $db = "helperland";
		private $conn;


	 function __construct(){
	 	$this->conn = $this->connectDB();
	 }

	 function connectDB(){

	 	$conn = mysqli_connect($this->host,$this->username,$this->pass,$this->db) or die("Not connected");
	 	return $conn;
	 }

	 	// Find user by email or uername

	public function findUserByEmailOrUsername($email,$username){
		$select_query = "SELECT * FROM user where FirstName='$username' OR Email = '$email' ";
		$result = mysqli_query($this->conn , $select_query);
		$array = mysqli_fetch_assoc($result);
		$row = mysqli_num_rows($result);

		// check result

		if($row > 0){
			return array('result'=>$result,'array'=>$array);
		}
		else
		{
			return false;
		}

	}

	//Contact us
	public function contact($contact){
		$name = $contact['Name'];
		$email = $contact['Email'];
		$phone = $contact['phone'];
		$sub = $contact['sub'];
		$msg = $contact['msg'];
		$insert_query = "INSERT INTO contactus (Name,Email,Subject,PhoneNumber,Message) VALUES ('$name','$email','$sub','$phone','$msg')" ;
		
		$result_insert = mysqli_query($this->conn , $insert_query);

		if($result_insert)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Register new unique user
	public function register($data){
		$Firstname = $data['usersFirstName'];
		$LastName = $data['usersLastName'];
		$Email = $data['usersEmail'];
		$Password = $data['usersPwd'];
		$Mobile = $data['phone'];
		$UserTypeId = $data['userTypeId'];
		$IsRegisteredUser = $data['isregistered'];
		$CreatedDate = $data['creationDate'];
		$IsActive = $data['isactive'];
		$Status = $data['status'];
	
		$insert_query = "INSERT INTO user (FirstName,LastName,Email,Password,Mobile,UserTypeId,IsRegisteredUser,CreatedDate,IsActive,Status) VALUES ('$Firstname','$LastName','$Email','$Password','$Mobile','$UserTypeId','$IsRegisteredUser','$CreatedDate','$IsActive','$Status')" ;
		
		$result_insert = mysqli_query($this->conn , $insert_query);

		if($result_insert)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

    //Login user
    public function login($email, $password){
        $row = $this->findUserByEmailOrUsername($email, $email);

        if($row == false) return false;
        $array = $row['array'];
        $hashedPassword =  $array['Password'];
        
        if(password_verify($password, $hashedPassword)){
            return $array['FirstName']." ".$array['LastName'];
        }else{
            return false;
        }
    }

    // Reset Password
    public function resetPassword($newPwdHash , $tokenEmail){
    	$query_update = "UPDATE user SET Password = '$newPwdHash' WHERE Email = '$tokenEmail'";
    	$result_update = mysqli_query($this->conn , $query_update);

    	if($result_update){
    		return true;
    	}
    	else
    	{
    		return flase;
    	}
    }

    public function avilablepostalcode($postalcode){
    	
    	$select_query = "SELECT * FROM zipcode WHERE ZipcodeValue = $postalcode";
		$result = mysqli_query($this->conn , $select_query);
		// $array = mysqli_fetch_assoc($result);
		 $row = mysqli_num_rows($result);
		 return $row;

    }
    public function City($pincode)
    {

        $select_query  = " SELECT
        zipcode.ZipcodeValue,
        city.CityName, state.StateName  FROM zipcode 
      JOIN city
        ON zipcode.CityId = city.Id  AND ZipcodeValue = $pincode
		JOIN state 
        ON state.Id = city.StateId";
        $result = mysqli_query($this->conn,$select_query);
        $array = mysqli_fetch_assoc($result);
		$zipcode = $array['ZipcodeValue'];
        $city = $array['CityName'];
        $state = $array['StateName'];
		return array($city, $state);
    }
    public function saveaddress($service_data)
    {
    	$userid = $service_data['userid'];
    	$addresslinee1 = $service_data['street'];
    	$addresslinee2 = $service_data['housenumber'];
    	$city = $service_data['city'];
    	$state = $service_data['state'];
    	$postalcode = $service_data['postalcode'];
    	$mobile = $service_data['phone'];
    	$email = $service_data['email'];

    	$insert_query = "INSERT INTO useraddress (UserId , AddressLine1	 , AddressLine2 , City ,State,  PostalCode , Mobile , Email)
        VALUES ($userid,'$addresslinee1','$addresslinee2','$city','$state','$postalcode','$mobile','$email')";
        $result = mysqli_query($this->conn,$insert_query);
       
        return $result;
    }
    public function getAddresses($result){
    	$select_query = "SELECT * FROM useraddress WHERE PostalCode = '$result'";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	$row = mysqli_num_rows($result);
    	return array($row, $array);
    }

    public function favourite_sp($userid){
    	$select_query = "SELECT * FROM favoriteandblocked WHERE UserId = '$userid'";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	$row = mysqli_num_rows($result);
    	return array($row,$array);
    }
    public function getuserid($email){
    	$select_query = "SELECT * FROM user where Email = '$email' ";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	return $array;
    }
    public function GetUser($targetuserid){
    	$select_query = "SELECT * FROM user where UserId = '$targetuserid' ";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	return $array;
    }

    public function Serviceadd($data){
        $userid = $data['userid'];
        $date = $data['date'];
        $time = $data['time'];
        $postalcode = $data['postalcode'] ;
        $servicehourate = $data['servicehourate'] ;
        $hrs = $data['hrs'];
        $extrahrs = $data['extrahrs'];
        $totalhrs = $data['totalhrs'];
        $bed = $data['bed'];
        $bath = $data['bath'] ;
        $subtotal = $data['subtotal'];
        $discount = $data['discount'];
        $totalcost = $data['totalcost'];
        $effectivecost = $data['effectivecost'];
        $extraservices = $data['extraservices'];
        $comment = $data['comment'];
        $addid = $data['addid'];
        $paymentrefno = $data['paymentrefno'];
        $paymentdue = $data['paymentdue'];
        $pets = $data['pets'];
        $creationdate = date('d-m-Y');
        $paymentdone = $data['paymentdone'];
        $recordversion = $data['recordversion'];

        $insert_query = "INSERT INTO servicerequest ( `UserId`, `ServiceStartDate`, `ServiceTime`, `ZipCode`,  `ServiceHourlyRate`, `ServiceHours`, `ExtraHours`, `TotalHours`, `TotalBed`, `TotalBath`, `SubTotal`, `Discount`, `TotalCost`, `EffectiveCost`, `ExtraServices`, `Comments`, `AddressId`, `PaymentTransactionRefNo`, `PaymentDue`, `HasPets`, `Status`, `CreatedDate`,  `PaymentDone`, `RecordVersion`)
     VALUES ($userid,$date,$time,$postalcode,$servicehourate,$hrs,$extrahrs,$totalhrs,$bed,$bath,$subtotal,$discount,$totalcost,$effectivecost,$extraservices,$comment,$addid,$paymentrefno,$paymentdue,$pets,$creationdate,$paymentdone,$recordversion)";

        $result = mysqli_query($this->conn,$insert_query);
        $array = mysqli_fetch_assoc($result);
        return $array['ServiceRequestId'];

    }


	}
?>
