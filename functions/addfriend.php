<?
session_start();
include_once("config.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&isset($_GET['f']))
    {
        $me=$_SESSION['user'];
        $friend=$_GET['f'];
        $query1="INSERT INTO `friends_$me` ( `id` ,`username` )VALUES ( NULL , '$friend');";
        $query2="INSERT INTO `friends_$friend` ( `id` ,`username` )VALUES ( NULL , '$me');";
        $result1=mysqli_query($dbc,$query1);
        $result2=mysqli_query($dbc,$query2);
        if($result1&&$result2){
            header("location:profile.php?username=$friend");
        }
    
    }
    else
    {
        header("location:../index.php");
    }


?>