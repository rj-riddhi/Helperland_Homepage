<?php
require_once '../models/Database.php';
require_once '../models/ResetPassword.php';
require_once '../controllers/Mail_for_serviceproviders.php';
require_once '../controllers/client_service_request_confirmation_mail.php';
require_once '../helpers/msgs.php';
// require_once '../controllers/Users.php';
class Book_Service{
	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;
		$this->mailsys = new Mail_for_serviceproviders;
		$this->mailsys2 = new client_service_request_confirmation_mail;
		 // $this->users = new Users;
	}
	public function book_service_postal(){
	 
		// take all json datab in input variable
 $input = file_get_contents('php://input');
// decode json data
$decode = json_decode($input,true);
 $postalcode = $decode["postalcode"];
$validpostal = $this->validpostal($postalcode);
if($validpostal > 0){
	$_SESSION['postalcode'] = $postalcode;
	echo json_encode(array('insert' => 'success'));
}
else{
	echo json_encode(array('insert' => 'failed'));
}
}

public function book_service_schedule_plan(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$bath = $decode['bath'];
	$bed = $decode['bed'];
	$date = $decode['date'];
	$hrs = $decode['hrs'];
	$time = $decode['time'];
	$comment = $decode['comment'];
	$pets = $decode['pets'];

		if(empty($bath || $bed || $date || $hrs || $time))
		{
			flash("book_service","Please fill all details");
			
		}
		if($bath<1){
			flash('error',"Min 1 bath should select");
			// redirect("../views/book_service.php");
		}
		if($bed < 1){
			flash('error','Min 1 bed should select');
			// redirect("../views/book_service.php");
		}

			 $_SESSION['bed'] = $bed;
			 $_SESSION['bath'] = $bath;
			 $_SESSION['comment'] = $comment;
		
		if($date < date('m/d/Y'))
		{
			flash("book_service","Please enter valid date");
			// redirect("../views/book_service.php");
		}
		$_SESSION['date'] = date("Y/m/d", strtotime($date));
		if(empty($time))
		{
			flash("book_service","Please enter time");
			// redirect("../views/book_service.php");
		}
		$_SESSION['time'] = $time;
		if($hrs<3 || empty($hrs)){
			flash("book_service","Minimum selected hours are 3");
			// redirect("../views/book_service.php");
		}
		else{
		$_SESSION['hrs'] = $hrs;
	}
		
		
		if(isset($pets))
		{
			$_SESSION['pets']=1;
			$pets = "Yes";
		}
		else
		{
			$pets="No";
		}
		echo json_encode(array('insert' => 'success'));



	}

public function City()
    {		
            $pincode = $_SESSION['postalcode'];
            $result = $this->usermodel->City($pincode);
           	$city = $result[0];
            $state = $result[1];
            $return = [$city, $state];
            echo json_encode($return);
        
    }
public function validpostal($service_data){
		if(empty($service_data)  || (!preg_match("/^[0-9]{6}$/" ,$service_data)))
	{
	flash("book_service","Please Enter valid 6 digit PostalCode First");
	return false;
		}
		else
		{
			$count = $this->usermodel->avilablepostalcode($service_data);
			return $count;
		}
		}

public function saveaddress(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$postalcode = $decode['postalcode'];
	$street = $decode['street'];
	$housenumber = $decode['housenumber'];
	$phone = $decode['phone'];
	$city = $decode['city'];
	$result =$this->usermodel->City($postalcode);
	$state = $result[1]; 	
    $email = $_SESSION['email'];   
	$id = $this->usermodel->getuserid($email);	
	$userid = $id['UserId'];
		
		
		$service_data=[
			'street' =>$street,
			'housenumber' =>$housenumber,
			'phone' =>$phone,
			'postalcode'=>$postalcode,
			'email'=>$email,
			'userid' => $userid,
			'city'=>$city,
			'state'=>$state
		];
		// echo $service_data['street'].' '.$service_data['housenumber'].' '.$service_data['phone'].' '.$service_data['postalcode'].' '.$service_data['email'].' '.$service_data['userid'].' '.$service_data['city'].' '.$service_data['state'];exit;
		if(empty($service_data['street']||$service_data['housenumber']||$service_data['phone'])){
			flash("saveaddress","Please enter all details");
			redirect("../views/book_service.php");
		}
		$_SESSION['userid'] = $userid;
		
		$result = $this->usermodel->saveaddress($service_data);
		if($result)
		{
			// $_SESSION['username'] = $id['FirstName']." ".$id['LastName'];
			$_SESSION['username'] = $id['FirstName'];
			echo json_encode(array('insert' => 'success'));
			
		}
		else
		{
			echo json_encode(array('insert' => 'failed'));
		}
}

public function getAddresses($result){
		$address = $this->usermodel->getAddresses($result);
		$add = $address[1];
		$count = $address[0];
		if($count){
		foreach ($add as $row){
			$addressline1 = $row['AddressLine1'];
			$addressline2 = $row['AddressLine2'];
			$phone = $row['Mobile'];
			$city = $row['City'];
			// $state = $add['State'];
			$email = $row['Email'];
			$addid = $row['AddressId'];
			$isdefault = $row['IsDefault'];
			$isdeleted = $row['IsDeleted'];
			$postalcode = $row['PostalCode'];
			 if ($isdefault == 1) {
                        $isdefault =  'checked';
                    } else {
                        $isdefault = '';
                    }
            if($isdeleted == 0){
			
			$list = '<div class="row form-row " style="border:1px solid #ccc;margin-top:1.5rem;">
                          <div class="col-auto  m-2 p-3">
                            <input type="radio" id="'.$addid.'" value="'.$addid.'" name="add" '.$isdefault.' >
                          </div>
                          <div class="col-auto m-2 ">
                            <label for="'.$addid.'" class="row" style="font-weight: normal;font-size:14px"></label>
                              <strong>Address </strong>: <span id="'.$addid.' street">'.$addressline1.'</span><span id="'.$addid.' housenumber"> '.$addressline2.'</span> '.$postalcode.'<br> <strong>Phone number </strong>: '.$phone.'
                            
                          </div>
                        </div>';

             
			echo $list;
		}
		
	}
}
	else
	{
		echo 0;
	}
	}
public function favourite_sp(){
		$email = $_SESSION['email'];
		$id = $this->usermodel->getuserid($email);
		$userid = $id['UserId'];
		$result = $this->usermodel->favourite_sp($userid);
		$arr = $result[1];
		$count = $result[0];
		if ($count) {
		foreach ($arr as $row){
		
		$targetuserid = $row['TargetUserId'];
                    $favourite = $row['IsFavorite'];
                    $blocked = $row['IsBlocked'];
        			$targetresult = $this->usermodel->GetUser($targetuserid);
                    $serviceproviderid = $targetresult['UserId'];
                    $firstname = $targetresult['FirstName'];
                    $lastname = $targetresult['LastName'];

                    if ($favourite == 1) {
                
                    	$favourite = '<div class="col mt-2 favourite_sp text-center">
                         					<img id="'.$firstname.'" src="images/Book_Service/avatar-hat.png">
                         					<p><strong id="'.$lastname.'">'.$firstname.' '.$lastname.'</p></strong> </p>
                         					<button class="btn btn3 favsp" id="'.$targetuserid.'" onclick="spselected('.$targetuserid.','.$firstname.','.$lastname.')" value="'.$targetuserid.'">Select</button>
                         				</<div>';
                    	
                        echo $favourite;
                    }
                    	}
				   	
 
            }
            else
            	echo "<h4 class='alert alert-secondary'>You have no any favourite sp<h4>";
	}
public function service_address(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$addid = $decode['addid'];
	$address = $this->usermodel->Service_address($addid);
							if($address){
								$_SESSION['addid'] = $addid;
								echo 1;
							}
							else
								echo 0;
}
public function addrequest(){
    $input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$username = $decode['username'];
	$userid1 = $this->usermodel->getuserid($_SESSION['email']);
	$userid = $userid1['UserId'];
	$Serviceid = $decode['Serviceid'];
	// echo $userid;exit;
	$email = $_SESSION['email'];
	$postalcode = $decode['postalcode'];
    $bed = $decode['bed'];
    $bath = $decode['bath'];
    $date = $decode['date'];
    $time = $decode['time'];
    $hrs = $decode['hrs']; 
    $extrahour = $decode['extrahour']; 
    $servicehourate = $decode['servicehourate']; 
    $subtotal = $decode['subtotal']; 
    $discount = $decode['discount']; 
    $effectivecost = $decode['effectivecost']; 
    $extraservice = $decode['extraservice']; 
    $paymentrefno = $decode['paymentrefno']; 
    $paymentdue = $decode['paymentdue'];     
    $comments = $decode['comments'];     
    $street = $decode['street']; 
    // echo $street."street";
    $housenumber = $decode['housenumber'];     
    $phone = $decode['phone'];         
    $city = $decode['city'];         
    $addid = $decode['addid'];         
    $pets = $decode['pets'];         
    $selectedsp = $decode['selectedsp'];
    // echo $selctedsp;exit;
    $spid1 = $this->usermodel->GetServiceProvider($selectedsp);
    if($spid1){
    $spid = $spid1['UserId'];
	}
	else
	{
		$spid = "";
	}
    // echo "<h1>". $spid."</h1>";exit;        
    $cardnumber = $decode['cardnumber'];         
    $expdate = $decode['expdate'];  
    
	$service_data=[
			'username' => $username,
			'userid' =>  $userid,
			'Serviceid'=>$Serviceid,
			'email' =>   $email,
			'postalcode' =>  $postalcode,
		    'bed' =>  $bed,
		    'bath' =>  $bath,
		    'date' => $date,
		    'time' =>  $time,
		    'hrs' =>  $hrs, 
		    'extrahour' =>  $extrahour, 
		    'servicehourate' =>  $servicehourate, 
		    'subtotal' =>  $subtotal, 
		    'discount' =>  $discount, 
		    'effectivecost' =>  $effectivecost, 
		    'extraservice' =>  $extraservice, 
		    'paymentrefno' =>  $paymentrefno, 
		    'paymentdue' =>  $paymentdue,     
		    'comments' =>  $comments,     
		    'street' =>  $street,     
		    'housenumber' =>  $housenumber,     
		    'phone' =>  $phone,         
		    'city' =>  $city,         
		    'addid' =>  $addid,         
		    'pets' =>  $pets,         
		    'selectedsp' =>  $selectedsp,
		    'spid' =>$spid,         
		    'cardnumber' =>  $cardnumber,         
		    'expdate' =>  $expdate,
		    'paymentdone' => 1,
            'recordversion' => 1,
            'status' =>"pending"
			
		];
		

		$result = $this->usermodel->Serviceadd($service_data);

		// $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);

		$serviceprovider = $this->usermodel->GetActiveServiceProvider();
		$serviceid =  $result['ServiceId'];
		
		// echo $serviceid;exit;
		if($result)
		{
			
			$result2 = $this->usermodel->Service_address($service_data['addid']);
			// $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);
			if (!empty($selectedsp)) {
                    $sp = $this->usermodel->GetUser($spid);
                    if($sp['IsActive'] == 1)
                    {
                    	if($sp['WorksWithPets'] == 1){
		                    // $addressid = $result['ServiceId'];
		                    // echo $addressid;exit;
		                    $email = $sp['Email'];
		                    // $_SESSION['spemail'] = array();
		                     $emailarray = array();
                           
		                    $emailarray[0] = $email;

		                    $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);

							// $this->spemails($emailarray);
		                    $this->mailsys2->sendEmail($_SESSION['email']);
		                    $this->mailsys->sendEmail($emailarray);
		                    // include('Mail_for_serviceproviders.php');
		                    echo json_encode(array('insert'=>'success','serviceid'=>$result['ServiceId']));
		                }
		                else
		                {
		                	// $deleteadd = $this->usermodel->delteserviceadd($_SESSION['email']);
		                	$result1 = $this->usermodel->deleteservice($result['ServiceId']);
                    	if($result1){
                    	echo json_encode(array('insert'=>'failed','msg'=>'Your favourite Service Provider is not working with pets'));
                    	}
		                }
                    }
                    else{
		                // $deleteadd = $this->usermodel->delteserviceadd($_SESSION['email']);
                    	$result1 = $this->usermodel->deleteservice($result['ServiceId']);
                    	if($result1){
                    	echo json_encode(array('insert'=>'failed','msg'=>'Your favourite Service Provider is not avilable in your area'));
                    	}
                    	else
                    	{
                    		echo json_encode(array('insert'=>'failed','msg'=>'Your request is not submitted'));
                    	}
                    }
                } else {
                    if (count($serviceprovider)) {

                            $this->mailsys2->sendEmail($_SESSION['email']);
                            // $email = array();
                            $emailarray = array();
                            $i = 0;
                    		foreach ($serviceprovider as $row) {
                    	
                            $serviceid = $result['ServiceId'];
                            $spemail = $row;
                            $emailarray[$i] = $spemail;
                            $i++;
                        } 
                         $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);
                         $this->mailsys->sendEmail($emailarray);
                         // $this->spemails($emailarray);
                        // include('Mail_for_serviceproviders.php'); 


                    }
                    $serviceid = $result['ServiceId'];
                    echo json_encode(array('insert'=>'success','serviceid'=>$result['ServiceId']));
                }
            }
            else
		{
			echo json_encode(array('insert' => 'failed','msg'=>"Sorry your booking is not submitted"));
		}
			
		}
		public function serviceprovider_Register(){
   $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $data = [
      'usersFirstName' => $decode['firstname'],
      'usersLastName' => $decode['lastname'],
      'usersEmail' => $decode['email'],
      'phone'=>$decode['phone'],
      'usersPwd' => $decode['pass'],
      'pwdRepeat' => $decode['confirmpass'],
      'userTypeId' => 2,
      'creationDate'=>date('Y-m-d H:i:s'),
      'currentTime'=>time(),
      'status' => 0, 
      'isregistered' => 1,
      'isactive' => 0,
      'avtar'=>"cap.png"
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
      $id = $this->usermodel->getuserid($data['usersEmail']);
      // $_SESSION['userid'] = $id['UserId'];
      $_SESSION['isActive'] = 0;
      $_SESSION['usertypeid'] = $id['UserTypeId'];

      
      
      
      $_SESSION['email'] = $data['usersEmail'];
      $_SESSION['FirstName'] = $data['usersFirstName'].' '.$data['usersLastName'];
      // flash("register" , "Registration succesfull please check your mail" , "alert alert-success");
      $this->mailsys2->spregistrationMail($_SESSION['email'],$_SESSION['FirstName'],$data['usersPwd']);
      
      echo json_encode(array("insert"=>"success"));
      }
    else
    {
      echo json_encode(array("insert"=>"failed"));
    }

}


}

$init = new Book_Service;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
		case 'book_service_postal':
		$init->book_service_postal();
		break;

		case 'serviceprovider_Register':
    	$init->serviceprovider_Register();
    	break;

    	case 'validpostal':
			$init->validpostal();
			break;
		case 'book_service_schedule_plan':
		 $init->book_service_schedule_plan();
		 break;
		case 'saveaddress':
			$init->saveaddress();
			break;
		case 'service_address':
			$init->service_address();
			break;
		case 'addrequest':
			$init->addrequest();
			break;
		default:
			redirect("../views/Homepage.php");
	}
}
else{
	switch($_GET['q']){
		case 'City':
		$init->City();
		break;
		
		

		case 'getAddresses':
			$init->getAddresses($_SESSION['email']);
			break;

		case 'getFavouritesp':
			$init->favourite_sp();
			break;
	     
	     default:
		 redirect("../views/Homepage.php");
	}
}
?>