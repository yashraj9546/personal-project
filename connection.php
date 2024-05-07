<?php
    $server_name= "localhost";
    $user_name= "root";
    $password= "";
    $database= "crud";

    $conn= mysqli_connect($server_name,$user_name,$password,$database);
     
    if(!$conn)
    {
        echo "connection was not stablished successfully due to ".mysqli_connect_error($conn);
    }
?>