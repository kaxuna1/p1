<!DOCTYPE HTML>
<link rel="stylesheet" href="mystile.css" type="text/css" />
<?
include_once("config.php");
session_start();
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
    include_once("./siteElements/h1.php");
    header1();
    if(isset($_GET['search'])&&!empty($_GET["search"])){
    include_once("config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    $search=$_GET["search"];
    ?>

    <table class="table table-hover">
   <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>username</th>
            </tr>
    </thead>
    
    <?
    
    $query="select * from users where name like '%$search%'";
    $result=mysqli_query($dbc,$query);
    while($row=mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><? echo $row['id']; ?></td>
                <td><a href="profile.php?username=<? echo $row['username']; ?>"><? echo $row['name']; ?></a></td>
                <td><? echo $row['email']; ?></td>
                <td><? echo $row['username']; ?></td>
            </tr>
        
        
        <?
        
    }
    ?></table><?
    }
    else{
        ?>
       <div class="wrapper">nothing to search!!!<br />
        <a href="index.php"><button>go beck</button></a></div>
      
        
        <?
    }
}


 ?> 