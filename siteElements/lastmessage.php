<?
function lastMsg($me,$dbc){
    $query="select * from messages_$me order by id desc";
    $result=mysqli_query($dbc,$query);
    $result=mysqli_fetch_array($result);
    echo $result['message'];
}


?>