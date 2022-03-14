<?php

$msg = ""; 
   if(isset($_POST['upload'])){
    $target = "images/AvatarImages/".basename($_FILES['image']['name']);
    $db = mysqli_connect("localhost","root","","helperland") or die(error);
    $image = $_FILES['image']['name'];
  
    $sql = "UPDATE user SET UserProfilePicture = '$image' WHERE FirstName = 'Radhika'";
    $result = mysqli_query($db,$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
    {
      $msg = "Uploaded..";
    }else{
      $msg = "There was a probem";
    }

   }
 ?>
 
<!DOCTYPE html>
<html>
<body>
  <div>
    <?php
      $db = mysqli_connect("localhost","root","","helperland") or die(error);
      $sql =  "SELECT UserProfilePicture FROM user WHERE Firstname = 'Radhika'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      echo "<div >";
         echo "<img src = 'images/AvatarImages/".$row['UserProfilePicture']."'>";
     ?>
  </div>
<!--Make sure to put "enctype="multipart/form-data" inside form tag when uploading files -->
<form action="" method="post" enctype="multipart/form-data" >
<!--input tag for file types should have a "type" attribute with value "file"-->
<input type="hidden" name="size" value="1000000">
<input type="file" name="image" />
<input type="submit" name="upload" value="upload" />
</form>
</body>
</html>


