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
            $query_update = "UPDATE user SET IsActive = '1' , Status ='1' WHERE Email = '$email'";
            $result_update = mysqli_query($this->conn , $query_update);
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

    // Change useractive status on logout
    public function changeactivestatus($email){
        $query_update = "UPDATE user SET IsActive = '0' WHERE Email = '$email'";
        $result = mysqli_query($this->conn , $query_update);
        return $result;
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
        if($array){
		$zipcode = $array['ZipcodeValue'];
        $city = $array['CityName'];
        $state = $array['StateName'];
		return array($city, $state);
    }
    else
    {
        return "error";
    }
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
        $update_query = "UPDATE useraddress SET IsDefault = '0' WHERE Email = '$email'";
        $result1 = mysqli_query($this->conn,$update_query);
        $IsDefault = 1;

    	$insert_query = "INSERT INTO useraddress (UserId , AddressLine1	 , AddressLine2 , City ,State,  PostalCode , Mobile , Email , IsDefault)
        VALUES ($userid,'$addresslinee1','$addresslinee2','$city','$state','$postalcode','$mobile','$email' , '$IsDefault')";
        $result = mysqli_query($this->conn,$insert_query);
       
        return $result;
    }
    public function updateaddress($data)
    {
        $id = $data['id'];
        $street = $data['street'];
        $housenumber = $data['housenumber'];
        $postalcode = $data['postalcode'];
        $city = $data['city'];
        $phone = $data['phone'];
        $update_query = "UPDATE useraddress SET AddressLine1 = '$street',AddressLine2 = '$housenumber',City='$city',PostalCode='$postalcode',Mobile='$phone' WHERE AddressId = '$id'";
        $result = mysqli_query($this->conn,$update_query);
        return $result;
    }
    public function Service_address($addid){
        $select_query = "SELECT * FROM useraddress WHERE AddressId = '$addid'";
        $result = mysqli_query($this->conn,$select_query);
        $array = mysqli_fetch_assoc($result);
        // $serviceid = $serviceid; 
        $addresslinee1 = $array['AddressLine1'];
        $addresslinee2 = $array['AddressLine2'];
        $City = $array['City'];
        $State = $array['State'];
        $PostalCode = $array['PostalCode'];
        $mobile = $array['Mobile'];
        $email = $array['Email'];
        $IsDefault = 1;
        $insert_query = "INSERT INTO servicerequestaddress(AddressLine1 , AddressLine2 , City , State , PostalCode , Mobile , Email)
            VALUES ('$addresslinee1','$addresslinee2','$City','$State','$PostalCode','$mobile','$email' )";
        $result2 = mysqli_query($this->conn,$insert_query);
        $update_query = "UPDATE useraddress SET IsDefault = '$IsDefault' WHERE Email = '$email'";
        $result3 = mysqli_query($this->conn,$update_query);
        return $result2;

    }
    public function getAddresses($email){
    	$select_query = "SELECT * FROM useraddress WHERE Email = '$email'";
    	$result = mysqli_query($this->conn,$select_query);
    	$row = mysqli_num_rows($result);
        $arr = array();
    	$i=0;
        while($array = mysqli_fetch_assoc($result)){
            $arr[$i] = $array;
            $i++;
        }
    return array($row,$arr);
    }
    public function getserviceresquestaddress($serviceid){

$delete_query = "DELETE a
FROM servicerequestaddress AS a 
INNER JOIN servicerequestaddress AS b ON a.ServiceRequestId = b.ServiceRequestId 
WHERE  a.Id < b.Id;";
$result1 = mysqli_query($this->conn,$delete_query);
        $select_query = "SELECT * FROM servicerequestaddress WHERE ServiceRequestId = '$serviceid'";
        $result = mysqli_query($this->conn , $select_query);
        $arr = mysqli_fetch_assoc($result);
        return $arr;
        
    }

    public function favourite_sp($userid){
    	$select_query = "SELECT * FROM favoriteandblocked WHERE UserId = '$userid' && IsBlocked = '0'";
    	$result = mysqli_query($this->conn,$select_query);
        $row = mysqli_num_rows($result);
        // echo $row;exit;
        $arr = array();
        if($result){
        $i=0;
        while($array = mysqli_fetch_assoc($result)){
            $arr[$i] = $array;
            $i++;
        }
    }
    else{
        $arr[0] = 0;
    }
    return array($row,$arr);
    }
    public function getuserid($email){
    	$select_query = "SELECT * FROM user WHERE Email = '$email' ";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	return $array;
    }
    public function GetUser($targetuserid){
    	$select_query = "SELECT * FROM user WHERE UserId = '$targetuserid' ";
    	$result = mysqli_query($this->conn,$select_query);
    	$array = mysqli_fetch_assoc($result);
    	return $array;
    }
    public function GetServiceProvider($lastname){
        $select_query = "SELECT * FROM user WHERE LastName = '$lastname'";
        $result = mysqli_query($this->conn,$select_query);
        $array = mysqli_fetch_assoc($result);
        return $array;
    }

    public function deleteservice($data){
        $delet_query = "DELETE FROM servicerequest WHERE ServiceId = '$data'";
        $result = mysqli_query($this->conn,$delet_query);
        return $result;
    }
    public function updatestatustodelete($data){
        $update_query = "UPDATE servicerequest SET Status = 'Cancelled' WHERE ServiceId = '$data'";
        $result = mysqli_query($this->conn,$update_query);
        $select_query = "SELECT ServiceProviderId FROM servicerequest WHERE ServiceId = '$data'";
        $result2 = mysqli_query($this->conn,$select_query);
        $arr = mysqli_fetch_assoc($result2);
        return array($result,$arr);
    }
    public function delteserviceadd($email){
        $delet_query = "DELETE FROM servicerequestaddress WHERE Email = '$email' ";
        $result = mysqli_query($this->conn,$delet_query);
        return $result;

    }
    public function addserviceid($adddressline1,$ServiceId){

        $update_query = "UPDATE servicerequestaddress SET ServiceRequestId = '$ServiceId' WHERE AddressLine1 = '$adddressline1'";
        $result = mysqli_query($this->conn,$update_query);
        // echo mysqli_num_rows($result);
        return $result;
        // $select_query = "SELECT ServiceId FROM `servicerequest` WHERE ServiceRequestId=(SELECT LAST_INSERT_ID())";

    }
    public function Serviceadd($data){
        $userid = $data['userid'];
        $Serviceid = $data['Serviceid'];
        $date = $data['date'];
        $time = $data['time'];
        $date_time = $date.' '.$time;
        $postalcode = $data['postalcode'] ;
        $servicehourate = $data['servicehourate'] ;
        $hrs = $data['hrs'];
        $extrahrs = $data['extrahour'];
        $totalhrs = $data['hrs'];
        $bed = $data['bed'];
        $bath = $data['bath'] ;
        $subtotal = $data['subtotal'];
        $discount = $data['discount'];
        $totalcost = $data['subtotal'];
        $effectivecost = $data['effectivecost'];
        $extraservices = $data['extraservice'];
        $comment = $data['comments'];
        $addid = $data['addid'];
        $paymentrefno = $data['paymentrefno'];
        $paymentdue = $data['paymentdue'];
        $pets = $data['pets'];
        $creationdate = date('Y/m/d');
        $paymentdone = $data['paymentdone'];
        $recordversion = $data['recordversion'];
        $status = $data['status'];
        $selctedsp = $data['selectedsp'];
        $spid = $data['spid'];
        $ModifiedBy = $data['userid'];
        $PaymentDone = 1;

         $insert_query = "INSERT INTO `servicerequest` (UserId,ServiceId,ServiceStartDate , ZipCode , ServiceHourlyRate , ServiceHours , ExtraHours , SubTotal , Discount , TotalCost , Comments , PaymentTransactionRefNo , PaymentDue , ServiceProviderId,  HasPets , Status , CreatedDate , ModifiedBy , RecordVersion , PaymentDone) 
        VALUES ('$userid','$Serviceid','$date_time','$postalcode','$servicehourate','$hrs','$extrahrs','$subtotal','$discount','$totalcost','$comment','$paymentrefno','$paymentdue','$spid','$pets','$status','$creationdate' , '$ModifiedBy' , '$recordversion' , '$PaymentDone')";
      
        $result = mysqli_query($this->conn,$insert_query);
        $select_query = "SELECT ServiceId FROM `servicerequest` WHERE ServiceRequestId=(SELECT LAST_INSERT_ID())";
        $result2 = mysqli_query($this->conn,$select_query);

        $array = mysqli_fetch_assoc($result2);
        // echo $array;
        return $array;

    }

    public function GetActiveServiceProvider(){
        $select_query = "SELECT * FROM `user` WHERE UserTypeId = '2' && IsDeleted = '0' && WorksWithPets = '1'";
        $result = mysqli_query($this->conn , $select_query);
        $i=0;
        while($array = mysqli_fetch_assoc($result)){
            $arr[$i] = $array['Email'];
            $i++;
    }
    return $arr;
        }
        public function GetAllActiveServiceProvider(){
        $select_query = "SELECT * FROM `user` WHERE UserTypeId = '2' && IsDeleted = '0'";
        $result = mysqli_query($this->conn , $select_query);
        $i=0;
        while($array = mysqli_fetch_assoc($result)){
            $arr[$i] = $array['Email'];
            $i++;
    }
    return $arr;
        }


    public function getTableData($userid){
        $select_query = "SELECT ServiceId,ServiceHours,Comments,HasPets,ServiceStartDate,ServiceProviderId,TotalCost From `servicerequest` WHERE UserId = '$userid' && Status = 'pending'";
        $result = mysqli_query($this->conn , $select_query);
         $i=0;
        $arr = array();
        while($array = mysqli_fetch_assoc($result)){
           $arr[$i] = $array;

            $i++;
      
     
    }
    return ($arr);
}
    public function getHistoryData($userid){
        $select_query = "SELECT ServiceId,ServiceHours,Comments,HasPets,Status,ServiceStartDate,ServiceProviderId,TotalCost From `servicerequest` WHERE UserId = '$userid' && Status != 'pending'";
        $result = mysqli_query($this->conn , $select_query);
         $i=0;
        $arr = array();
        while($array = mysqli_fetch_assoc($result)){
           $arr[$i] = $array;

            $i++;
      
     
    }
return ($arr);
        }

        public function getextras($id){
            $select_query = "SELECT * FROM extraservices WHERE ServiceRequestId = '$id'";
            $result = mysqli_query($this->conn , $select_query);
            $arr = mysqli_fetch_assoc($result);
            return $arr;
        }

        public function checkspotherrequests($date,$time,$id,$spid){
             $date1 = date('Y-m-d',(strtotime($date)));
            $date_time = $date1 ." ".$time;
            $select_query = "SELECT ServiceStartDate,ServiceHours FROM servicerequest WHERE ServiceId != '$id' && ServiceProviderId = '$spid' ";
            $result = mysqli_query($this->conn,$select_query);
            $arr = mysqli_fetch_assoc($result);
            // echo $arr['ServiceStartDate'];exit;
            return $arr;
        }

        public function updateservice($id,$date,$time){
            $date1 = date('Y-m-d',(strtotime($date)));
            $date_time = $date1 ." ".$time;
            // echo $date_time;exit;
            $update_query = "UPDATE servicerequest SET ServiceStartDate = '$date_time', ModifiedDate = '$date_time' WHERE ServiceId = '$id'";
            $result = mysqli_query($this->conn,$update_query);
            $select_query = "SELECT * FROM servicerequest WHERE ServiceId = '$id'";
            $result2 = mysqli_query($this->conn,$select_query);
            $arr = mysqli_fetch_assoc($result2);
            return $arr;
        }
        public function getsprating($id){
            $select_query = "SELECT Ratings FROM rating WHERE RatingTo = '$id'";
            $result = mysqli_query($this->conn,$select_query);
            $i=0;
        $arr = array();
        $rate = 0;
        $rows = mysqli_num_rows($result);
        while($array = mysqli_fetch_assoc($result)){
           $arr[$i] = $array['Ratings'];
           $rate += $arr[$i];
            $i++;
      
     
    }
    if($rows != 0){
  $rate  = $rate/$rows;
}
else
{
    $rate = $rate;
}
            // $arr = mysqli_fetch_assoc($result);
            return $rate;
        }

        public function ratesp($data){
            $avgrating = $data['avgrating'];
            $ontime = $data['ontime'] ;
            $friendly = $data['friendly'];
            $quality = $data['quality'];
            $feedback = $data['feedback'];
            $spname = $data['spname'];
            $serviceid = $data['serviceid'];
            $date = $data['date'];
            $customer = $data['customer'] ;

            $insert_query = "INSERT INTO rating (ServiceRequestId,RatingFrom,RatingTo,Ratings,Comments,RatingDate,OnTimeArrival,Friendly,QualityOfService) VALUES ('$serviceid','$customer','$spname','$avgrating','$feedback','$date','$ontime','$friendly','$quality')" ;
        
            $result = mysqli_query($this->conn , $insert_query);
            return $result;
        }

        public function updatedetails($data){
            $oldemail = $_SESSION['email'];
            $firstname  = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $phone = $data['phone'];
            $birthdate = $data['birthdate'];
            $language = $data['language'];
            $date = date('Y/m/d');
            $modifierid = $data['modifierid'];

            $update_query = "UPDATE user SET FirstName = '$firstname', LastName = '$lastname' , Email = '$email' , Mobile = '$phone' , DateOfBirth = '$birthdate' , LanguageId = '$language' , ModifiedDate = '$date' , ModifiedBy = '$modifierid' WHERE Email = '$oldemail'";
            $result = mysqli_query($this->conn,$update_query);
            return $result;
        }

        // Service Provider functions

        public function getNewServiceRequest(){
            $select_query = "SELECT * FROM servicerequest WHERE Status = 'pending' && ServiceProviderId = '0'";
            $result = mysqli_query($this->conn,$select_query);
           
            $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;

            $i++;
            }
            return ($arr);

        }

        public function requestaccepted($data){
            $serviceid = $data['serviceid'];
            $spid = $data['spid'];
            $date = $data['date'];
            $query_update = "UPDATE servicerequest SET ServiceProviderId = '$spid', SPAcceptedDate = '$date' WHERE ServiceId = '$serviceid'";
            $result = mysqli_query($this->conn , $query_update); 
            return $result;


        }

        public function getServiceById($serviceid){
            $select_query = "SELECT * FROM servicerequest WHERE ServiceId = '$serviceid'";
            $result = mysqli_query($this->conn,$select_query);
            $array = mysqli_fetch_assoc($result);
            return $array;
        }

        public function checkServicesForTimeConflict($date,$serviceid,$spid){
            $select_query = "SELECT * FROM servicerequest WHERE ServiceId != '$serviceid' && ServiceProviderId = '$spid' && ServiceStartDate = '$date'";
            $result = mysqli_query($this->conn,$select_query);
            $array = mysqli_fetch_assoc($result);
            return $array;
        }

        // Upcoming service page functions

        public function getUpcomingServiceRequest($spid){
             $select_query = "SELECT * FROM servicerequest WHERE ServiceProviderId = '$spid'";
            $result = mysqli_query($this->conn,$select_query);
           
            $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;

            $i++;
            }
            return ($arr);
        }

        public function markServiceAsCompleted($serviceid){
            $update_query = "UPDATE servicerequest SET Status = 'Completed' WHERE ServiceId = '$serviceid'";
            $result = mysqli_query($this->conn,$update_query);
            return $result;
        }

        public function getServiceStartDate($userid){
            $select_query = "SELECT * FROM servicerequest WHERE ServiceProviderId = '$userid'";
            $result = mysqli_query($this->conn,$select_query);
            $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;

            $i++;
            }
            return ($arr);

            
        }


        // Service Provider History Functions

        public function getServiceProviderHistory($spid){
            $select_query = "SELECT * FROM servicerequest WHERE ServiceProviderId = '$spid' &&  Status = 'Completed'";
            $result = mysqli_query($this->conn,$select_query);
           
            $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;

            $i++;
            }
            return ($arr);
        }

        // Service Provider My Settings Functions
        public function updateSpDetails($data){
            $oldemail = $_SESSION['email'];
            $firstname  = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $phone = $data['phone'];
            $birthdate = $data['birthdate'];
            $nationality = $data['nationality'];
            $gender = $data['gender'];
            $avtar = $data['avtar'];
            $date = date('Y/m/d');
            $modifierid = $data['modifierid'];
            $postalcode = $data['postalcode'];

            $update_query = "UPDATE user SET FirstName = '$firstname', LastName = '$lastname' , Email = '$email' , Mobile = '$phone' , DateOfBirth = '$birthdate' , NationalityId = '$nationality' , ModifiedDate = '$date' , ModifiedBy = '$modifierid' , Gender = '$gender' , UserProfilePicture = '$avtar' , ZipCode = '$postalcode' WHERE Email = '$oldemail'";
            $result = mysqli_query($this->conn,$update_query);
            return $result;
        }

        public function saveSpAddress($service_data)
    {
        $userid = $service_data['userid'];
        $addresslinee1 = $service_data['street'];
        $addresslinee2 = $service_data['housenumber'];
        $city = $service_data['city'];
        $state = $service_data['state'];
        $postalcode = $service_data['postalcode'];
        $mobile = $service_data['phone'];
        $email = $service_data['email'];
        $IsDefault = 1;

        $insert_query = "INSERT INTO useraddress (UserId , AddressLine1  , AddressLine2 , City ,State,  PostalCode , Mobile , Email , IsDefault)
        VALUES ($userid,'$addresslinee1','$addresslinee2','$city','$state','$postalcode','$mobile','$email' , '$IsDefault')";
        $result = mysqli_query($this->conn,$insert_query);
       
        return $result;
    }

    // Block Customer Functions
    public function getBlockCustomers($spid)
    {
        $select_query = "SELECT DISTINCT UserId from servicerequest WHERE ServiceProviderId = '$spid' && Status = 'completed'";
        $result = mysqli_query($this->conn,$select_query);
        $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;
            $i++;
            }
            return ($arr);

    }

    public function blockCustomer($userid,$targetuserid){
        $query_update = "UPDATE favoriteandblocked SET IsBlocked ='1' WHERE UserId = '$userid' && TargetUserId = '$targetuserid'";
        $result = mysqli_query($this->conn , $query_update);
        if($result){
            $insert_query = "INSERT INTO favoriteandblocked (UserId,TargetUserId,IsBlocked) VALUES ('$targetuserid','$userid','1')";
            $result2 = mysqli_query($this->conn,$insert_query);
            return $result2;
        }
        else{
            return $result;
        }
        
    }
    public function unBlockCustomer($userid,$targetuserid){
        $query_update = "UPDATE favoriteandblocked SET IsBlocked ='0' WHERE UserId = '$userid' && TargetUserId = '$targetuserid'";
        $result = mysqli_query($this->conn , $query_update);
        if($result){
            $update_query = "UPDATE favoriteandblocked SET IsBlocked ='0' WHERE UserId = '$targetuserid' && TargetUserId = '$userid'";
            $result2 = mysqli_query($this->conn,$update_query);
            return $result2;
        }
        else{
            return $result;
        }

    }

    // Service Provider Ratings
    public function getSpRatings($spid){
        $select_query = "SELECT DISTINCT * From rating WHERE RatingTo = '$spid'";
        $result = mysqli_query($this->conn,$select_query);
        $i=0;
            $arr = array();
            while($array = mysqli_fetch_assoc($result)){
             $arr[$i] = $array;
            $i++;
            }
            return ($arr);
    }


    }
?>