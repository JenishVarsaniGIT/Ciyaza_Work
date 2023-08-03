    <?php
    $login = false;
    $showError = false;
 if ($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partials/config.php';
    $username = $_POST[ "username"];
    $password = $_POST[ "password"];
   
        // $sql = "select * from users where username='$username' AND password='$password'";
        $sql = "select * from users where username='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    // header("location:welcome.php");
                    header("location:/php/php crud exercises/view.php");
                }
            }
        }
}

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <style>
        div{
            width:40%;
        }
        label{
            float: left;
            font-size:20px;
        }
        body{
            background-color: #EAE9E5;
        }.container{
            margin-top:25%;
            background:#fff;
            padding:30px;
            box-shadow: 0px 1px 36px 5px rgb(0,0,0,0,25);
            border-radius: 5px;
        }
    </style>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($login){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> you are logged in
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
    <div class="container my-4" align="center">

        <h3 class="text-center">User Login</h3>

        <?php
            if(isset($_GET['loginerror'])) {
            $loginerror-$_GET['loginerror'];
            } 
            if(!empty($loginerror)){ echo '<p class="errmsg">Invalid login
                credentials, please Try Again..</p>';} ?>
        
        <form action="/php/signup/task/profile.php" method="POST">
            
        <div class="form-group my-4">
            <label for="username" class="form-label"><sub><b>Username:</b></sub>*</label>
            <input type="username" class="form-control" value="<?php
            if(!empty($loginerror)){ echo $loginerror; } ?>" id="username" name="username" aria-describedby="emailHelp" autocomplete="off" placeholder="Enter Your Username">
        </div>
        
        <div class="form-group my-4">
            <label for="password" class="form-label"><sub><b>Password:</b></sub>*</label>
            <input type="password" class="form-control" id="myInput" name="password" placeholder="Enter Your Password">
        </div> 

        <div class="form-group my-3">
            <label for="username" class="form-label">
                    <h6><input type="checkbox" onclick="show()">Show Password</h6>
            </label>
        </div><br>

        <div class="form-group my-4">
            <label for="username" class="form-label">
                <h6><a href="forgot_password.php">Forgot your password?</a>
                <button type="submit" class="btn btn-primary" name="sublogin" onclick=" return myFunction()">Login</button>
                </h4>
            </label>
        </div>

</form>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    function myFunction() {
 return confirm("correct username and password");
}

//password show and hide
function show() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
</html>