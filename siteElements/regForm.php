<?
function registrationForm(){
    ?>
<div id="mydiv"><br /><br /><br />
<form method="post">
name:      <input type="text" name="name" value="<?echo $_POST['name'];?>"/><br /><br />
username:<input type="text" name="username" value="<?echo $_POST['username'];?>" /><br /><br />
email:<input type="text" name="email" value="<?echo $_POST['email'];?>" /><br /><br />
password:<input type="password" name="password" /><br /><br />
<input type="submit" name="submit" value="register" /><br />
</form>
</div>
<?php
}


?>