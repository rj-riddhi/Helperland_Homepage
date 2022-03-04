<?php
require_once '../models/Database.php';
require_once '../controllers/update_mail_sp.php';
require_once '../models/ResetPassword.php';
require_once '../helpers/msgs.php';
class Book_Service{
	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;
		$this->mailsys = new Mail_for_serviceproviders;
	}

// Dashboard page functions
	public function getTableData(){
		$email = $_SESSION['email'];
		$useridresult = $this->usermodel->getuserid($email);
		$userid = $useridresult['UserId'];	
		$result = $this->usermodel->getTableData($userid);
		if (($result)) {
		foreach ($result as $row){
		
		$serviceid = $row['ServiceId'];
		$addresult = $this->usermodel->getserviceresquestaddress($serviceid);
		$address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
		$mobile = $addresult['Mobile'];
		$email = $addresult['Email'];
		$email = "'".$email."'";
        $servicehours = $row['ServiceHours'];
        $payment = $row['TotalCost'];
        $payment2 ="'".$payment."'";
        $comments = $row['Comments'];
        $comments2 = "'".$comments."'";
        $pets = $row['HasPets'];
        $servicestartdate = $row['ServiceStartDate'];
        
        $date =substr($servicestartdate,0,10) ;
        $date2 = "'".$date."'";
        $time = substr($servicestartdate,12);
        $time =  date('g:i',(strtotime($time)));
        $time2 = "'".$time."'";
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);
        $totaltime += ($hrs)*3600;
        if($minutes){
        	$totaltime += 30;
        }
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
        $printendtime2 = "'".$printendtime."'";

  		$spid = $row['ServiceProviderId'];

        if($spid != 0){
		$targetresult = $this->usermodel->GetUser($spid);
		$spname = $targetresult['FirstName'].' '.$targetresult['LastName'];
			$data = '<tr id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$mobile.','.$email.')">
       <td>
           <span id="serviceid'.$serviceid.'">'.$serviceid.'</span>
       </td>
       <td>
         <div class="row">
            <div class="col">
               <img src="images/Service_History/calendar.png"><span class="date"><strong>'.$date.'</strong></span>
             </div>
         </div>
           <div class="row">
             <div class="col">
             <i class="fa fa-clock-o" aria-hidden="true"></i><span class="time">'.$time.' - '.$printendtime.'</span>
             </div>
           </div>
       </td>
       <td>'.$spname.'</td>
       <td class="text-style-1"><span style="font-size:20px;"> €</span>'.$payment.'</td>
       <td>
         <span class="badge_reschedule" onclick="reschedulemodal(this.id)" id="reschedule '.$serviceid.'">Reschedule</span>
         <span class=" badge_cancel" onclick="cancelmodal(this.id)" id="cancel'.$serviceid.'">Cancel</span></td>
     </tr>';
                    	
                         echo $data;
		
	 }

                     else{
                
                     	$data = '<tr id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment.','.$comments2.','.$pets.')">
      <td>
          <span id="'.$serviceid.'">'.$serviceid.'</span>
      </td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col">
            <i class="fa fa-clock-o" aria-hidden="true"></i><span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>
      <td></td>
      <td class="text-style-1"><span style="font-size:20px;"> €</span>'.$payment.'</td>
      <td>
        <span class="badge_reschedule" onclick="reschedulemodal(this.id)" id="reschedule'.$serviceid.'">Reschedule</span>
        <span class=" badge_cancel" onclick="cancelmodal(this.id)" id="cancel'.$serviceid.'">Cancel</span></td>
    </tr>';
                    	
                        echo $data;
                    }
                    	}
				   	
 
            }
     
	else
	{
		echo "<h4 class='alert alert-success'>You have no any pending service</h4>";
	}

		

}

public function getextras(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$id = $decode['id'];
	$result = $this->usermodel->getextras($id);
	if($result){
		$cabinate = $result['Cabinate'];
		$fridge = $result['Fridge'];
		$oven = $result['Oven'];
		$wash = $result['Laundrywash'];
		$windows = $result['Windows'];
		$data = [
			'cabinate'=>$cabinate,
			'fridge'=>$fridge,
			'oven'=>$oven,
			'wash'=>$wash,
			'windows'=>$windows
		];
		echo json_encode(array('insert'=>'success','data'=>$data));
	}
}

public function updateservice(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$id = $decode['id'];
	$date = $decode['date'];
	$time = $decode['time'];
	$checforupdate = $this->usermodel->checkspotherrequests($date,$time,$id);
	$hrs = $checforupdate['ServiceHours'];
	$time = substr($checforupdate['ServiceStartDate'],12);
	$starttime = date('g:i',(strtotime($time)));
	$endTime = strtotime($starttime) + ($hrs*3600);
	$endTime = date('g:i',$endTime);
	if($checforupdate){
		echo json_encode(array("insert"=>"fail",'msg'=>"Another service request has been assigned to the service provider on ".$date." from ".$starttime." to ".$endTime.". Either choose another date or pick up a different time slot"));exit;
	}
	else{
	$result = $this->usermodel->updateservice($id,$date,$time);
	if($result){
		$spid = $result['ServiceProviderId'];
		$spemail = $this->usermodel->GetUser($spid);
		$email = $spemail['Email'];
		$this->mailsys->sendEmail($email,$id,$date,$time);
		echo json_encode(array("insert"=>'success','msg'=>"Your request is updated successfully"));
	}
	else{
		echo json_encode(array("insert"=>"fail",'msg'=>"Your request is not updated"));
	}
}
}
public function deleteservice(){
	$input = file_get_contents('php://input');
	$decode = json_decode($input,true);
	$id = $decode['id'];
	$result = $this->usermodel->updatestatustodelete($id);
	$result1 = $result[0];
	$arr = $result[1];
	if($result1){
		$spid = $arr['ServiceProviderId'];
		$spemail = $this->usermodel->GetUser($spid);
		if($spemail){
		$email = $spemail['Email'];
		$this->mailsys->senddeletemail($email,$id);
	}
		// $result2 = $this->usermodel->deleteserviceaddbyid($id);
		// $result3 = $this->usermodel->deleteextras($id);

		echo json_encode(array("insert"=>"success"));
	}
	else{
		echo json_encode(array("insert"=>"failed"));
	}
}

// History page functions
public function showhistory(){
		$email = $_SESSION['email'];
		$useridresult = $this->usermodel->getuserid($email);
		$userid = $useridresult['UserId'];	
		$result = $this->usermodel->getHistoryData($userid);
		if (count($result)) {
		foreach ($result as $row){
		$status = $row['Status'];
		$serviceid = $row['ServiceId'];
		$addresult = $this->usermodel->getserviceresquestaddress($serviceid);
		$address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
		$mobile = $addresult['Mobile'];
		$email = $addresult['Email'];
		$email = "'".$email."'";
        $servicehours = $row['ServiceHours'];
        $payment = $row['TotalCost'];
        $payment2 ="'".$payment."'";
        $comments = $row['Comments'];
        $comments2 = "'".$comments."'";
        $pets = $row['HasPets'];
        $servicestartdate = $row['ServiceStartDate'];
        
        $date =substr($servicestartdate,0,10) ;
        $date2 = "'".$date."'";
        $time = substr($servicestartdate,12);
        $time =  date('g:i',(strtotime($time)));
        $time2 = "'".$time."'";
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);
        $totaltime += ($hrs)*3600;
        if($minutes){
        	$totaltime += 30;
        }
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
        $printendtime2 = "'".$printendtime."'";

  		$spid = $row['ServiceProviderId'];
      $ratingresult = $this->usermodel->getsprating($spid);
      if($ratingresult){
        $sprating = $ratingresult['Ratings'];
      }
      else{
        $sprating = 0;
      }
  		if($status == "completed"){

        
		$targetresult = $this->usermodel->GetUser($spid);
		$spname = $targetresult['FirstName'].' '.$targetresult['LastName'];
		$spname2 = "'".$spname."'";

		$data = '<tr><tr id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$mobile.','.$email.')">
		<td>
           <span id="serviceid'.$serviceid.'">'.$serviceid.'</span>
       </td>
       <td>
         <div class="row">
            <div class="col">
               <img src="images/Service_History/calendar.png"><span class="date"><strong>'.$date.'</strong></span>
             </div>
         </div>
           <div class="row">
             <div class="col">
             <i class="fa fa-clock-o" aria-hidden="true"></i><span class="time">'.$time.' - '.$printendtime.'</span>
             </div>
           </div>
       </td>
      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col"><span >'.$spname.'</span><br>
              
              <span>'.$sprating.'</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;"> €</span>'.$payment.'</td>
       
      <td><span class="badge_complete">Completed</span></td>

      <td><span class=" badge_rate1" onclick="ratemodal(this.id,'.$spname2.')" id="rate '.$serviceid.'">Rate SP</span></td>
    </tr>';
			    	
                         echo $data;
		    }
                else{

                	if($spid != 0){
		$targetresult = $this->usermodel->GetUser($spid);
		$spname = $targetresult['FirstName'].' '.$targetresult['LastName'];
			$data = '<tr><tr id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$mobile.','.$email.')">
		<td>
           <span id="serviceid'.$serviceid.'">'.$serviceid.'</span>
       </td>
       <td>
         <div class="row">
            <div class="col">
               <img src="images/Service_History/calendar.png"><span class="date"><strong>'.$date.'</strong></span>
             </div>
         </div>
           <div class="row">
             <div class="col">
             <i class="fa fa-clock-o" aria-hidden="true"></i><span class="time">'.$time.' - '.$printendtime.'</span>
             </div>
           </div>
       </td>
      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col"><span >'.$spname.'</span><br>
              
              <span>'.$sprating.'</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;"> €</span>'.$payment.'</td>
       
      <td><span class="badge_cancel">Cancelled</span></td>

      <td><span class=" badge_rate2 disabled">Rate SP</span></td>
    </tr>';
                    	
                         echo $data;
		
	 }

	  else{
                
                     	$data = '<tr id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment.','.$comments2.','.$pets.')">
      <td>
          <span id="'.$serviceid.'">'.$serviceid.'</span>
      </td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col">
            <i class="fa fa-clock-o" aria-hidden="true"></i><span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>
      <td></td>
      <td class="text-style-1"><span style="font-size:20px;"> €</span>'.$payment.'</td>
       
      <td><span class="badge_cancel">Cancelled</span></td>

      <td><span class=" badge_rate2 disabled">Rate SP</span></td>
    </tr>';
                    	
                        echo $data;
                    }

                     

                }
                    	}
				   	
 
            }
     
	else
	{
		echo "<h4 class='alert alert-success'>You are new user hope you will have grate experience with Helperland</h4>";
	}

		

}

public function ratesp(){
  $input = file_get_contents('php://input');
  $decode = json_decode($input,true);

  $avgrating = $decode['avgrating'];
  $ontime = $decode['ontime'];
  $friendly = $decode['friendly'] ;
  $quality = $decode['quality'];
  $feedback = $decode['feedback'];
  $spname = $decode['spname'];
  $serviceid = $decode['serviceid'];
  $date = date('Y/m/d');
  $customer = $_SESSION['FirstName'];
  $customer = substr($customer, strpos($customer, " ") + 1); 
 
  $result1 = $this->usermodel->GetServiceProvider($customer);
  $custid = $result1['UserId'];
  $spname = substr($spname, strpos($spname, " ") + 1); 
  $result2 = $this->usermodel->GetServiceProvider($spname);
  $spid = $result2['UserId'];

  $data = [
      'avgrating'=>$avgrating,
      'ontime'=>$ontime,
      'friendly'=>$friendly,
      'quality'=>$quality,
      'feedback'=>$feedback,
      'spname'=>$spid,
      'serviceid'=>$serviceid,
      'date'=>$date,
      'customer'=>$custid
  ];
  $result = $this->usermodel->ratesp($data);
  if($result){
      echo json_encode(array("insert"=>"success","msg"=>"Your rating is saved"));
  }
  else{
      echo json_encode(array("insert"=>"fail","msg"=>"Failed"));
  }
}

public function getdetails(){
  if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];

  $result = $this->usermodel->getuserid($email);
  $firstname = $result['FirstName'];
  $lastname = $result['LastName'];
  $phone = $result['Mobile'];
  $arr = [
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'email'=>$email,
    'phone'=>$phone
  ];
 
  echo json_encode(array("insert"=>"success","data"=>$arr));
}
else{
  echo json_encode(array("insert"=>"fail"));
}
}

public function updatedetails(){
  $input = file_get_contents('php://input');
  $decode = json_decode($input,true);

  $firstname = $decode['firstname'];
  $lastname = $decode['lastname'];
  $email = $decode['email'];
  $phone = $decode['phone'];
  $birthdate = $decode['birthdate'];
  $birthdate = strtotime( $birthdate );
  $birthdate = date( 'Y/m/d', $birthdate );
  // echo $birthdate;exit;
  $language = $decode['language'];
  $result1 = $this->usermodel->GetServiceProvider($lastname);
  $modifierid = $result1['UserId'];

$data = [
  'firstname'=>$firstname,
  'lastname'=>$lastname,
  'email'=>$email,
  'phone'=>$phone,
  'birthdate'=>$birthdate,
  'language'=>$language,
  'modifierid'=>$modifierid
];
$result = $this->usermodel->updatedetails($data);
if($result){
  $_SESSION['email'] = $email;
  $_SESSION['FirstName'] = $firstname.' '.$lastname;
  echo json_encode(array("insert"=>"success","msg"=>"Your details have been updated successfully!!!"));
}
else{
  echo json_encode(array("insert"=>"fail","msg"=>"Sorry we are not able to update your details"));
}

}
public function City()
    {   
            $input = file_get_contents('php://input');
            $decode = json_decode($input,true);
            $pincode = $decode['postalcode'];
            $result = $this->usermodel->City($pincode);
            $city = $result[0];
            $state = $result[1];
            // $return = [$city];
            echo $city;
        
    }
public function updateaddress(){
  $input = file_get_contents('php://input');
  $decode = json_decode($input,true);
  $id = $decode['id'];
  $street = $decode['street'];
  $housenumber = $decode['housenumber'];
  $postalcode = $decode['postalcode'];
  $city = $decode['city'];
  $phone = $decode['phone'];

  $data = [
    'id'=>$id,
    'street'=>$street,
    'housenumber'=>$housenumber,
    'postalcode'=>$postalcode,
    'city'=>$city,
    'phone'=>$phone
  ];
  $result = $this->usermodel->updateaddress($data);
  if($result){
    echo json_encode(array("insert"=>"success","msg"=>"Your address is updated"));
  }
  else{
    echo json_encode(array("insert"=>"fail","msg"=>"Sorry,Your address is  not updated"));
  }
}

public function passwordupdate(){
    $input = file_get_contents('php://input');
  $decode = json_decode($input,true);
  $email = $decode['email'];
  $oldpassword = $decode['oldpassword'];
  $newpassword = $decode['newpassword'];
  $confirmpassword = $decode['confirmpassword'];

  $result = $this->usermodel->login($email,$oldpassword);
  if($result)
  {
    $newPwdHash = password_hash($newpassword, PASSWORD_DEFAULT);
    $result2 = $this->usermodel->resetPassword($newPwdHash,$email);
    if($result2){
      echo json_encode(array("insert"=>"success","msg"=>"Your password is updated successfully!!!"));
    }
    else
    {
      echo json_encode(array("insert"=>"fail","msg"=>"Your password is not updated"));
    }

  }
  else
  {
    echo json_encode(array("insert"=>"success","msg"=>"Your old password is not correct"));
  }
  
  
  }
public function getAddresses($result){
    $address = $this->usermodel->getAddresses($result);
    $add = $address[1];
    $count = $address[0];
    if($count){
    foreach ($add as $row){
      $addressline1 = $row['AddressLine1'];
      $street = "'".$addressline1."'";
      $addressline2 = $row['AddressLine2'];
      $housenumber = "'".$addressline2."'";
      $phone = $row['Mobile'];
      $city = $row['City'];
      $city1 = "'".$city."'";
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

              $list = '
              <tr style="border-bottom : 0.2px solid #ccc">
     <td class="pl-4">
      <div class="row form-row " >
                        <div class="col-auto m-2">
                          <div>
                            <strong>Address </strong>: 
                           <span id="'.$addid.' street" class="ml-2">  '.$addressline1.'</span>
                           <span id="'.$addid.' housenumber" class="ml-1"> '.$addressline2.' , '.$postalcode.' 
                           </span> 
                            </div>
                            <div>
                              <strong>Phone number</strong> : '.$phone.'
                            </div>
                        </div>
                        </div>
      </td>
      <td class="text-center">
        <span><i class="icon-edit '.$addid.'" id="'.$addid.' edit" onclick="editaddress(this.id,'.$street.','.$housenumber.','.$postalcode.','.$phone.','.$city1.')"></i> </span>
        <span><i class="icon-trash '.$addid.'" id="'.$addid.' delete" onclick="deleteaddress(this.id)"></i></span>
      </td>
   </tr>';
      
             
      echo $list;
    }
    
  }
}
  else
  {
    echo 0;
  }
  }





}
$init = new Book_Service;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
		case 'getextras':
			$init->getextras();
			break;
		case 'updateservice':
			$init->updateservice();
			break;
		case 'deleteservice':
			$init->deleteservice();
			break;
    case 'ratesp':
      $init->ratesp();
      break;
    case 'updatedetails':
      $init->updatedetails();
      break;
    case 'City':
      $init->City();
      break;
    case 'updateaddress':
      $init->updateaddress();
      break;
    case 'passwordupdate':
      $init->passwordupdate();
      break;
		
		default:
			redirect("../views/Homepage.php");
	}
}
else{
	switch($_GET['q']){
		case 'getTableData':
			$init->getTableData();
			break;

		case 'showhistory':
			$init->showhistory();
			break;

    case 'getdetails':
      $init->getdetails();
      break;

    case 'getAddresses':
      $init->getAddresses($_SESSION['email']);
      break;
		

		default:
		 redirect("../views/Homepage.php");
	}
}
?>