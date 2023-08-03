<?php
include 'config.php';
    // $sql = "CREATE TABLE  `states` (id int(10) NOT NULL AUTO_INCREMENT,
    //  state varchar(100) NOT NULL, code varchar(3),
    //  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    //  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //  PRIMARY KEY (id))";
 
    // $sql = "CREATE TABLE `city` (id int(10) NOT NULL AUTO_INCREMENT, 
    // users_id int(10) UNIQUE, 
    // code int(10) NOT NULL, 
    // name varchar(50) NOT NULL, 
    // created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    // updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, FOREIGN KEY (users_id) REFERENCES states(id),
    // PRIMARY KEY (id))";
     
     
     if($conn->query($sql) === true){
        echo "Table created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>