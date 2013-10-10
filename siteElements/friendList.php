<?
session_start();
function friendlist($dbc){
    $user=$_SESSION['user'];
    
    $queryFF="select * from friends_$user";
    $resultFF=mysqli_query($dbc,$queryFF);
    echo ' <div id="mydivMainFriends">
    <br />';
    while($rowff=mysqli_fetch_row($resultFF))
    {
        $friendsname=$rowff['1'];
        $queryName="select * from users where username='$friendsname'";
        $resultName=mysqli_query($dbc,$queryName);
        $resultName=mysqli_fetch_array($resultName);
        $count++;
        ?>
        <a href="profile.php?username=<? echo $rowff['1'];?>"><button id="friendButtonMain"> <? echo $resultName['name'];?> </button></a><br /><br />
        <?
        
        
    }
    echo " </div>";
    }
?>
