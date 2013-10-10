<?
session_start();
include_once("config.php");
$sendto=$_POST['sendto'];
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
if($_SESSION['user']!=''){
	if(isset($_POST['message'])&&!empty($_POST["message"])){
    $currentUser=$_POST["from"];
    $sendto=$_POST['sendto'];
    $message=$_POST['message'];
	$query="INSERT INTO `messages` VALUES (
NULL ,  '$currentUser',  '$sendto',  '$message')";
   	$result=mysqli_query($dbc,$query);}
    	$query="select * from users where id=$sendto";
		$result=mysqli_query($dbc,$query);
		$result=mysqli_fetch_array($result);
		$ks=$result['username'];
    	header("location:chatUpdate.php?from=$ks");
    	
   
    
    
    
    }
    ?>