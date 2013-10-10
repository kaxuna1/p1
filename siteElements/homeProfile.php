<?

function homeProfile($user,$dbc)
{
    $query="select * from users where username='$user'";
    $result1=mysqli_query($dbc,$query);
    $result2=mysqli_fetch_array($result1);
    ?>
    <div class="well" id="profile" style="text-align: center;">
    your email: <? echo $result2['email'];?><br />
    your name: <? echo $result2['name'];?><br />
    your password: <? echo $result2['password'];?><br /><br />
    <a href="profile.php?username=<?echo $result2['username'];?>"><button type="button" class="btn">your profile</button></a> 
    <a href="gallery.php?user=<?echo $result2['username'];?>"><button type="button" class="btn">your gallery</button></a>
    <a href="friends.php"><button type="button" class="btn">  friends  </button></a>
    <a href="messages.php"><button type="button" class="btn">messages</button></a><br /><br />
    upload image to gallery<br />
    <?
   
    include_once('imgUpForm.php');
	include_once("avatarUpForm.php");
    imgUpForm();
    
    ?>
    change profile picture
    <? avatarUpForm(); ?>
    
    
    </div><?}?>