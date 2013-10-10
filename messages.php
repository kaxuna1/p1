<!DOCTYPE HTML>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
var upd=setInterval("update();",2200);

$(document).on("click","#click",function(){
	$("#fs").slideToggle("slow");
	
});

 function send(){
 	var message=document.getElementById("message").value;
 	var sendto=document.getElementById("sendto").value;
 	var from=document.getElementById("from").value;
 	$.ajax({
 		type: "POST",
 		url: "sendmessage.php",
 		data:{'message' : message,'sendto' : sendto , 'from' : from},
 		cache: true,
 		dataType:'text',
 		success: function(data)
        {
          document.getElementById("msgs").innerHTML=data;
          document.getElementById("message").value="";
          document.getElementById("message").focus();
        }
 		
 		
 	});
 };	
 function update(){
 	var sendto=document.getElementById("sendto").value;
 	var from=document.getElementById("from").value;
 	$.ajax({
 		type: "POST",
 		url: "sendmessage.php",
 		data:{'sendto' : sendto , 'from' : from},
 		cache: true,
 		dataType:'text',
 		success: function(data)
        {
          document.getElementById("msgs").innerHTML=data;
        }
 		
 		
 	});
 };	
</script>
<?
include_once("config.php");
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
session_start();
include_once('./siteElements/h1.php');
header1();
include_once("config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
if(!empty($_GET['from'])){
?>
<div style="position:absolute;
    top: 30%;
    left: 31.5%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/" 
    id="chat">
    <div id="msgs">
<?
$from=$_GET['from'];
$query="select * from users where username='$from'";
$result=mysqli_query($dbc,$query);
$result=mysqli_fetch_array($result);
$from=$result['id'];
$to=$_SESSION['user'];
$query="select * from users where username='$to'";
$result=mysqli_query($dbc,$query);
$result=mysqli_fetch_array($result);
$to=$result['id'];
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
</div>
<div id="inp">
	<form onsubmit="javascript:send();return false;" >
<input type="text" class="span5" id="message" name="message"/>
<input type="hidden" name="sendto" id="sendto" value="<?echo $from;?>">
<input type="hidden" name="from" id="from" value="<? echo $to;?>" />
</form>
</div>
<button type="button" onclick="send(); xx();" class="btn btn-primary">send</button>
<a href="#" class="btn" id="click">hide/show chat</a>
<div id="fs" class="well" hidden="true">
	<ol>
	<?
	$user=$_SESSION['user'];
	$query="SELECT * FROM  `friends_$user`";
	$result=mysqli_query($dbc,$query);
	while ($row=mysqli_fetch_array($result)) {
		$username=$row['username'];
		$query="select * from users where username='$username'";
		$result1=mysqli_query($dbc,$query);
		$result1=mysqli_fetch_array($result1);
		$name=$result1["name"];
		?>
		
		<li><a href="messages.php?from=<? echo $username;?>"><? echo $name;?></a></li>
		<?
	}
	
	
	?>
	</ol>
</div>
</div>
<?
}
else
{
	?>
	<div style="position:absolute;
    top: 30%;
    left: 31.5%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/" 
    id="chat">
    <div class="well">
	<ol>
	<?
	$user=$_SESSION['user'];
	$query="SELECT * FROM  `friends_$user`";
	$result=mysqli_query($dbc,$query);
	while ($row=mysqli_fetch_array($result)) {
		$username=$row['username'];
		$query="select * from users where username='$username'";
		$result1=mysqli_query($dbc,$query);
		$result1=mysqli_fetch_array($result1);
		$name=$result1["name"];
		?>
		
		<li><a href="messages.php?from=<? echo $username;?>"><? echo $name;?></a></li>
		<?
	}
	
	
	?>
	</ol>
	</div>
</div>
	
	<?
    
}


?>