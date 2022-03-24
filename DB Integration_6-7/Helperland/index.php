

<?php
$controller='Users';
$file = 'Homepage';


if(isset($_GET['controller']) && $_GET['controller'] !=''){
    $controller= $_GET['controller'];
}


if(file_exists('views/'.$file.'.php')){
    header("location:views/Homepage.php");
}else{
    echo '<h1>Controller Not Found</h1>';
}

?> 
