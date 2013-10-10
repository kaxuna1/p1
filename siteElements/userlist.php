<?
$dbc=mysqli_connect("mysql14.000webhost.com","a5100064_kaxa","dwrstn11","a5100064_kaxa1");
$query="SELECT  `name` 
FROM  `users` 
ORDER BY  `name` ASC";
$result=mysqli_query($dbc,$query);
while($row=mysqli_fetch_array($result)){
    echo $row['name']."\n";
}


?>