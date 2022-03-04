<?php
require_once '../models/Database.php';
require_once '../models/ResetPassword.php';
require_once '../helpers/msgs.php';
class Book_Service{
	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;
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
		$_SESSION['hrs'] = $hrs;
		
		
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
                            <label for="'.$addid.'" class="row" style="font-weight: normal;font-size:14px">
                              Address : <span id="'.$addid.' street">'.$addressline1.'</span><span id="'.$addid.' housenumber"> '.$addressline2.'</span> '.$postalcode.'<br> Phone number : '.$phone.'
                            </label>
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
		$serviceprovider = $this->usermodel->GetActiveServiceProvider();
		$serviceid =  $result['ServiceId'];
		if($result)
		{
			
			if (!empty($selectedsp)) {
                    $sp = $this->usermodel->GetUser($spid);
                    if($sp['IsActive'] == 1)
                    {
                    	if($sp['WorksWithPets'] == 1){
		                    // $addressid = $result['ServiceId'];
		                    // echo $addressid;exit;
		                    $email = $sp['Email'];
		                    $_SESSION['spemail'] = array();
		                    array_push($_SESSION['spemail'],$email);
		                    $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);
							
		                    include('client_service_request_confirmation_mail.php');
		                    include('Mail_for_serviceproviders.php');
		                    echo json_encode(array('insert'=>'success','serviceid'=>$result['ServiceId']));
		                }
		                else
		                {
		                	$deleteadd = $this->usermodel->delteserviceadd($result['Email']);
		                	$result1 = $this->usermodel->deleteservice($result['ServiceId']);
                    	if($result1){
                    	echo json_encode(array('insert'=>'failed','msg'=>'Your favourite Service Provider is not working with pets'));
                    	}
		                }
                    }
                    else{
		                $deleteadd = $this->usermodel->delteserviceadd($result['Email']);
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

                            include('client_service_request_confirmation_mail.php');
                            // $email = array();
                            $_SESSION['spemail'] = array();
                    		foreach ($serviceprovider as $row) {
                    	
                            $serviceid = $result['ServiceId'];
                            $spemail = $row;
                            array_push($_SESSION['spemail'],$spemail);
                        } 
                         $serviceidadd = $this->usermodel->addserviceid($service_data['street'],$serviceid);
                        include('Mail_for_serviceproviders.php'); 

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
		

}

$init = new Book_Service;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
		case 'book_service_postal':
		$init->book_service_postal();
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
			// $init->getAddresses($_SESSION['userid']);
			break;

		case 'getFavouritesp':
			$init->favourite_sp();
			break;

		default:
		 redirect("../views/Homepage.php");
	}
}
?>
