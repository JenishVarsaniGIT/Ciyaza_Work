<?php
    $showAlert = false;
    $showError = false;
 if ($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partials/config.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $secure_pass = password_hash($password, PASSWORD_BCRYPT);
    $secure_cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    // $exists=false;


    $existsql = "SELECT * FROM `users` WHERE username = '$username'";
    $result=mysqli_query($conn,$existsql);
    $numrExistRows = mysqli_num_rows($result);
    if($numrExistRows > 0){
        // $exists = true;
        $showError = "username Already Exists";
    }
    else{
        // $exists = false;
        if(($password == $cpassword)){
            // $hash=password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`,`password`,`cpassword`,`email`,`contact`) VALUES
        ('$username','$secure_pass','$secure_cpass','$email','$contact')";
        $result = mysqli_query($conn, $sql);
        if ($result){
           $showAlert = true;
        }
    }
    else{
        $showError = "password do not match or";
        }
    }
}
// echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SignUp</title>
    <style>
        div{
            width: 40%;
        }
        label{
            float:left;
            font-size: 20px;
        }
        body{
            background-color: #f1f1f1;
        }
    </style>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    if($showError){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        ?>
    <div class="container my-2" align="center">
        <h3 class="text-center">User New registration</h3>

        <form action="/php/signup/task/signup.php" method="post">
        <div class="form-group my-2">
            <label for="username" class="form-label"><sub><b>Username:</b></sub>*</label>
            <input type="username" /*maxlength="11"*/ class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="off" value="" placeholder="Enter Your Username" required>
        </div>
        
        <div class="form-group my-2">
            <label for="email" class="form-label"><sub><b>Email:</b></sub>*</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Enter Your Email" required>
        </div>

        <div class="form-group my-2">
            <label for="mobile" class="form-label"><sub><b>Contact Number :</b></sub>*</label>
            <input type="tel" class="form-control" maxlength="10" id="phone" name="contact" placeholder="Enter Your Phone Number" autocomplete="off" required>
        </div>

        <div class="form-group my-2">
            <label for="myfile" class="form-label"><sub><b>Select a file:</b></sub>*</label>
            <input type="file" class="form-control" id="myfile" name="myfile" required>
        </div>

        <div class="form-group my-2">
            <label for="password" class="form-label"><sub><b>Password:</b></sub>*</label>
            <input type="password" /*maxlength="23"*/ class="form-control" id="myInput" name="password" placeholder="Enter Your Password" required>
        </div>

        <div class="form-group">
            <label class="form-label">
              <h6><input type="checkbox" onclick="show1()">Show Password</h6>
            </label>
        </div><br><br>

        <div class="form-group">
            <label for="cpassword" class="form-label"><sub><b>Confirm Password:</b></sub>*</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Your confirm Password" required>
        </div>

        <div class="form-group my-2">
            <label for="birthday" class="form-label"><sub><b>Birthday:</b></sub>*</label>
            <input type="date" class="form-control" id="birthday" name="birthday" /*placeholder=""*/ required>
        </div>

        <div class="form-group my-4">
            <label class="form-label">
                <h6><a href="login.php">Already registered?</a>
                <button type="submit" class="btn btn-primary">SignUp</button></h6>
            </label>
        </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
  <script>
     //password show and hide
function show1() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
</html>