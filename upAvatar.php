<?
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    $username=$_SESSION['user'];
	
    include_once("config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    if(isset($_FILES['imgfile'])&&$_FILES['imgfile']!=""){
        //droebit file-s saxels vimaxsovrebt
        $tmpName=$_FILES['imgfile']['tmp_name'];
        //vkitxulobt file-s
        $fp=fopen($tmpName,"r");
        $data=fread($fp,filesize($tmpName));
        $data=addslashes($data);
        fclose($fp);
        $query="UPDATE  users SET  pic =  '$data' WHERE  `users`.`username` ='$username' LIMIT 1'";
        $result=mysqli_query($dbc,$query);
        if($result){
            header("location:index.php");
        }
        else{
            echo "error<br/>";
            echo $username."<br/";
            echo $data;
        }
        
    }
    
    
}
?>