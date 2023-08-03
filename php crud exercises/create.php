<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $sql = "INSERT INTO `states`(`state`, `code`) VALUES ('$first_name','$last_name')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
      header('location:view.php');
      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
      body{
        /* background: linear-gradient(to bottom, #99ff99 0%, #99ffcc 100%); */
        background: #e6f3f8;
      }
      button {
            border: solid yellow;
            color: black;
            padding: 10px 25px;
            background:linear-gradient(to bottom, #ffcc00 0%, #006600 100%);;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            }
            button:hover {
                background: linear-gradient(to bottom, #33ccff 0%, #006600 100%);
                color: black;
                }
                a:hover {
                background: linear-gradient(to bottom, #33ccff 0%, #006600 100%);
                color: black;
                }
                div{
                  border: 13px double;
                  background-color: #f1f1f1;
                  width: 25%;
                  height: 40%;
                  margin: auto;
                }
                hr{
                  border: 3px solid;
                }
                h3{
                  color: palevioletred;
                  background-color: thistle;
                }
                input{
                  width: 100%;
                }
    </style>
  </head>

<body>

<h4>Create State</h4>

<form name="myForm" method="POST" onsubmit="return validateForm()">
  <a class="btn btn-info" href="view.php?">Back To Dashboard</a><br><br>

<div>
            <center><h3>Create New State</h3><hr></center>

            <label>State:</label><br>
                <input type="text" name="firstname" placeholder="Enter Your City"><br><br>
             
            <label>Code:</label><br>
              <input type="text" name="lastname" placeholder="Enter Your City Code"><br><br>
          
              <input type="submit" name="submit" value="submit">
</div>

</form>
<script>
function validateForm() {
  let x = document.forms["myForm"]["firstname"].value;
  let y = document.forms["myForm"]["lastname"].value;
  if (x == "") {
    alert("state must be filled out");
    return false;
  }else if(y == ""){
    alert("code must be filled out");
    return false;
  }
}



</script>
</body>

</html>