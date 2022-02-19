<?php
require_once '../models/Database.php';
require_once '../models/ResetPassword.php';
require_once '../helpers/msgs.php';
class Users{
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
	
	$_SESSION['userid'] = $userid;	
		
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
		while($count > 0)
		{
			$addressline1 = $add['AddressLine1'];
			$addressline2 = $add['AddressLine2'];
			$phone = $add['Mobile'];
			$city = $add['City'];
			// $state = $add['State'];
			$email = $add['Email'];
			$addid = $add['AddressId'];
			$isdefault = $add['IsDefault'];
			$isdeleted = $add['IsDeleted'];
			$postalcode = $add['PostalCode'];
			 if ($isdefault == 1) {
                        $isdefault =  'checked';
                    } else {
                        $isdefault = '';
                    }
            if($isdeleted == 0){
			
			$list = '<div class="row form-row" style="border:1px solid #ccc;margin-top:1.5rem;">
                          <div class="col-auto  m-2 p-3">
                            <input type="radio" id="'.$addid.'" value="'.$addid.'" name="add" '.$isdefault.' >
                          </div>
                          <div class="col-auto m-2 ">
                            <label for="'.$addid.'" class="row" style="font-weight: normal;font-size:14px">
                              Address : '.$addressline1.' , '.$addressline2.' '.$postalcode.'<br> Phone number : '.$phone.'
                            </label>
                          </div>
                        </div>';
                        $count -= $count;
             
			echo $list;exit;
		}
			
		}
	}
	else
	{
		echo "Not received all adresses";
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
			while($count > 0){
				   	$targetuserid = $arr['TargetUserId'];
                    $favourite = $arr['IsFavorite'];
                    $blocked = $arr['IsBlocked'];
        			$targetresult = $this->usermodel->GetUser($targetuserid);
                    $serviceproviderid = $targetresult['UserId'];
                    $firstname = $targetresult['FirstName'];
                    $lastname = $targetresult['LastName'];

                    if ($favourite == 1) {
                
                    	$favourite = '<div class="row w-25">
                         				<div class="col favourite_sp text-center">
                         					<img id="'.$firstname.'" src="images/Book_Service/avatar-hat.png">
                         					<p><strong>'.$firstname.' '.$lastname.'</p></strong> </p>
                         					<button class="btn btn3" id="'.$targetuserid.'" onclick="spselected('.$targetuserid.','.$firstname.')" value="'.$targetuserid.'">Select</button>
                         				</<div>
                         			  </div>';
                    	
                        echo $favourite;
                    }

				$count -= $count;
			}
                
                
            }
            else
            	echo "You have no any favourite sp";
	}
public function addrequest(){
    $input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$username = $decode['username'];
	$postalcode = $decode['postalcode'];
    $bed = $decode['bed'];
    $bath = $decode['bath'];
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
    $cardnumber = $decode['cardnumber'];         
    $expdate = $decode['expdate'];    
    
	$service_data=[
			'username' => $username,
			'userid' =>$_SESSION['userid'],
			'email' =>$_SESSION['email'],
			'postalcode' =>  $postalcode,
		    'bed' =>  $bed,
		    'bath' =>  $bath,
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
		    'cardnumber' =>  $cardnumber,         
		    'expdate' =>  $expdate,
		    'paymentdone' => 1,
            'recordversion' => 1,
            'status' =>'pending'
			
		];
		

		$result = $this->usermodel->Serviceadd($service_data);
		$serviceprovider = $this->model->GetActiveServiceProvider();
		if($result)
		{
			include('client_service_request_confirmation_mail.php');
			if (!empty($selectedsp)) {
                    $sp = $this->usermodel->GetUsers($selectedsp);
                    $addressid = $result;
                    $email = $sp['Email'];
                    $_SESSION['spemail'] = $email;
                    include('Mail_for_serviceproviders.php');
                    echo json_encode(array('insert'=>'success','addressid'=>$addressid));
                } else {
                    if (count($serviceprovider)) {
                        foreach ($serviceprovider as $row) {
                            $addressid = $result;
                            $email = $row['Email'];
                            include('BookingMail.php');
                        }
                    }
                    $addressid = $result;
                    echo json_encode(array('insert'=>'success','addressid'=>$addressid));
                }
            }
            else
		{
			echo json_encode(array('insert' => 'failed'));
		}
			
		}
		

}

$init = new Users;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
		case 'book_service_postal':
		$init->book_service_postal();
		break;
		case 'validpostal':
			$init->validpostal();
			break;
		case 'saveaddress':
			$init->saveaddress();
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
			$init->getAddresses($_SESSION['postalcode']);
			break;

		case 'getFavouritesp':
			$init->favourite_sp();
			break;

		default:
		 redirect("../views/Homepage.php");
	}
}
?>