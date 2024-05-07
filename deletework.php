<?php
    include 'connection.php';
 
    if(isset($_GET['deleteid']))
    {
        $id= $_GET['deleteid'];
        $sql = "DELETE FROM `notes` WHERE `notes`.`sl. no` = $id";
        $result= mysqli_query($conn,$sql) ;
            if ($result){
                header('location: /yash/crudapp/cruddesign.php');
              }
            else
              {
                echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading"></h4>
                <p> We are facing some error <br> your entry was not deleted.</p>
                <hr>
                </div>'; 
              }
        }
        

?>