<?php
require_once '../models/Database.php';
require_once '../controllers/Mail_for_serviceproviders.php';
require_once '../controllers/client_service_request_confirmation_mail.php';
require_once '../helpers/msgs.php';
// require_once '../controllers/Users.php';

class Service_Provider{
	private $usermodel;
	
	public function __construct(){
		$this->usermodel = new Database;
		$this->mailsys = new Mail_for_serviceproviders;
    $this->mailsys2 = new client_service_request_confirmation_mail;
    // $this->users = new Users;
	}

  public function getUserRole(){
    $result = $this->usermodel->getUserRole();
    
    if($result){
      foreach($result as $row){
          $usertype = $row;
          if($usertype == 1){
            echo "Customer /";
          }
          else if($usertype == 2){
            echo "Service Provider /";
          }
          else{
            echo "Admin /";
          }
        }
      }
    else
    {
      echo "Role";
    }
  }

  public function getUserName(){
    $result = $this->usermodel->getUserName();
    
    if($result){
      foreach($result as $row){
          $username = $row;
          echo $username."/";
        }
      }
    else
    {
      echo "User";
    }
  }

  public function getChangedRole(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['name'];

    $result = $this->usermodel->GetServiceprovider($name);
    $type =  $result['UserTypeId'];
    echo $type;

  }

  public function getNumber(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['name'];

    $result = $this->usermodel->GetServiceprovider($name);
    $number =  $result['Mobile'];
    echo $number;

  }

  public function getZipCode(){
    $result = $this->usermodel->getPostalCode();
    if($result){
      foreach($result as $row){
        $postalcode = $row;
        echo $postalcode;
      }
    }
  }
  

  public function getChngedZipCode(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['name'];
    $email = $this->usermodel->GetServiceProvider($name);
    $email = $email['Email'];
    $result = $this->usermodel->getChangedZipCode($email);
    if($result){
      foreach($result as $row){
      echo $row;
      };
    }
    else
    {
      echo 0;
    }
  }
public function getEmail(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['name'];
    $email = $this->usermodel->GetServiceProvider($name);
    $email = $email['Email'];
    echo $email;
  }

public function getDataFromeSearch(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['name'];
    $role = $decode['role'];
    $zipcode = $decode['zipcode'];
    $phone = $decode['phone'];
    $email = $decode['email'];
    $startdate = $decode['startdate'];
    $enddate = $decode['enddate'];

    if($enddate != "" && empty($startdate)){
      echo "Please fill start date";
    }
    else if($enddate != "" && $startdate != ""){
      if($startdate > $enddate){
        echo "Start date should be less tahn from date";
      }
    }
    else if(empty($name || $role || $zipcode || $phone || $email || $startdate || $enddate)){
      echo "Please fill anyone feild";
    }
    else if(empty($name || $zipcode || $phone || $email || $startdate || $enddate )){
    
      $result = $this->usermodel->getDataFromRole($role);
      $this->getResult($result);
      
    }
    else if(empty($name || $role || $phone || $email || $startdate || $enddate )){
     $role = $zipcode;
      $result = $this->usermodel->getDataFromRole($role);
      if($result){
      $this->getResult($result);
       }
    
      else
       {
         echo "No data Found";
        }
 }
 else if(empty($name || $role || $zipcode || $email || $startdate || $enddate )){
     $role = $phone;
      $result = $this->usermodel->getDataFromRole($role);
      if($result){
      $this->getResult($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }
 else if(empty($name || $role || $zipcode || $phone || $startdate || $enddate )){
     $role = $email;
      $result = $this->usermodel->getDataFromRole($role);
      if($result){
      $this->getResult($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }
 else if(empty($name || $role || $zipcode || $phone || $email || $enddate )){
     $role = $startdate;
     $role = date("Y-m-d", strtotime($role));
     $result = $this->usermodel->getDataFromRole($role);
     if($result){
      $this->getResult($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }
if((strlen($enddate) > 0) && (strlen($startdate) != 0)){
     $startdate = date("Y-m-d", strtotime($startdate));
     $enddate = date("Y-m-d", strtotime($startdate));
    $result = $this->usermodel->getDataFromStartAndEnddate($startdate,$enddate);
     if($result){
      $this->getResult($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }

 if(strlen($name>0)){
  $role = explode(' ', $name, 2)[0];
 $result = $this->usermodel->getDataFromRole($role);
      if($result){
      $this->getResult($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }
 

}
public function getResult($result){
 if($result){

        foreach($result as $row){
          $name = $row['FirstName'].' '.$row['LastName'];
          $date = $row['CreatedDate'];
        $date =substr($date,0,10);
        $date = " ".date("d/m/Y", strtotime($date));
        $phone = $row['Mobile'];
        if($row['ZipCode'] != null){
          $postalcode = $row['ZipCode'];
        }
        else{
          $postalcode = "";
        }
         if($row['IsActive'] == 1){
          $active = "Deactive";
          $active1 = $active;
          $class = "badge_complete";
        }
        else{
          if($row['UserTypeId'] == 2){
            if($row['IsActive'] != 1){
            $active = "New";
          $active1 = "Active";
            $class = "badge_new";
          }
          else{
            $active = "Active";
            $active1 = $active;
            $class = "badge_cancel";
          }
          }
          else{
          $active = "Active";
          $active1 = $active;
          $class = "badge_cancel";
        }
        }
        $toggle = "$('#target_".$row['FirstName']."').toggle()";
        $toggle = '"'.$toggle.'"';
        $firstname = $row['FirstName'];
        $role = $row['UserTypeId'];
        if($role == '1')
        $role = "Customer";
        else if($role == '2')
          $role = "Service Provider";
        else
          $role = "Admin";
        $list = $this->commonData($name,$date,$role,$phone,$postalcode,$class,$active,$toggle,$active1,$firstname);
        echo $list;
        
        }
      }
}
public function commonData($name,$date,$role,$phone,$postalcode,$class,$active,$toggle,$active1,$firstname){
   $list = '<tr>
                      <td>'.$name.'</td>
                      <td> </td>
                      <td>
                        <div class="row">
                               <div class="col">
                                  <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>'.$date.'</strong></span>
                                </div>
                            </div>
                          </td>
                      <td>'.$role.'</td>
                      <td>'.$phone.'</td>
                      <td>'.$postalcode.'</td>
                      
                      <td style="text-align:center;"><span class='.$class.' id="'.$firstname.'" onclick = "activeOrdeactve(this.id)" style="cursor:pointer">'.$active.'</span></td>
                      
                      <td style="text-align:center;" class="admin-table-action">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        <div class="admin-table-action-menu" id="target_'.$firstname.'">
                          <ul>
                            
                            <li><a  id="'.$firstname.'" onclick = "activeOrdeactve(this.id)">'.$active1.'</a></li>
                            <li><a  id="'.$firstname.'" onclick = "deleteUser(this.id)">Delete</a></li>
                          </ul>
                        </div>
                        
                      </td>
                    </tr>';
                    return $list;
  }
  
  public function getUserTable(){
    $result = $this->usermodel->getUsers();
    if($result){
      foreach($result as $row){
        $name = $row['FirstName'].' '.$row['LastName'];
        $date = $row['CreatedDate'];
        $date =substr($date,0,10);
        $date = " ".date("d/m/Y", strtotime($date));
        if($row['UserTypeId'] == 1){
          $role = "Customer";
        }
        else if($row['UserTypeId'] == 2){
          $role = "Service Provider";
        }
        else
        {
          $role = "Admin";
        }
        $phone = $row['Mobile'];
        if($row['ZipCode'] != null){
          $postalcode = $row['ZipCode'];
        }
        else{
          $postalcode = "";
        }
        if($row['IsActive'] == 1){
          $active = "Deactive";
          $active1 = $active;
          $class = "badge_complete";
        }
        else{
          if($row['UserTypeId'] == 2){
            $active = "New";
          $active1 = "Active";
            $class = "badge_new";
          }
          else{
          $active = "Active";
          $active1 = $active;
          $class = "badge_cancel";
        }
        }
        $toggle = "$('#target_".$row['FirstName']."').toggle()";
        $toggle = '"'.$toggle.'"';
        $list = '<tr>
                      <td>'.$name.'</td>
                      <td> </td>
                      <td>
                        <div class="row">
                               <div class="col">
                                  <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>'.$date.'</strong></span>
                                </div>
                            </div>
                          </td>
                      <td>'.$role.'</td>
                      <td>'.$phone.'</td>
                      <td>'.$postalcode.'</td>
                      
                      <td style="text-align:center;"><span class='.$class.' id="'.$row['FirstName'].'" onclick = "activeOrdeactve(this.id)" style="cursor:pointer">'.$active.'</span></td>
                      
                      <td style="text-align:center;" class="admin-table-action">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        <div class="admin-table-action-menu" id="target_'.$row['FirstName'].'">
                          <ul>
                            
                            <li><a style="cursor:pointer" id="'.$row['FirstName'].'" onclick = "activeOrdeactve(this.id)">'.$active1.'</a></li>
                            <li><a style="cursor:pointer" id="'.$row['FirstName'].'" onclick = "deleteUser(this.id)">Delete</a></li>
                          </ul>
                        </div>
                        
                      </td>
                    </tr>';
                    echo $list;
      }
    }
    else
    {
      echo 0;
    }
  }

  public function actiAndDeactivation(){
     $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['firstname'];
    $result = $this->usermodel->changeactivestatus($name);
    if($result){
      echo json_encode(array("insert"=>"success"));
    }
    else{
      echo json_encode(array("insert"=>"fail"));
    }
  }
  public function deleteUser(){
     $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $name = $decode['firstname'];
    $result = $this->usermodel->deleteUser($name);
    if($result){
      echo json_encode(array("insert"=>"success"));
    }
    else{
      echo json_encode(array("insert"=>"fail"));
    }
  }

  public function deleteservice(){
     $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $serviceid = $decode['serviceid'];
    $result = $this->usermodel->deleteservicebyAdmin($serviceid);
    if($result > 0){
      $result1 = $this->usermodel->delteserviceaddressbyAdmin($serviceid);
      if($result1 > 0){
        echo json_encode(array("insert"=>"success"));
      }
      else{
      echo json_encode(array("insert"=>"fail"));
    }
    }
    
    else{
      echo json_encode(array("insert"=>"fail"));
    }
  }

  public function getAllServicesData(){
    $result = $this->usermodel->getAllServicesData();
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
        $date = date("d/m/Y",strtotime($date));
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
        $discount = $row['Discount'];
    $grossamount = $row['SubTotal'];
    $netamount = $row['TotalCost'];
    $spid = $row['ServiceProviderId'];
    
    $addresult = $this->usermodel->getserviceresquestaddress($serviceid);
    $address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
    $address2 = $addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State'];
        $city = "'".$addresult['City']."'";
       $street ="'". $addresult['AddressLine1']."'";
    $toggle = "$('#target_".$serviceid."').toggle()";
    $toggle = '"'.$toggle.'"';
    $servicestatus = $row['Status'];
    if($servicestatus == "Cancelled"){
      $stausclass = "badge_cancel";
      $status = "Cancelled";
       $popupcontent = 
        "<li><a style='cursor:pointer' id='cancelledmodal_".$serviceid."' onclick='cancelledModal(this.id)'>Cancelled</a></li>";
    }
    else if($servicestatus == "completed"){
      $stausclass = "badge_complete";
      $status = "Completed";
      $popupcontent = 
        "<li><a style='cursor:pointer' id='completedmodal_".$serviceid."' onclick='completedModal(this.id)''>Completed</a></li>";
         
    }
    else{
      $current_date = date("d/m/Y");
      if($current_date == $date)
      {
        $stausclass ="badge_new";
        $status = "New";
        $popupcontent = 

        '<li><a style="cursor:pointer" id="editmodal_'.$serviceid.'" onclick="editModal(this.id,'.$date2.','.$time2.','.$address.','.$spid.','.$custid.','.$serviceid.')">Edit & Reschedule</a> </li>

         <li><a style="cursor:pointer" id="cancelmodal_'.$serviceid.'" onclick="cancelModal(this.id)">Cancel SR by cust</a></li>';
      }
      else{
        $stausclass ="badge_pending";
        $status = "Pending";
        $popupcontent = 
        '<li><a style="cursor:pointer" id="editmodal_'.$serviceid.'" onclick="editModal(this.id,'.$date2.','.$time2.','.$address.','.$spid.','.$custid.','.$serviceid.')">Edit & Reschedule</a> </li>

         <li><a style="cursor:pointer" id="cancelmodal_'.$serviceid.'" onclick="cancelModal(this.id)">Cancel SR by cust</a></li>';
      }
    }
    if($row['PaymentDone'] == 1){
      $payment = "Completed";
      $paymentclass = "badge_complete";
    }
    else{
      $payment = "NotCompleted";
      $paymentclass = "badge_cancel";
    }
    // $discount = $row['Discount'];
    // $grossamount = $row['SubTotal'];
    // $netamount = $row['TotalCost'];
    // $spid = $row['ServiceProviderId'];
      // echo $spid;exit;

        if($spid != 0){
    $targetresult = $this->usermodel->GetUser($spid);
    $spname = $targetresult['FirstName'].' '.$targetresult['LastName'];
    $avtar = $targetresult['UserProfilePicture'];
    $ratingresult = $this->usermodel->getSpAverageRatings($spid);
    $ratings = $ratingresult;



        $list = '<tr id="'.$serviceid.'" style="font-size:0.8rem">
          
                        <td >'.$serviceid.'</td>
                        <td style="min-width:150px;padding-left:0px">
                          <div class="row">
                             <div class="col">
                                <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong> '.$date.'</strong></span>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time"> '.$time.' - '.$printendtime.'</span>
                              </div>
                            </div>
                        </td>

                        <td class="pl-0" >
                          <div class="row">
                             <div class="col">
                                '.$custname.' 
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> '.$address2.'</span>
                              </div>
                            </div>
                        </td>
                        <td class="pl-0" style="min-width:160px">
          <div class="row">
           <div class="col-auto pr-1" >
              <img  style="border:1px solid #ccc;border-radius:50%;width:3rem;height:3rem;" src="images/AvatarImages/'.$avtar.'">
            </div>
            <div class="col pl-0 "><span >'.$spname.'</span><br>
              <div class="stars-outer">
          <div class="stars-inner"></div>
        </div>
              <span class="rating">'.$ratings.'</span>
            </div>
        </div>
       </td>
                        <td class="pl-0">'.$grossamount.'</td>
                        <td class="pl-0">'.$netamount.'</td>
                        <td class="pl-0">'.$discount.'</td>
                        
                        <td class="pl-0" style="text-align:center;"><span class='.$stausclass.'>'.$status.'</span></td>
                        <td class="pl-0" style="min-width:100px"><span class='.$paymentclass.'>'.$payment.'</span></td>
                      <td style="text-align:center;" class="admin-table-action pl-0">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        
                        <div class="admin-table-action-menu" id="target_'.$serviceid.'">
                          <ul >
                            '.$popupcontent.'

                          </ul>
                        </div>

                      </td>
                      </tr>';
                      echo $list;
                    }
                    else{
                      $list = '<tr id="'.$serviceid.'" style="font-size:0.8rem">
          
                        <td >'.$serviceid.'</td>
                        <td style="min-width:150px;padding-left:0px">
                          <div class="row">
                             <div class="col">
                                <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong> '.$date.'</strong></span>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time"> '.$time.' - '.$printendtime.'</span>
                              </div>
                            </div>
                        </td>

                        <td class="pl-0" >
                          <div class="row">
                             <div class="col">
                                '.$custname.' 
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> '.$address2.'</span>
                              </div>
                            </div>
                        </td>
                        <td class="pl-0"></td>
                        <td class="pl-0">'.$grossamount.'</td>
                        <td class="pl-0">'.$netamount.'</td>
                        <td class="pl-0">'.$discount.'</td>
                        
                        <td class="pl-0" style="text-align:center;"><span class='.$stausclass.'>'.$status.'</span></td>
                        <td class="pl-0" style="min-width:100px"><span class='.$paymentclass.'>'.$payment.'</span></td>
                      <td style="text-align:center;" class="admin-table-action pl-0">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        
                        <div class="admin-table-action-menu" id="target_'.$serviceid.'">
                          <ul >
                            '.$popupcontent.'
                          </ul>
                        </div>

                      </td>
                      </tr>';
                      echo $list;
                    }
  }
}
  else{
    echo "No Data Found";
  }

    
  }

 public function SpAvilabilityOnNewPostal(){
  $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $postalcode = $decode['newpostalcode'];
    $spid = $decode['spid'];
    $result = $this->usermodel->SpAvilabilityOnNewPostal($spid,$postalcode);
    if($result > 0){
      echo json_encode (array("insert"=>"success"));
    }
    else{
      echo json_encode (array("insert"=>"fail"));
    }
 }
  public function updateRequestByAdmin(){
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $date = $decode['date'];
    $date =date("Y-m-d", strtotime($date)); 
    $time = $decode['time'];
    $street = $decode['street'];
    $housenumber = $decode['housenumber'];
    $postalcode = $decode['postalcode'];
    $city = $decode['city'];
    $reason = $decode['reason'];
    $modifier = $decode['modifier'];
    $currentdate = $decode['currentdate'];
    $spid = $decode['spid'];
    if($spid != 0){
    $mailresult1 = $this->usermodel->GetUser($spid);
    $spemail = $mailresult1['Email'];
    $spname = $mailresult1['FirstName'].' '.$mailresult1['LastName'];
  }
    $custid = $decode['custid'];
    $mailresult2 = $this->usermodel->GetUser($custid);
    $custemail = $mailresult2['Email'];
    $custname = $mailresult2['FirstName'].' '.$mailresult2['LastName'];
    $serviceid = $decode['serviceid'];

    $data = [
      'date'=>$date,
      'time'=>$time,
      'street'=>$street,
      'housenumber'=>$housenumber,
      'postalcode'=>$postalcode,
      'city'=>$city,
      'reason'=>$reason,
      'modifier'=>$modifier,
      'currentdate'=>$currentdate,
      'serviceid'=>$serviceid
    ];

    $result = $this->usermodel->updateRequestByAdmin($data);
    if($result == '1'){
      if($spid != 0 ){
      $mail = array($spemail,$custemail);
      $name = array($spname,$custname);
      for($i = 0 ; $i<2 ; $i++)
      {
         $result2 = $this->mailsys2->sendUpdationByAdmin($mail[$i],$name[$i],$serviceid,$_SESSION['FirstName']);
      }
      echo json_encode(array("insert"=>"success","msg"=>"Updated Successfully!!!!"));
    }
    else{
      $result2 = $this->mailsys2->sendUpdationByAdmin($custemail,$custname,$serviceid,$_SESSION['FirstName']);
      
      echo json_encode(array("insert"=>"success","msg"=>"Updated Successfully!!!!"));
    }

    }
    else if ($result == '2'){
      echo json_encode(array("insert"=>"fail","msg"=>"Address is not updated"));
    }
    else{
      echo json_encode(array("insert"=>"fail","msg"=>"Request is Not updated"));
    }
  }

  public function getCustomerName(){
    $result = $this->usermodel->getUsers();
    if($result){
      foreach($result as $row){
        if($row['UserTypeId'] == '1'){
          echo $row['FirstName'].' '.$row['LastName'].'/';
        }
      }
    }
    else
    {
      echo "Customer";
    }
  }
  public function getServiceproviderName(){
    $result = $this->usermodel->getUsers();
    if($result){
      foreach($result as $row){
        if($row['UserTypeId'] == '2'){
          echo $row['FirstName'].' '.$row['LastName'].'/';
        }
      }
    }
    else
    {
      echo "Service Provider";
    }
  }

public function getServiceDataFromeSearch(){
  $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $serviceid = $decode['serviceid'];
    $postalcode = $decode['postalcode'];
    $email = $decode['email'];
    $customername = $decode['customername'];
    $spname = $decode['spname'];
    $paymentstatus = $decode['paymentstatus'];
    $servicestatus = $decode['servicestatus'];
    $startdate = $decode['startdate'];
    $enddate = $decode['enddate'];

    if($serviceid != "" && empty($postalcode && $email && $postalcode && $customername && $spname && $paymentstatus && $servicestatus && $startdate && $enddate  ))
    {
      $data = $serviceid;
      $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
    }

    else if($postalcode != '' && empty($serviceid && $email  && $customername && $spname && $paymentstatus && $servicestatus && $startdate && $enddate  ))
    {
      $data = $postalcode;
      $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
    }

    else if($email != '' && empty($serviceid  && $postalcode && $customername && $spname && $paymentstatus && $servicestatus && $startdate && $enddate  ))
    {
      $result = $this->usermodel->getuserid($email);
      if($result){
      $data = $result['UserId'];
      $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    }
    else
    {
      echo "No data Found";
    }
    }
    else if($customername != '' && empty($serviceid  && $postalcode && $email && $spname && $paymentstatus && $servicestatus && $startdate && $enddate  ))
    {
      $lastname = explode(' ', $customername, 2)[1];
     $result = $this->usermodel->GetServiceProvider($lastname);
      if($result){
      $data = $result['UserId'];
      $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    }
    else
    {
      echo "No data Found";
    }
    }

    else if($spname != '' && empty($serviceid  && $postalcode && $email && $customername && $paymentstatus && $servicestatus && $startdate && $enddate  ))
    {
      $lastname = explode(' ', $spname, 2)[1];
     $result = $this->usermodel->GetServiceProvider($lastname);
      if($result){
      $data = $result['UserId'];
      $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    }
    else
    {
      echo "No data Found";
    }
    }

    else if($paymentstatus != '' && empty($serviceid && $email  && $customername && $spname && $postalcode && $servicestatus && $startdate && $enddate  ))
    {
      $data = $paymentstatus;
      $result = $this->usermodel->getDataFromData($data);
      if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
    }
    else if($servicestatus != '' && empty($serviceid && $email  && $customername && $spname && $postalcode && $paymentstatus && $startdate && $enddate  ))
    {
      $data = $servicestatus;
      $result = $this->usermodel->getDataFromData($data);
      if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
    }

    else if($startdate != '' && empty($serviceid && $email  && $customername && $spname && $postalcode && $paymentstatus && $servicestatus && $enddate  )){
      $data = $startdate;
     $data = date("Y-m-d", strtotime($data));
     $result = $this->usermodel->getDataFromData($data);
     if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
    }

    else if((strlen($enddate) > 0) && (strlen($startdate) != 0) && empty($serviceid && $email  && $customername && $spname && $postalcode && $paymentstatus && $servicestatus)){
     $startdate = date("Y-m-d", strtotime($startdate));
     $enddate = date("Y-m-d", strtotime($startdate));
    $result = $this->usermodel->getServiceFromStartAndEnddate($startdate,$enddate);
     if($result){
      $this->getCommonServicedata($result);
    }
    
    else
    {
      echo "No data Found";
    }
 }
}

public function getCommonServicedata($result){
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
        $date = date("d/m/Y",strtotime($date));
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
        $discount = $row['Discount'];
    $grossamount = $row['SubTotal'];
    $netamount = $row['TotalCost'];
    $spid = $row['ServiceProviderId'];
    
    $addresult = $this->usermodel->getserviceresquestaddress($serviceid);
    $address = "'".$addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State']."'";
    $address2 = $addresult['AddressLine1']." ".$addresult['AddressLine2'].", ".$addresult['PostalCode']." ".$addresult['City']." - ".$addresult['State'];
        $city = "'".$addresult['City']."'";
       $street ="'". $addresult['AddressLine1']."'";
    $toggle = "$('#target_".$serviceid."').toggle()";
    $toggle = '"'.$toggle.'"';
    $servicestatus = $row['Status'];
    if($servicestatus == "Cancelled"){
      $stausclass = "badge_cancel";
      $status = "Cancelled";
       $popupcontent = 
        "<li><a style='cursor:pointer' id='cancelledmodal_".$serviceid."' onclick='cancelledModal(this.id)'>Cancelled</a></li>";
    }
    else if($servicestatus == "completed"){
      $stausclass = "badge_complete";
      $status = "Completed";
      $popupcontent = 
        "<li><a style='cursor:pointer' id='completedmodal_".$serviceid."' onclick='completedModal(this.id)''>Completed</a></li>";
         
    }
    else{
      $current_date = date("d/m/Y");
      if($current_date == $date)
      {
        $stausclass ="badge_new";
        $status = "New";
        $popupcontent = 

        '<li><a style="cursor:pointer" id="editmodal_'.$serviceid.'" onclick="editModal(this.id,'.$date2.','.$time2.','.$address.','.$spid.','.$custid.','.$serviceid.')">Edit & Reschedule</a> </li>

         <li><a style="cursor:pointer" id="cancelmodal_'.$serviceid.'" onclick="cancelModal(this.id)">Cancel SR by cust</a></li>';
      }
      else{
        $stausclass ="badge_pending";
        $status = "Pending";

        $popupcontent = 
        '<li><a style="cursor:pointer" id="editmodal_'.$serviceid.'" onclick="editModal(this.id,'.$date2.','.$time2.','.$address.','.$spid.','.$custid.','.$serviceid.')">Edit & Reschedule</a> </li>

         <li><a style="cursor:pointer" id="cancelmodal_'.$serviceid.'" onclick="cancelModal(this.id)">Cancel SR by cust</a></li>';
      }
    }
    if($row['PaymentDone'] == 1){
      $payment = "Completed";
      $paymentclass = "badge_complete";
    }
    else{
      $payment = "NotCompleted";
      $paymentclass = "badge_cancel";
    }
    
      // echo $spid;exit;

        if($spid != 0){
    $targetresult = $this->usermodel->GetUser($spid);
    $spname = $targetresult['FirstName'].' '.$targetresult['LastName'];
    $avtar = $targetresult['UserProfilePicture'];
    $ratingresult = $this->usermodel->getSpAverageRatings($spid);
    $ratings = $ratingresult;



        $list = '<tr id="'.$serviceid.'" style="font-size:0.8rem">
          
                        <td >'.$serviceid.'</td>
                        <td style="min-width:150px;padding-left:0px">
                          <div class="row">
                             <div class="col">
                                <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong> '.$date.'</strong></span>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time"> '.$time.' - '.$printendtime.'</span>
                              </div>
                            </div>
                        </td>

                        <td class="pl-0" >
                          <div class="row">
                             <div class="col">
                                '.$custname.' 
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> '.$address2.'</span>
                              </div>
                            </div>
                        </td>
                        <td class="pl-0" style="min-width:160px">
          <div class="row">
           <div class="col-auto pr-1" >
              <img  style="border:1px solid #ccc;border-radius:50%;width:3rem;height:3rem;" src="images/AvatarImages/'.$avtar.'">
            </div>
            <div class="col pl-0 "><span >'.$spname.'</span><br>
              <div class="stars-outer">
          <div class="stars-inner"></div>
        </div>
              <span class="rating">'.$ratings.'</span>
            </div>
        </div>
       </td>
                        <td class="pl-0">'.$grossamount.'</td>
                        <td class="pl-0">'.$netamount.'</td>
                        <td class="pl-0">'.$discount.'</td>
                        
                        <td class="pl-0" style="text-align:center;"><span class='.$stausclass.'>'.$status.'</span></td>
                        <td class="pl-0" style="min-width:100px"><span class='.$paymentclass.'>'.$payment.'</span></td>
                      <td style="text-align:center;" class="admin-table-action pl-0">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        
                        <div class="admin-table-action-menu" id="target_'.$serviceid.'">
                          <ul >
                            '.$popupcontent.'

                          </ul>
                        </div>

                      </td>
                      </tr>';
                      echo $list;
                    }
                    else{
                      $list = '<tr id="'.$serviceid.'" style="font-size:0.8rem">
          
                        <td >'.$serviceid.'</td>
                        <td style="min-width:150px;padding-left:0px">
                          <div class="row">
                             <div class="col">
                                <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong> '.$date.'</strong></span>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time"> '.$time.' - '.$printendtime.'</span>
                              </div>
                            </div>
                        </td>

                        <td class="pl-0" >
                          <div class="row">
                             <div class="col">
                                '.$custname.' 
                              </div>
                          </div>
                            <div class="row">
                              <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> '.$address2.'</span>
                              </div>
                            </div>
                        </td>
                        <td class="pl-0"></td>
                        <td class="pl-0">'.$grossamount.'</td>
                        <td class="pl-0">'.$netamount.'</td>
                        <td class="pl-0">'.$discount.'</td>
                        
                        <td class="pl-0" style="text-align:center;"><span class='.$stausclass.'>'.$status.'</span></td>
                        <td class="pl-0" style="min-width:100px"><span class='.$paymentclass.'>'.$payment.'</span></td>
                      <td style="text-align:center;" class="admin-table-action pl-0">
                        <a id="poplink" onclick='.$toggle.'class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
                        
                        <div class="admin-table-action-menu" id="target_'.$serviceid.'">
                          <ul >
                            '.$popupcontent.'
                          </ul>
                        </div>

                      </td>
                      </tr>';
                      echo $list;
                    }
  }
}
}




}
$init = new Service_Provider;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	switch($_GET['q']){
    case 'getChangedRole':
      $init->getChangedRole();
      break;
    case 'getNumber':
      $init->getNumber();
      break;
    case 'getChngedZipCode':
      $init->getChngedZipCode();
      break;
    case 'getEmail':
      $init->getEmail();
      break;
    case 'getDataFromeSearch':
      $init->getDataFromeSearch();
      break;
    case 'actiAndDeactivation':
      $init->actiAndDeactivation();
      break;
    case 'deleteUser':
      $init->deleteUser();
      break;
    case 'SpAvilabilityOnNewPostal':
      $init->SpAvilabilityOnNewPostal();
      break;
    case 'updateRequestByAdmin':
      $init->updateRequestByAdmin();
      break;
    case 'getServiceDataFromeSearch':
      $init->getServiceDataFromeSearch();
      break;
    case 'deleteService':
      $init->deleteService();
      break;
    
		
		default:
			redirect("../views/Homepage.php");
	}
}
else{
	switch($_GET['q']){

    case 'getUserRole':
      $init->getUserRole();
      break;

    case 'getUserName':
      $init->getUserName();
      break;

    case 'getZipCode':
      $init->getZipCode();
      break;

    case 'getUserTable':
      $init->getUserTable();
      break;

    case 'getAllServicesData':
      $init->getAllServicesData();
      break;

    case 'getCustomerName':
      $init->getCustomerName();
      break;

    case 'getServiceproviderName';
      $init->getServiceproviderName();
      break;

    
		default:
		 redirect("../views/Homepage.php");
	}
}
?>