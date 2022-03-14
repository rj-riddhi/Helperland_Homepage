<?php
require_once 'Database.php';
	class ResetPassword{
		private $db;
		private $conn;
		public function __construct()
		{
			$this->db = new Database;
			$this->conn = $this->db->connectDB();
			
		}

		public function deleteEmail($email){
			$query_delete = "DELETE FROM pwdreset WHERE pwdResetEmail = '$email'";
			$result = mysqli_query($this->conn,$query_delete);
			// $row = mysqli_num_rows($result);
			//Execute
			// if($row>0)
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function insertToken($email,$selector,$hashedToken,$expires){
			$query_insert = "INSERT INTO pwdreset (pwdResetEmail , pwdResetSelector , pwdResetToken , pwdResetExpires) VALUES ('$email','$selector','$hashedToken','$expires')";
			$result_1 = mysqli_query($this->conn,$query_insert);
			if($result_1){
				return true;
			}
			else
			{
				return false;
			}
		}

		public function resetPassword($selector , $currentDate)
		{
			// $query_select = "SELECT * FROM pwdreset WHERE pwdResetSelector = '$selector' AND pwdResetExpires = '$currentDate'";
			$query_select = "SELECT * FROM pwdreset WHERE pwdResetSelector = '$selector'";
			$row = mysqli_query($this->conn,$query_select);
			$array = mysqli_fetch_assoc($row);
			$count = mysqli_num_rows($row);
			// echo "count is ".$count;exit;
			if($count > 0){
				return array('row'=>$row,'array'=>$array);
			}
			else
			{	
				return false;
			}
		}

	}
  
 ?>



