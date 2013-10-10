<?
session_start();
include_once("config.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    if(isset($_SESSION['user'])&&!empty($_SESSION['user'])&&isset($_GET['f']))
    {
        $me=$_GET['m'];
        $so=$_GET['f'];
        $query1="INSERT INTO  `relation` (  `id` ,  `user1` ,  `user2` ,  `confirmed` ) 
VALUES (
NULL ,  '$me',  '$so',  ''
);";
        $result1=mysqli_query($dbc,$query1);
        if($result1){
            header("location:javascript://history.go(-1)");
        }
    
    }
    else
    {
        header("location:index.php");
    }


?>