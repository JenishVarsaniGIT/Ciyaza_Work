<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $state_id = $_POST['state_id'];

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $sql = "INSERT INTO `city` (users_id,name,code) VALUES ('$state_id','$first_name','$last_name')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
      header('location:city_view.php');
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
            border: solid;
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
                color: gray;
                }
                a:hover {
                background: linear-gradient(to bottom, #33ccff 0%, #006600 100%);
                color: gray;
                }
                div{
                  border: 13px double;
                  background-color: #f1f1f1;
                  width: 30%;
                  height: 55%;
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
                  height: 35px;
                }
                select{
                  width: 100%;
                  height: 30px;
                }
    </style>
  </head>


<!-- -->


<body>

<h4>Create City</h4>

<form name="myForm" method="POST" onsubmit="return validateForm()">
  <a class="btn btn-info" href="city_view.php?">Back To Dashboard</a><br><br>
                
<div>
            <center><h3>Create New City</h3><hr></center>
            <label>State_id:</label><br>
                <select class="form-select" name="state_id" id="state_id" aria-label="Default select example">
                        <option selected>Select State ID</option>
                        <?php
                        $sql = "select * from `states`";
                        $result = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_assoc($result)) {
                                $state = $data['state'];
                                $id = $data['id'];
                                echo '<option value='.$id.'>' . $state . '</option>';
                            }
                        ?>
                    </select><br><br>
            <label>City:</label><br>
              <input type="text" name="firstname" placeholder="Enter Your City"><br><br>
              <label>Code:</label><br>
              <input type="text" name="lastname" placeholder="Enter Your City Code"><br><br>
              <input type="submit" name="submit" value="submit">
</div>
</form>

<script>
function validateForm() {
  const x = document.forms["myForm"]["state_id"].value;
  const y = document.forms["myForm"]["firstname"].value;
  const z = document.forms["myForm"]["lastname"].value;
  if (x == "") {
    alert("State_id must be filled out");
    return false;
  }else if(y == ""){
    alert("state must be filled out");
    return false;
  }else if(z == ""){
    alert("code must be filled out");
    return false;
  }
}
</script>
</body>

</html>