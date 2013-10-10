<?
session_start();
include_once("config.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&isset($_GET['f']))
    {
        $me=$_SESSION['user'];
        $friend=$_GET['f'];
        $query1="DELETE FROM `friends_$friend` WHERE username='$me';";
        $query2="DELETE FROM `friends_$me` WHERE username='$friend';";
        $result1=mysqli_query($dbc,$query1);
        $result2=mysqli_query($dbc,$query2);
        if($result1&&$result2){
            header("location:profile.php?username=$friend");
        }
        else echo "error";
    
    }
    else
    {
        header("location:index.php");
    }


?>