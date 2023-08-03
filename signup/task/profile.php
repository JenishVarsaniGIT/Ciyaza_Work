<?php
    include "partials/config.php";
    if(isset($_post['sublogin']))
    {
        $login=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from users where (username='$login' or email='$login')";
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        if($num==1){
            $row=mysqli_fetch_assoc($res);
            if('password_verfiy'($password,$row['password'])){
                $_SESSION["login_sess"]=1;
                $_SESSION["login_email"]=$row['email'];
                header("location:account.php");
            }else{
                header("location:login.php?loginerror=".$login);
            }
        }
        else{
            header("location:login.php?loginerror=".$login);
        }
    }
?>