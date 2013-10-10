<?

function getUserId($username){
$sqlhost="osmtgge.ipagemysql.com";
$sqluser="kaxuna1";
$sqlpassword="dwrstn11";
$sqldb="k_web1";
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
	$query="select id from users where username='$username'";
	$result=mysqli_query($dbc,$query);
$result=mysqli_fetch_array($result);
return $result['id'];
 
}
?>