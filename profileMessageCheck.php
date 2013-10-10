<?
session_start();
include_once("config.php");
include_once("./functions/getUserId.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
$to=$_POST['me'];
$from=$_POST['friend'];

$query="SELECT * 
FROM messages
WHERE (
UserID1 =$from
AND UserID2 =$to
)
OR (
UserID1 =$to
AND UserID2 =$from
)
ORDER BY  `id` DESC";
$result=mysqli_query($dbc,$query);
$count=0;
while($row=mysqli_fetch_array($result)){
    $count++;
?>
<div class="alert <? if($row['UserID1']==$to){echo "alert-info";} else{echo "alert-success";}?>">
	<?echo $row['text'];?>
</div>
<?
if($count>7){break;}

}



?>