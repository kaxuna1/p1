<!DOCTYPE HTML>
<link rel="stylesheet" href="mystile.css" type="text/css" />
<?
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    include_once("./siteElements/h1.php");
    header1();
    include_once("config.php");
    $me=$_SESSION['user'];
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    $queryFF="select * from friends_$me";
    $resultFF=mysqli_query($dbc,$queryFF);
    ?>
    <div id="mydivFriends">
    <form class="well">
    <br />
    
    
    <?
    $count=0;
    while($row=mysqli_fetch_row($resultFF))
    {
        $friendsname=$row['1'];
        $count++;
        $queryName="select * from users where username='$friendsname'";
        $resultName=mysqli_query($dbc,$queryName);
        $resultName=mysqli_fetch_array($resultName);
        ?>
        <a href="profile.php?username=<? echo $row['1'];?>"><button type="button" class="btn btn-primary" > <? echo $resultName['name'];?> </button></a>
        <?
        if($count==4)
            {
            echo "<br/><br/>";
            $count=0;
            }
        
    }
  ?></form>
  </div>
  <?
    }
    ?>