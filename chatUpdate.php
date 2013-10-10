<?
include_once("config.php");
include_once("./functions/getUserId.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
session_start();
$from=$_GET['from'];

$from=getUserId($from);
$to=getUserId($_SESSION['user']);

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

<div class="alert alert-info">

<?
$id=$row['UserID1'];
$query2="select * from users where id='$id'";
$result2=mysqli_query($dbc,$query2);
$result2=mysqli_fetch_array($result2);
$username1=$result2['username'];
echo "<a href='profile.php?username=$username1'>".$result2['name']."</a>: ";
echo $row['text'];
?>
</div>
<?
if($count>7){break;}
}

?>