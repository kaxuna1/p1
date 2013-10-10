<!DOCTYPE HTML>
<link rel="stylesheet" href="mystile.css" type="text/css" />

<?
session_start();
include_once("config.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    //site header start
    include_once("./siteElements/h1.php");
    header1();
	?>
	<div class="well" 
		<?
    //site header end
    //asatvirti forma tu galarea momxmareblisaa
    $username=$_GET['user'];
    // if($_SESSION["user"]==$username){
      //  include_once('./siteElements/imgUpForm.php');
      //  imgUpForm();
  //  }
    //asatvirti formis dasasruli
    
    
    // galery start
    if(empty($_GET['image'])){
    include_once('./siteElements/galleryShowAll.php');
    galleryShowAll($username,$dbc);
    }
    else
    {
        //aq konkretuli surati ixsneba
        $imgId=$_GET['image'];
        include_once('./siteElements/galleryShowImg.php');
        galleryShowImg($username,$imgId,$dbc);
        //konkretuli suratis gaxsnis dasasruli
    }
    ?></div><?//gallery end
}


?>
