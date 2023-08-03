<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `states` WHERE `id`='$user_id'";
try{
    mysqli_query($conn, $sql);
    header("location:view.php");
}catch(Exception $e){
    echo "<script>
         alert('foreign key already exists id= $user_id');
     </script>";
}
}
?>