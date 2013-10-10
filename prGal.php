<?
function gal1($username,$dbc){
    	
    	include_once('config.php');
include_once("./functions/getUserId.php");
$userid=getUserId($username);
//$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
$query="SELECT * FROM  photos where userId=$userid ORDER BY  `id` DESC";
$result=mysqli_query($dbc,$query);
$count=0;
 while($row=mysqli_fetch_array($result)){
    $content=$row['pic'];
    $count++;
    ?>
    
    
    <img height="50%" width="30%"  src="data:image/jpeg;base64,<?echo base64_encode($content);?>" class="img-polaroid" />
    <?
    if ($count==3){
        echo "<br/>";
        $count=0;
    }
}
    


		
    }


?>