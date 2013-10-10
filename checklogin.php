<?php
session_start();
include_once("config.php");
$username=$_POST['username'];
$password=$_POST['password'];
$username=stripslashes($username);
$password=stripslashes($password);
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
$username=mysqli_real_escape_string($dbc,$username);
$password=mysqli_real_escape_string($dbc,$password);


$query="select * from users where username='$username' and password='$password'";
$result=mysqli_query($dbc,$query);
$count=mysqli_num_rows($result);
if($count==1){
    
$_SESSION['user']=$username;
header("location:login_success.php");
    
}
else {
echo "Wrong Username or Password";
?>
<br /><a href="index.php"><button>main</button></a>

<?php
}
?>