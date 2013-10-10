<?
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
	include_once("./functions/getUserId.php");
    $username=$_SESSION['user'];
	$userId=getUserId($username);
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
        $query="INSERT INTO `photos` (`id`, `userId`, `pic`) VALUES (NULL,'$userId','$data')";
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