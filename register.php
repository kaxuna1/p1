<link rel="stylesheet" href="mystile.css" type="text/css" />
<?php

if($_POST['name']==true&&$_POST['username']==true&&$_POST['email']==true&&$_POST['password']==true){
    
    
    $email=$_POST['email'];
    $username=$_POST['username'];
    include_once("config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    $query1="select id from users where username='$username' or email='$email'";
    $res1=mysqli_query($dbc,$query1);
    if(mysqli_num_rows($res1)!=0){
        echo "user with same username or email is already registered ";
        ?>
        
       <div id="mydiv"><br /><br /><br /> <form method="post">
name:<input type="text" name="name" value="<?echo $_POST['name'];?>"/><br /><br />
username:<input type="text" name="username" value="<?echo $_POST['username'];?>" /><br /><br />
email:<input type="text" name="email" value="<?echo $_POST['email'];?>" /><br /><br />
password:<input type="password" name="password" /><br /><br />
<input type="submit" name="submit" value="register" />
</form>
</div>
        
        <?php
    }
    else{
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query2="INSERT INTO  users (`id` ,`name` ,`username` ,`email` ,`password`)VALUES (NULL ,  '$name',  '$username',  '$email',  '$password')";
        $k=mysqli_query($dbc,$query2);



        if($k){
            header("location:index.php");
        } 
        else {echo "registration faill!!!";}
    }
    
    
    
}
else{
include_once('./siteElements/regForm.php');
registrationForm();
}
   header("location:index.php"); 
?>