
<!DOCTYPE HTML>

<?
session_start();
include_once("./siteElements/h1.php");
    header1();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    //edit form start
    include_once('./siteElements/editForm.php');
    editForm();
    //edit form end
    
    //friendlist start

    //friendlist end
    
}
else{
    header("location:index.php");
}
?>
