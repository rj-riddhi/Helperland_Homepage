<?php
	
	class Database{
		private $host = "localhost";
		private $username = "root";
		private $pass = "";
		private $db = "helperland";
		private $conn;


	 function __construct(){
	 	$this->conn = $this->connectDB();
	 	if($this->conn)
	 	{
	 		?>
	 		<script>
	 			alert("Database Connected");
	 		</script>
	 		<?php
	 	}
	 	else
	 	{
	 		?>
	 		<script>
	 			alert("Not connected");
	 		</script>
	 		<?php
	 	}

	 }

	 function connectDB(){

	 	$conn = mysqli_connect($this->host,$this->username,$this->pass,$this->db);
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


	}
?>