<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `city` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        header('location:city_view.php');
        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>