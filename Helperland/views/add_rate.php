<?php
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    $rating1 = $_POST["rating1"];
    $rating2 = $_POST["rating2"];
    $rating3= $_POST["rating3"];
 
    $sql = "INSERT INTO ratee (rate) VALUES ($rating1')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>