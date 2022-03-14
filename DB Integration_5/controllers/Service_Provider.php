<?php
require_once '../models/Database.php';
require_once '../models/ResetPassword.php';
require_once '../controllers/Mail_for_serviceproviders.php';
require_once '../controllers/client_service_request_confirmation_mail.php';
require_once '../helpers/msgs.php';

class Service_Provider{
	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;
		$this->mailsys = new Mail_for_serviceproviders;
    $this->mailsys2 = new client_service_request_confirmation_mail;
	}

// Dashboard page functions
	public function getNewServiceRequest(){

    $result = $this->usermodel->getNewServiceRequest();
    if($result){
      foreach($result as $row){
        $serviceid = $row['ServiceId'];
        $servicestartdate = $row['ServiceStartDate'];
        $servicehours = $row['ServiceHours'];
        $payment = $row['TotalCost'];
        $payment2 ="'".$payment."'";
        $comments = $row['Comments'];
        $comments2 = "'".$comments."'";
        $pets = $row['HasPets'];
        
        $date =substr($servicestartdate,0,10) ;
        $date2 = "'".$date."'";
        $time = substr($servicestartdate,11);
        $time =  date('g:i',(strtotime($time)));
        $time2 = "'".$time."'";
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);
        $totaltime += ($hrs)*3600;
        if($minutes){
          $totaltime += 1800;
        }
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
        $printendtime2 = "'".$printendtime."'";
        $custid = $row['UserId'];
        $targetresult = $this->usermodel->GetUser($custid);
        $custname = $targetresult['FirstName'].' '.$targetresult['LastName'];
        $custname2 = "'".$custname."'";
        $serviceid = $row['ServiceId'];

        $argument = "'".$serviceid." ".$custid."'";
    
    $addresult = $this->usermodel->getserviceresquestaddress($serviceid);
    $address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
    $address2 = $addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State'];
        $city = "'".$addresult['City']."'";
       $street ="'". $addresult['AddressLine1']."'";
        
        $list = '<tr class="tr" id="'.$serviceid.'" onclick="summary(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$custname2.','.$custid.','.$city.','.$street.')">
      <td>'.$serviceid.'</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              '.$custname.' 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time">'.$address2.'</span>
            </div>
          </div>
      </td>
      <td>'.$payment.'</td>
      <td id="'.$serviceid.' timeconflict"></td>
      <td><span class="badge_accept" id="'.$serviceid.' Accept" onclick="accept('.$argument.')">Accept</span></td>
    </tr>';
    echo $list;
      }
      
    }
    else
    {
      echo "<h4>No any service requests are available.</h4>";
    }
		
		
	 }
   // 2022-03-25 14:37:00.000
   public function timeconflict(){
    $input = file_get_contents('php://input');
      $decode = json_decode($input,true);
      $serviceid = $decode['serviceid'];
      $spid = $decode['spid'];
      $result = $this->usermodel->getServiceById($serviceid);
      $servicestartdate = $result['ServiceStartDate'];
      $result = $this->usermodel->checkServicesForTimeConflict($servicestartdate,$serviceid,$spid);
      if($result){
      if(count($result)>0){
        echo json_encode(array("insert"=>"success",
                                "msg"=>"Another service request ".$result['ServiceId']." has already been assigned which has time overlap with this service request. You can't pick this one!",
                                "msg2"=>'Time Conflict with '.$result["ServiceId"]));
      }
      else
      {
        echo json_encode(array("insert"=>"fail"));
      }
    }
    else{
      echo json_encode(array("insert"=>"fail"));
    }
   }
   public function acceptservicerequest(){
      $input = file_get_contents('php://input');
      $decode = json_decode($input,true);
      $serviceid = $decode['serviceid'];
      $custid = $decode['custid'];
      $spid = $decode['spid'];
      $pets = $decode['pets'];
      $date = date('Y-m-d');
      $data = [
        'serviceid'=>$serviceid,
        'custid'=>$custid,
        'spid'=>$spid,
        'pets'=>$pets,
        'date'=>$date
      ];
      if($data['pets'] == 1){
        $result = $this->usermodel->GetActiveServiceProvider();
        if($result){
          
          $email = array();
          $i = 0;
          foreach($result as $row){
            if($row == $_SESSION['email'])
             $i++;
           else{

            $email[$i] = $row;
            // echo $email[$i].' ';
            $i++;
           }
          }
          $result2 = $this->usermodel->GetUser($data['custid']);
          $custmail = $result2['Email'];
          $this->mailsys->requestaccepted($email,$_SESSION['FirstName'],$data['serviceid']);
          $this->mailsys2->sendRequestAcceptedmail($custmail,$data['serviceid'],$_SESSION['FirstName']);
          $result3 = $this->usermodel->requestaccepted($data);
          if($result3){
            echo json_encode(array('insert'=>'success','msg'=>"Service ".$data['serviceid']."       Accepted successfully by You"));
          }
          else
          {
            echo json_encode(array('insert'=>'fail','msg'=>"Service ".$data['serviceid']."is already accepted by other Service Provider"));
          }
        }
      }
      else{
        $result =$this->usermodel->GetAllActiveServiceProvider();
        if($result){
          
          $email = array();
          $i = 0;
          foreach($result as $row){
            if($row == $_SESSION['email'])
             $i++;
           else{

            $email[$i] = $row;
            // echo $email[$i].' ';
            $i++;
           }
          }
          $result2 = $this->usermodel->GetUser($data['custid']);
          $custmail = $result2['Email'];
          $this->mailsys->requestaccepted($email,$_SESSION['FirstName'],$data['serviceid']);
          $this->mailsys2->sendRequestAcceptedmail($custmail,$data['serviceid'],$_SESSION['FirstName']);
          $result3 = $this->usermodel->requestaccepted($data);
          if($result3){
            echo json_encode(array('insert'=>'success','msg'=>"Service ".$data['serviceid']."Accepted successfully by You"));
          }
          else
          {
            echo json_encode(array('insert'=>'fail','msg'=>"Service ".$data['serviceid']."is already accepted by other Service Provider"));
          }
        }
      }
      
    

   }

   // Upcoming services functions
   public function getUpcomingServiceRequest(){
    $spid = $_SESSION['userid'];
    $result = $this->usermodel->getUpcomingServiceRequest($spid);
    if($result){
      foreach($result as $row){
        $serviceid = $row['ServiceId'];
        $servicestartdate = $row['ServiceStartDate'];
        $servicehours = $row['ServiceHours'];
        $payment = $row['TotalCost'];
        $payment2 ="'".$payment."'";
        $comments = $row['Comments'];
        $comments2 = "'".$comments."'";
        $pets = $row['HasPets'];
        
        $date =substr($servicestartdate,0,10) ;
        $date2 = "'".$date."'";
        $time = substr($servicestartdate,11);
        $time =  date('g:i',(strtotime($time)));

        $time2 = "'".$time."'";
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);

        $totaltime += ($hrs)*3600;
        if($minutes){
          $totaltime += 1800;
        }
        
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
       
        $printendtime2 = "'".$printendtime."'";
        $custid = $row['UserId'];
        $targetresult = $this->usermodel->GetUser($custid);
        $custname = $targetresult['FirstName'].' '.$targetresult['LastName'];
        $custname2 = "'".$custname."'";
        $serviceid = $row['ServiceId'];

        $argument = "'".$serviceid." ".$custid."'";

    
    $addresult = $this->usermodel->getserviceresquestaddress($serviceid);
    $address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
    $address2 = $addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State'];
       $city = "'".$addresult['City']."'";
       $street ="'". $addresult['AddressLine1']."'"; 
        date_default_timezone_set('Asia/Kolkata');
        $currentdate = date('Y-m-d');
        // $currenttime = date('H:i');
        $currenttime = date('H:i');
        $printendtime3 = date('H:i',strtotime($printendtime));
        if($date < $currentdate){

          $completemark = "true";
        }
        elseif($date == $currentdate ){
          if($printendtime3 < $currenttime){
            $completemark = "true";
           }
          else{
            $completemark = "false";
        }
        
        }
        else{
          $completemark = "false";
        }
        $list = '<tr class="tr" id="'.$serviceid.'" onclick="summary2(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$custname2.','.$custid.','.$completemark.','.$city.','.$street.')">
      <td>'.$serviceid.'</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              '.$custname.' 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time">'.$address2.'</span>
            </div>
          </div>
      </td>
      <td>'.$payment.'</td>
      <td class="'.$completemark.'"> <span class="badge_accept " id="'.$serviceid.' Complete" onclick="complete('.$argument.')">Complete</span></td>
      <td>
      <span class="badge_cancel" id="'.$serviceid.'  Cancel" onclick="cancel('.$argument.')">Cancel</span>
     </td>
    </tr>';
    echo $list;
      }
      
    }
    else
    {
      echo "<h4>No any service requests are available.</h4>";
    }
   }

   public function markServiceAsCompleted(){
      $input = file_get_contents('php://input');
      $decode = json_decode($input,true);
      $serviceid = $decode['serviceid'];
      $result = $this->usermodel->markServiceAsCompleted($serviceid);
      if($result){
         echo json_encode(array("insert"=>"success","msg"=>"You Completed this service!!!"));
      }
      else{
         echo json_encode(array("insert"=>"error","msg"=>"Please complete"));
      }
   }

   public function celenderdata(){
    $input = file_get_contents('php://input');
      $decode = json_decode($input,true);
      $userid = $decode['userid'];
      $result = $this->usermodel->getServiceStartDate($userid);
      if($result){
        foreach($result as $row)
        {
          $serviceid = $row['ServiceId'];
          $custid = $row['UserId'];
          $servicestartdate = $row['ServiceStartDate'];
          $servicehours = $row['ServiceHours'];
          $date =substr($servicestartdate,0,10) ;
          $date = date('Y-m-d',strtotime($date));
        $time = substr($servicestartdate,11);
        $time =  date('g:i',(strtotime($time)));
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);

        $totaltime += ($hrs)*3600;
        if($minutes){
          $totaltime += 1800;
        }
        
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
        $title = $time." - ".$printendtime;
        $items[] = array(
            'title'=> $title,
            'start' => date('Y-m-d', strtotime($date)),
            'end' => date('Y-m-d', strtotime($date)),
            'id'=>$serviceid,
            'textColor'=>"white",
            'color'=>"#1D7A8C",
            'sources'=>[
              $this->usermodel->getUpcomingServiceRequest($userid),
              $this->usermodel->getserviceresquestaddress($serviceid),
              $this->usermodel->GetUser($custid),
            ],
          );

        }

        echo json_encode($items);
        }
   }


   // Service Provider History functions
   public function getServiceProviderHistory(){
    $spid = $_SESSION['userid'];
    $result = $this->usermodel->getServiceProviderHistory($spid);
    if($result){
      foreach($result as $row){
        $serviceid = $row['ServiceId'];
        $servicestartdate = $row['ServiceStartDate'];
        $servicehours = $row['ServiceHours'];
        $payment = $row['TotalCost'];
        $payment2 ="'".$payment."'";
        $comments = $row['Comments'];
        $comments2 = "'".$comments."'";
        $pets = $row['HasPets'];
        
        $date =substr($servicestartdate,0,10) ;
        $date2 = "'".$date."'";
        $time = substr($servicestartdate,11);
        $time =  date('g:i',(strtotime($time)));

        $time2 = "'".$time."'";
        $totaltime = 0;
        $hrs = substr($servicehours,0,1);
        $minutes = substr($servicehours,2,2);

        $totaltime += ($hrs)*3600;
        if($minutes){
          $totaltime += 1800;
        }
        
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
       
        $printendtime2 = "'".$printendtime."'";
        $custid = $row['UserId'];
        $targetresult = $this->usermodel->GetUser($custid);
        $custname = $targetresult['FirstName'].' '.$targetresult['LastName'];
        $custname2 = "'".$custname."'";
        $serviceid = $row['ServiceId'];

        $argument = "'".$serviceid." ".$custid."'";

    
    $addresult = $this->usermodel->getserviceresquestaddress($serviceid);
    $address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
    $address2 = $addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State'];
       $city = "'".$addresult['City']."'";
       $street ="'". $addresult['AddressLine1']."'"; 
        date_default_timezone_set('Asia/Kolkata');
        $currentdate = date('Y-m-d');
        // $currenttime = date('H:i');
        $currenttime = date('H:i');
        $printendtime3 = date('H:i',strtotime($printendtime));
        if($date < $currentdate){

          $completemark = "true";
        }
        elseif($date == $currentdate ){
          if($printendtime3 < $currenttime){
            $completemark = "true";
           }
          else{
            $completemark = "false";
        }
        
        }
        else{
          $completemark = "false";
        }
        $list = '<tr class="tr" id="'.$serviceid.'" onclick="summary2(this.id,'.$serviceid.','.$date2.','.$time2.','.$printendtime2.','.$servicehours.','.$payment2.','.$comments2.','.$pets.','.$address.','.$custname2.','.$custid.','.$completemark.','.$city.','.$street.')">
      <td>'.$serviceid.'</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              '.$custname.' 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time">'.$address2.'</span>
            </div>
          </div>
      </td>
      </tr>';
    echo $list;
      }
      
    }
    else
    {
      echo "<h4>You have no any completed service.</h4>";
    }
   }

   // My Settings
   public function getdetails(){
  if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];

  $result = $this->usermodel->getuserid($email);
  $firstname = $result['FirstName'];
  $lastname = $result['LastName'];
  $phone = $result['Mobile'];
  $userprofile  = $result['UserProfilePicture'];
  $nationality = $result['NationalityId'];
  $gender = $result['Gender'];
  $birthdate = $result['DateOfBirth'];
  $address = $this->usermodel->getAddresses($email);
    $add = $address[1];
    if($add){
    foreach($add as $row){
      $street = $row['AddressLine1'];
    $housenumber = $row['AddressLine2'];
    $postalcode = $row['PostalCode'];
    $city = $row['City'];
  }
}
else{
  $street = "";
  $housenumber = "";
  $postalcode = "";
  $city = "";
}
    

  $arr = [
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'email'=>$email,
    'phone'=>$phone,
    'userprofile'=>$userprofile,
    'nationality'=>$nationality,
    'gender'=>$gender,
    'street'=>$street,
    'housenumber'=>$housenumber,
    'postalcode'=>$postalcode,
    'city'=>$city,
    'birthdate'=>$birthdate
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
  $gender = $decode['gender'];
  $avtar = $decode['avtar'];
  // echo $birthdate;exit;
  $nationality = $decode['nationality'];
  $postalcode = $decode['postalcode'];
  $result1 = $this->usermodel->GetServiceProvider($lastname);
  $modifierid = $result1['UserId'];

$data = [
  'firstname'=>$firstname,
  'lastname'=>$lastname,
  'email'=>$email,
  'phone'=>$phone,
  'birthdate'=>$birthdate,
  'gender'=>$gender,
  'avtar'=>$avtar,
  'nationality'=>$nationality,
  'modifierid'=>$modifierid,
  'postalcode'=>$postalcode
];
$result = $this->usermodel->updateSpDetails($data);
if($result){
  $_SESSION['email'] = $email;
  $_SESSION['FirstName'] = $firstname.' '.$lastname;
  echo json_encode(array("insert"=>"success","msg"=>"Your details have been updated successfully!!!"));
}
else{
  echo json_encode(array("insert"=>"fail","msg"=>"Sorry we are not able to update your details"));
}

}

public function saveaddress(){
  $input = file_get_contents('php://input');
  $decode = json_decode($input,true);
  $postalcode = $decode['postalcode'];
  $street = $decode['street'];
  $housenumber = $decode['housenumber'];
  $city = $decode['city'];
  $result =$this->usermodel->City($postalcode);
  $state = $result[1];  
  $phone = $decode['phone'];
    $email = $_SESSION['email'];   
  $id = $this->usermodel->getuserid($email);  
  $userid = $id['UserId'];
    $_SESSION['userid'] = $userid;
    
    $service_data=[
      'street' =>$street,
      'housenumber' =>$housenumber,
      'postalcode'=>$postalcode,
      'email'=>$email,
      'userid' => $userid,
      'city'=>$city,
      'state'=>$state,
      'phone'=>$phone
    ];
    
    
    $result = $this->usermodel->saveSpAddress($service_data);
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

// Block Customer's Functions
public function getBlockCustomers(){
  $spid = $_SESSION['userid'];
    $result = $this->usermodel->getBlockCustomers($spid);
    if($result){
      foreach($result as $row){
        $result2 = $this->usermodel->GetUser($row['UserId']);
        $custid = $row['UserId'];
        $name = $result2['FirstName'].' '.$result2['LastName'];
        $name2 = "'".$name."'";
        $avtar = $result2['UserProfilePicture'];
        $list = '
        <div class="col-md-4 pt-1">
            <div class="card pt-5 ">
                <img src="images/AvatarImages/'.$avtar.'" class="mx-auto" style="width:40% ; height:  40%;border-radius: 50%;border:1px solid #ccc">
                <div class="card-body text-center">
                    <h5 class="card-title">'.$name.'</h5>
                    <a style="color:white;font-weight:bold" class="btn badge_cancel" id="'.$custid.'" onclick="block('.$spid.','.$custid.','.$name2.')">Block</a>
                </div>
            </div>
        </div>
    ';
    echo $list;
       }
      
    }
    else
    {
      echo "<h4>No Customer Eperiance.</h4>";
    }
   }

public function blockCustomer(){
   $input = file_get_contents('php://input');
  $decode = json_decode($input,true);
  $userid = $decode['userid'];
  $targetuserid = $decode['targetuserid'];
  $username = $decode['username'];
  $result = $this->usermodel->blockCustomer($userid,$targetuserid);
  if($result){
    echo json_encode(array("insert"=>"success","msg"=>"You successfully Blocked ".$username));
  }
  else{
    echo json_encode(array("insert"=>"fail","msg"=>"You are not able to block ".$username));
  }
}
public function unBlockCustomer(){
  $input = file_get_contents('php://input');
  $decode = json_decode($input,true);
  $userid = $decode['userid'];
  $targetuserid = $decode['targetuserid'];
  $username = $decode['username'];
  $result = $this->usermodel->unBlockCustomer($userid,$targetuserid);
  if($result){
    echo json_encode(array("insert"=>"success","msg"=>"You successfully UnBlocked ".$username));
  }
  else{
    echo json_encode(array("insert"=>"fail","msg"=>"You are not able to Unblock ".$username));
  }
}
// My Ratings Functions

public function getSpRatings(){
  $spid = $_SESSION['userid'];
  $result = $this->usermodel->getSpRatings($spid);
  if($result){
    foreach($result as $row){
      $custid = $row['RatingFrom'];

      $result2 = $this->usermodel->GetUser($custid);
      $custname = $result2['FirstName'].' '.$result2['LastName'];
      $custfirstname =$result2['FirstName'];
      $rating = $row['Ratings'];
      $comment = $row['Comments'];
      $serviceid = $row['ServiceRequestId'];

      $result3 = $this->usermodel->getServiceById($serviceid);
      $servicestartdate = $result3['ServiceStartDate'];
      $servicehours = $result3['ServiceHours'];
      $date =substr($servicestartdate,0,10) ;
      $date2 = "'".$date."'";
      $time = substr($servicestartdate,11);
      $time =  date('g:i',(strtotime($time)));
      $time2 = "'".$time."'";
      $totaltime = 0;
      $hrs = substr($servicehours,0,1);
      $minutes = substr($servicehours,2,2);
      $totaltime += ($hrs)*3600;
      if($minutes){
          $totaltime += 1800;
        }
        $endTime = strtotime($time) + $totaltime; 

        $printendtime =date('g:i', $endTime);
        $printendtime2 = "'".$printendtime."'";

      $list = '<tr class="tr" id="'.$rating.' '.$custfirstname.'" style="border-top:1px solid rgba(0, 0, 0, 0.1);">
      <td class="w-25 pb-0">'.$serviceid.'<br><strong>'.$custname.'</strong></td>
      <td class="pb-0">
        <div class="row ">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png">
              <span class="date"><strong>'.$date.'</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col">
              <img src="images/Upcoming_Service/layer-14.png">
              <span class="time">'.$time.' - '.$printendtime.'</span>
            </div>
          </div>
      </td>
      <td class="pb-0 '.$result2['FirstName'].'"><strong>ratings</strong><br>
        <div class="stars-outer">
          <div class="stars-inner"></div>
        </div>
        <span id="'.$rating.'"></span>
      </td>
      <tfoot>
        <tr >
          <td colspan="12" class="pt-0">
            <hr style="
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            width:100%;
            padding-top: 0;">
            <strong>Customer Comment</strong><br>'.$comment.'
          </td>
        </tr>
      </tfoot>
    </tr>';
    echo $list;


    }
  }
  else
  {
    echo "<h4>You have no ratings..</h4>";
  }
}




}
$init = new Service_Provider;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
		case 'acceptservicerequest':
			$init->acceptservicerequest();
			break;

    case 'timeconflict':
      $init->timeconflict();
      break;
    
    case 'markServiceAsCompleted':
      $init->markServiceAsCompleted();
      break;

    case 'celenderdata':
      $init->celenderdata();
      break;

    case 'updatedetails':
      $init->updatedetails();
      break;

    case 'saveaddress':
      $init->saveaddress();
      break;

    case 'blockCustomer':
      $init->blockCustomer();
      break;

    case 'unBlockCustomer':
      $init->unBlockCustomer();
      break;
		
		default:
			redirect("../views/Homepage.php");
	}
}
else{
	switch($_GET['q']){
		case 'getNewServiceRequest':
			$init->getNewServiceRequest();
			break;
    case 'getUpcomingServiceRequest':
      $init->getUpcomingServiceRequest();
      break;
    case 'getServiceProviderHistory' :
      $init->getServiceProviderHistory();
      break;
    case 'getdetails' : 
     $init->getdetails();
     break;
    case 'getBlockCustomers' :
      $init->getBlockCustomers();
      break;
    case 'getSpRatings' :
      $init->getSpRatings();
      break;
		

		default:
		 redirect("../views/Homepage.php");
	}
}
?>