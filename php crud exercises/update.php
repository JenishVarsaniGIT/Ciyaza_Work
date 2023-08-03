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
                color: black;
                }
                div{
                  border: 13px double;
                  background-color: #f1f1f1;
                  width: 22%;
                  height: 40%;
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
                }
        </style>
    </head>
    <body>
<?php 

include "config.php";

$id = $_GET['id'];
$sql = "select * from  `states` where id=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$name = $data['state'];
$code = $data['code'];

if (isset($_POST['update'])) {
    $name = $_POST['state'];
    $code = $_POST['code'];
    $sql = "update `states` set state='$name', code='$code' where id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:view.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
        <h2>User Update State</h2>
        <form name="myForm" method="POST" onsubmit="return validateForm()">

        <div>
                <center><h1>Update State</h1><hr></center>
           
            State:<br>
            <input type="text" name="state" value="<?php echo $name;?>"><br><br>

            Code:<br>
            <input type="text" name="code" value="<?php echo $code;?>"><br><br><br>

            <input type="submit" value="Update" name="update">

</div>

        </form> 

        </body>

        </html> 

 
<script>
function validateForm() {
  let x = document.forms["myForm"]["state"].value;
  let y = document.forms["myForm"]["code"].value;
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