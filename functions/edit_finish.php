<?
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    $username=$_SESSION['user'];
    $k=0;
    $newusername=$_POST['username'];
    $newpassword=$_POST['password'];
    $newemail=$_POST['email'];
    include_once("../config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    $query1="select * from users where username='$newusername'";
    $result1=mysqli_query($dbc,$query1);
    if(mysqli_num_rows($result1)>0){
        echo "chose diferent username!<br/>";
        $k++;
        
    }
    $query2="select * from users where email='$newemail'";
    $result2=mysqli_query($dbc,$query2);
    if(mysqli_num_rows($result2)>0){
        echo "chose diferent email!<br/>";
        $k++;
        
    }
    if($k>0){
         echo '<a href="../edit.php"><button>edit account</button></a>';
        
    }
    if($k==0){
        if($newemail!=''){
            $query3="UPDATE  `users` SET  `email` =  '$newemail' WHERE  `users`.`username` ='$username' LIMIT 1";
            $result3=mysqli_query($dbc,$query3);
            if($result3){
                
            }
            else{
                echo "<a1>Update fail!!!</a1>";
            }
        }
        if($newpassword!=''){
            $query3="UPDATE  `users` SET  `password` =  '$newpassword' WHERE  `users`.`username` ='$username' LIMIT 1";
            $result3=mysqli_query($dbc,$query3);
            if($result3){
                
            }
            else{
                echo "<a1>Update fail!!!</a1>";
            }
        }
        
        if(isset($_FILES["avatar"])){
            $tmpName=$_FILES["avatar"]['tmp_name'];
            $fp=fopen($tmpName);
            $data=fread($fp,filesize($fp));
            $data=addslashes($data);
            fclose($fp);
            $query7="UPDATE `users` SET `avatar` = '$data' WHERE  `users`.`username` ='$username' ";
            $resultimg=mysqli_query($dbc,$query7);
            
           
            
            
        }
        header("location:../index.php");
    }
}
else{
    header("location:../index.php");
}



?>