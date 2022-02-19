<?php 
require_once '../models/Database.php';
require_once '../models/ResetPassword.php';
require_once '../helpers/msgs.php';
class Users{

	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;

	}
	public function contactUs(){
		$contact = [
			'Name' => $_POST['FirstName']. " " .$_POST['LastName'],
			'Email' => $_POST['Email'],
			'sub'=>$_POST['sub'],
			'phone'=>$_POST['phone'],
			'msg'=>$_POST['msg']
		];

		// Validate inputs
		if(empty($contact['Name']) || empty($contact['Email']) || empty($contact['phone']) || empty($contact['sub']) || empty($contact['msg']))
		{
                flash('contact', 'Please fill out all inputs');
                redirect('../views/Contact.php');
		}
		// Message sent succesfull or not
		if($this->usermodel->contact($contact)){
			$_SESSION['mesaage'] = $contact['msg'];
			flash('succesmsg','Your message sent successfully','form-message form-message-green text-center text-success');
			redirect("../views/Contact.php");
		}
		else
		{
			echo "<h1>Message not sent</h1>";
		}


	}
	public function customerRegister(){
		//$baseurl = "localhost/Helperland/customerRegister.php";
		$data = [
			'usersFirstName' => $_POST['usersFirstName'],
			'usersLastName' => $_POST['usersLastName'],
			'usersEmail' => $_POST['usersEmail'],
			'phone'=>$_POST['phone'],
			'usersPwd' => $_POST['usersPwd'],
			'pwdRepeat' => $_POST['pwdRepeat'],
			'userTypeId' => 1,
			'creationDate'=>date('Y-m-d H:i:s'),
			'currentTime'=>time(),
			'status' => 'New', 
			'isregistered' => 'YES',
			'isactive' => 'No'
			//date('Y-m-d H:i:s'),
            //'resetkey' => $resetkey,
			//'roleid' => 'Customer',
		
            

		];

		// Validate inputs
		if(empty($data['usersFirstName']) || empty($data['usersLastName']) || empty($data['usersEmail']) || empty($data['phone']) || empty($data['usersPwd']) || empty($data['pwdRepeat']))
		{
                flash("register", "For registering Please fill out all inputs");
            redirect('../views/customerRegister.php');
		}


		if(!filter_var($data['usersEmail'],FILTER_VALIDATE_EMAIL)){
			flash("register","Invalid Email");
			redirect("../views/customerRegister.php");
		}
		
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,14}$/" ,$data['usersPwd'])){
			flash("register","Please make strong password");
			redirect("../views/customerRegister.php");
		}
		else if ($data['usersPwd'] !== $data['pwdRepeat']){
			flash("register","Passwords are don't match");
			redirect("../views/customerRegister.php");
		}

		// User with same email or password already exist
		if($this->usermodel->findUserByEmailOrUsername($data['usersEmail'],$data['usersFirstName'])){

			flash("register","Username or Email already exist");
			redirect("../views/customerRegister.php");
		}
		// Password hashing

		$data['usersPwd'] = password_hash($data['usersPwd'],PASSWORD_BCRYPT);

		// Registration succesfull or not
		if($this->usermodel->register($data)){
			$_SESSION['UserName'] = $data['usersFirstName'];
			$this->createUserSession($data['usersFirstName']." ".$data['usersLastName']);
			?>
			<script type="text/javascript">
				alert ("Registerd succesfully");
			</script>
			<?php
			flash("register","Succesfully account created");
			redirect("../views/customer_service_history.php");
		}
		else
		{
			echo "<h1>Account is not created ,please fill form proper</h1>";
		}

}
	public function serviceprovider_Register(){
		//$baseurl = "localhost/Helperland/customerRegister.php";
		$data = [
			'usersFirstName' => $_POST['usersFirstName'],
			'usersLastName' => $_POST['usersLastName'],
			'usersEmail' => $_POST['usersEmail'],
			'phone'=>$_POST['phone'],
			'usersPwd' => $_POST['usersPwd'],
			'pwdRepeat' => $_POST['pwdRepeat'],
			'userTypeId' => 2,
			'creationDate'=>date('Y-m-d H:i:s'),
			'currentTime'=>time(),
			'status' => 'New', 
			'isregistered' => 'YES',
			'isactive' => 'No'
			//date('Y-m-d H:i:s'),
            //'resetkey' => $resetkey,
			//'roleid' => 'ServiceProvider'
		
            

		];

		// Validate inputs
		if(empty($data['usersFirstName']) || empty($data['usersLastName']) || empty($data['usersEmail']) || empty($data['phone']) || empty($data['usersPwd']) || empty($data['pwdRepeat']))
		{
                flash("register", "For registering Please fill out all inputs");
            redirect('../views/Become_a_Pro.php');
		}


		if(!filter_var($data['usersEmail'],FILTER_VALIDATE_EMAIL)){
			flash("register","Invalid Email");
			redirect("../views/Become_a_Pro.php");
		}
		
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,14}$/" ,$data['usersPwd'])){
			flash("register","Please make strong password");
			redirect("../views/Become_a_Pro.php");
		}
		else if ($data['usersPwd'] !== $data['pwdRepeat']){
			flash("register","Passwords are don't match");
			redirect("../views/Become_a_Pro.php");
		}

		// User with same email or password already exist
		if($this->usermodel->findUserByEmailOrUsername($data['usersEmail'],$data['usersFirstName'])){

			flash("register","Username or Email already exist");
			redirect("../views/Become_a_Pro.php");
		}
		// Password hashing

		$data['usersPwd'] = password_hash($data['usersPwd'],PASSWORD_BCRYPT);

		// Registration succesfull or not
		if($this->usermodel->register($data)){
			$this->createUserSession($data['usersFirstName']." ".$data['usersLastName']);
			?>
			<script type="text/javascript">
				alert ("Registerd succesfully");
			</script>
			<?php
			flash("register" , "Registration succesfull" , "alert alert-success");
			redirect("../views/upcoming_service.php");
		}
		else
		{
			echo "<h1>Account is not created ,please fill form proper</h1>";
		}

}


	public function login(){
        

        //Init data
        $data=[
            'Email' => trim($_POST['Email']),
            'usersPwd' => trim($_POST['password'])
        ];

        if(empty($data['Email']) || empty($data['usersPwd'])){
            flash("login", "Please fill out all inputs");
            header("location: ../views/Homepage.php");
            exit();
        }

        //Check for user/email
        if($this->usermodel->findUserByEmailOrUsername($data['Email'], $data['Email'])){
            //User Found
            $loggedInUser = $this->usermodel->login($data['Email'], $data['usersPwd']);
            if($loggedInUser){
                //Create session
				$_SESSION['email'] = $data['Email'];
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect("../views/Homepage.php");
            }
        }else{
            flash("login", "No user found");
            redirect("../views/Homepage.php");
        }
    }
    public function City()
    {		echo "<script>alert('called')</script>";exit;
            // $pincode = $_SESSION['postalcode'];
            // $result = $this->usermodel->City($pincode);
           	// $city = $result[0];
            // $state = $result[1];
            // $return = [$city, $state];
            // echo json_encode($return);exit;
        
    }

    
	public function book_service_schedule_plan(){
		
		$service_data=[
			'bath' =>trim($_POST['bath']),
			'bed' =>trim($_POST['bed']),
			'date' =>trim($_POST['date']),
			'time' =>trim($_POST['time']),
			'hrs' =>trim($_POST['hrs']),
			'comment'=>trim($_POST['comment']),
			'pets' =>$_POST['pets']

		];
		if(empty($service_data['bath'] || $service_data['bed'] || $service_data['date'] || $service_data['hrs'] || $service_data['time']))
		{
			flash("book_service","Please fill all details");
			redirect("../views/book_service.php");
		}
		if($service_data['bath']<1){
			flash('error',"Min 1 bath should select");
			redirect("../views/book_service.php");
		}
		if($service_data['bed'] < 1){
			flash('error','Min 1 bed should select');
			redirect("../views/book_service.php");
		}
			 $_SESSION['bed'] = $service_data['bed'];
			 $_SESSION['bath'] = $service_data['bath'];
			 $_SESSION['date'] = $service_data['date'];
			 $_SESSION['comment'] = $service_data['comment'];
		if($service_data['date'] < date('m/d/Y'))
		{
			flash("book_service","Please enter valid date");
			redirect("../views/book_service.php");
		}
		$_SESSION['date'] = $service_data['date'];
		if(empty($service_data['time']))
		{
			flash("book_service","Please enter time");
			redirect("../views/book_service.php");
		}
		$_SESSION['time'] = $service_data['time'];
		if($service_data['hrs']<3 || empty($service_data['hrs'])){
			flash("book_service","Minimum selected hours are 3");
			redirect("../views/book_service.php");
		}
		$_SESSION['hrs'] = $service_data['hrs'];
		
		
		if(isset($service_data['pets']))
		{
			$_SESSION['pets']="Yes";
			$service_data['pets'] = "Yes";
		}
		else
		{
			$service_data['pets']="No";
		}
		// $this->favourite_sp();
		echo json_encode($service_data);

		flash("book_service","If you want extra services then please select other wise press next","alert alert-success");
		redirect("../views/book_service.php");


	}
	

	public function saveaddress(){
		$pincode = $_SESSION['postalcode'];
		$result =$this->usermodel->City($pincode);
		$city = $result[0];
        $state = $result[1]; 
		$email = $_SESSION['email'];
		$id = $this->usermodel->getuserid($email);
		$userid = $id['UserId'];
		$service_data=[
			'street' =>trim($_POST['street']),
			'housenumber' =>trim($_POST['housenumber']),
			'phone' =>trim($_POST['phone']),
			'postalcode'=>$pincode,
			'email'=>$email,
			'userid' => $userid,
			'city'=>$city,
			'state'=>$state
		];
		if(empty($service_data['street']||$service_data['housenumber']||$service_data['phone'])){
			flash("saveaddress","Please enter all details");
			redirect("../views/book_service.php");
		}
		$session['userid'] = $service_data['userid'];
		
		$result = $this->usermodel->saveaddress($service_data);
		if($result)
		{
			redirect("../views/book_service.php?fourth_step=true");
		}
		else
		{
			flash("saveaddress","Adress is not saved try again");
		}
	}
	
	
     
    
    public function createUserSession($user){
        
        $_SESSION['FirstName'] = $user;
        redirect("../views/customer_service_history.php");
    }

    public function logout(){

    	unset($_SESSION['FirstName']);
    	session_unset();
    	session_destroy();

    	redirect("../views/Homepage.php");



    }

}
$init = new Users;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	switch ($_POST['type']){
		 case 'contact' :
		 $init->contactUs();
		 break;

		 case 'register' :
		 $init->customerRegister();
		 break;

		 case 'service_provider' :
		 $init->serviceprovider_Register();
		 break;

		 case 'login' :
		 $init->login();
		 break;

		 case 'book_service_schedule_plan':
		 $init->book_service_schedule_plan();
		 break;

		 default:
		 redirect("../views/Homepage.php");
	}
}
else
{
	switch($_GET['q']){
		case 'home' :
			redirect("../views/Homepage.php");
			break;
		case 'login':
			redirect("../views/Homepage.php?login=true");
			break;
		case 'about' :
			redirect("../views/About.php");
			break;
		case 'faq' :
			redirect("../views/FAQ.php");
			break;
		case 'contact' : 
			redirect("../views/Contact.php");
			break;
		case 'prices' :
			redirect("../views/Prices.php");
			break;
		case 'serviceprovider' :
			redirect("../views/Become_a_Pro.php");
			break;
		case 'logout' :
			$init->logout();
			break;
		case 'book_now':
			redirect("../views/book_service.php");
			break;
		case 'validpostal':
			$init->validpostal();
			break;
		
		default:
			redirect("../views/Homepage.php");

	}
}

?>
