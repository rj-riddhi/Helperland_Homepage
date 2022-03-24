<?php 
    if(empty($_GET['selector']) || empty($_GET['validator'])){
        echo 'Could not validate your request!';
    }else{
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
        
        if(ctype_xdigit($selector) && ctype_xdigit($validator)) { ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include 'headerLinks.php';
              include_once '../helpers/msgs.php'; ?>
        <!-- External css -->
        <link rel="stylesheet" href="css/register.css">
        <link rel="stylesheet" href="css/login.css">

        
        <title>Register Your Self</title>
    </head>
    <body >
     <?php 
     flash('newReset') 
     ?>
        <div class="container-fluid p-0  main_container">
            
            <!-- Main Content start-->
            <section >
                
                <div class="container mx-auto form_container">
                    <div class="container mx-auto p-0 m-5" >
                        <h2>Reset Password</h2>
                        <div class="row m-0 justify-content-center">
                            <div class="col p-0 mr-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
                            <div class="col p-0" style="max-width:1.5rem">
                                <img  src="images/Contact/faq_star.png">
                            </div>
                            <div class="col p-0 ml-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
                        </div>
                    </div>
                    
                     <form method="post" class="text-center" action="../controllers/ResetPasswords.php">
        <input type="hidden" name="type" value="reset" />
        <input type="hidden" name="selector" value="<?php echo $selector ?>" />
        <input type="hidden" name="validator" value="<?php echo $validator ?>" />
        <div class="form-group ">
        <input type="password" name="pwd" 
        placeholder="New Password"  class="form-control">
        </div>
        <div class="form-group ">
        <input type="password" name="pwd-repeat" 
        placeholder="Confirm Password"  class="form-control">
         </div>
        <div class="col-12">
            <button class="btn sub_btn  btn-rounded" name="submit btn" type="submit">Save</button>
        </div>
        </form>
    <?php 
    }else{
        echo 'Could not validate your request!';
    }
}?>
                    
                </div>
            </section>
            
            <?php
            require_once 'jsLinks.php';
            ?>
        </body>
    </html>