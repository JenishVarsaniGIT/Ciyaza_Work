<?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
  $loggedin=true;
  // header("locaton:login.php");
  // exit;
}
else{
  $loggedin = false;
}

echo ' <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
        
        if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/php/signup/task/login.php">Login</a>p
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/php/signup/task/signup.php">Signup</a>
        </li>';
        }

        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/php/signup/task/logout.php">Logout</a>
        </li>';
        }

     echo '</ul>
     
      </form>
    </div>
  </div>
</nav>';
?>