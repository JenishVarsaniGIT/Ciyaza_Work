<html>
    <head>
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
                div{
                  border: 13px double;
                  background-color: #f1f1f1;
                  width: 30%;
                  height: 50%;
                  margin: auto;
                }
                hr{
                  border: 3px solid;
                }
                h1{
                  color: palevioletred;
                  background-color: thistle;
                }
                input{
                    width: 100%;
                    height:35px;
                }
                select{
                    width: 100%;
                    height:35px;
                }
        </style>
    </head>
    <body>
<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['state'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['code'];

        $sql = "UPDATE `city` SET name='$firstname',code='$lastname' WHERE id='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {
            header("location:city_view.php");
            // echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 
if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `city` WHERE id='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['name'];

            $lastname = $row['code'];

            $id = $row['id'];

            $id1 = $row['users_id'];

        } 

    ?>

        <h3>User Update City</h3>

        <form name="myForm" method="POST" onsubmit="return validateForm()">

        <div>
                <center><h1>Update City</h1><hr></center>

                <select class="form-select" name="state_id" id="state_id" aria-label="Default select example">
                        <!-- <option selected>Select State ID</option> -->
                        <?php
                        $sql = "select * from `states` where id=$id1";
                        $result = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_assoc($result)) {
                                $name = $data['state'];
                                $id = $data['id'];
                                echo '<option value='.$id.'>' . $name . '</option>';
                            }
                            $sql = "select * from `states`";
                            $result = mysqli_query($conn, $sql);
                                while ($data = mysqli_fetch_assoc($result)) {
                                    $name = $data['state'];
                                    $id = $data['id'];
                                    echo '<option value='.$id.'>' . $name . '</option>';
                                }
                        ?>
                    </select><br><br>
            
            
            State:<br>
            <input type="text" name="state" value="<?php echo $first_name; ?>"><br><br>

            code<br>
            <input type="text" name="code" value="<?php echo $lastname; ?>"><br><br>

            <input type="submit" value="Update" name="update">

</div>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 
<script>
function validateForm() {
  let x = document.forms["myForm"]["user_id"].value;
  let y = document.forms["myForm"]["state"].value;
  let z = document.forms["myForm"]["code"].value;
  if (x == "") {
    alert("user_id must be filled out");
    return false;
  }else if(y == ""){
    alert("state must be filled out");
    return false;
  }else if(z == ""){
    alert("code must be filled out");
  }
}
</script>
</body>
</html>