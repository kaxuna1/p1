<!DOCTYPE HTML>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<? session_start(); if(isset($_SESSION[ 'user'])&&!empty($_SESSION[ 'user']))
{ $username=$_GET[ 'username']; 
$myname=$_SESSION[ 'user']; 
include_once( "./functions/getUserId.php"); 
$chatFrom=getUserId($_GET[ 'username']); 
$chatMe=getUserId($_SESSION[ "user"]); 
include_once( "config.php"); 
$dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb); 
$query="select * from users where username='$username'" ; 
$result=mysqli_query($dbc,$query); 
$profile=mysqli_fetch_array($result); 
include_once( "./siteElements/h1.php"); 
header1(); ?>
<table onload="gal();" class="table">
    <thead>
        <tr>
            <th>profile</th>
            <th>
                <? echo $profile[ 'name'];?>'s Gallery</th>
        </tr>
    </thead>
    <tr>
        <td>
            <form class="well">
                <div style="text-align: center;">
                    <p>name:
                        <?echo $profile[ 'name'];?>
                    </p>
                    <p>email:
                        <?echo $profile[ 'email'];?>
                    </p>
                    <p><a href="gallery.php?user=<?echo $profile['username'];?>">
    	<button type="button" class="btn"><? echo $profile['name']."'s "?>gallery</button></a> 
                    </p>
                    <? if($_SESSION[ 'user']!=$username){ ?>
                    <button id="messages" class="btn" type="button">send message to
                        <? echo $username;?>
                    </button>
                    <br />
                    <br />
                    <? 
                    include_once("./functions/getUserId.php");
					$me=$_SESSION['user'];
					$so=$_GET['username'];
					$me=getUserId($me);
					$so=getUserId($so);
                    $queryF1="SELECT * FROM  `relation` WHERE  `user1` =$me AND  `user2` =$so" ;
					$queryF2="SELECT * FROM  `relation` WHERE  `user1` =$so AND  `user2` =$me" ;
                    $resultF1=mysqli_query($dbc,$queryF1); 
					$resultF2=mysqli_query($dbc,$queryF2);
                    $countF1=(int)mysqli_num_rows($resultF1);
					$countF2=(int)mysqli_num_rows($resultF2); 
                    if($countF1==0&&$countF2==0)
                    { 
                    	?> <a href="addfriend.php?m=<?echo $me;?>&&f=<?echo $so;?>">
                    		<button class="btn btn-primary" type="button">add as friend</button></a>

                    <? } 
                   
                    
                    else{
                    	if($countF1==0){
                    		$resultF=mysqli_fetch_array($resultF2);
                    	} else{
                    		$resultF=mysqli_fetch_array($resultF2);
                    	}
                    	if($resultF['confirmed']==1){
                    		?> <a href="deletefriend.php?m=<?echo $me;?>&&f=<?echo $so;?>">
                    	<button class="btn btn-danger" type="button"><i class="glyphicons-icon user_add">
            	
            </i>delete friend</button></a>

                    <?
                    		
                    	}else{
                    			?> <a href="#">
                    	<button class="btn" type="button">waiting confirmation</button></a>

                    <?
                    		
                    	}
                    	
                    	
                    	 } }?>
                </div>
            </form>
            <? } ?>
            <div class="modal-backdrop" style=" opacity: 1;" id="regModall" hidden="true">
                <div style="
    position:absolute;
    top: 20%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/">
                    <div class="well">
                        	<h2>chat with <? echo $username; ?></h2>

                        <div id="messageBody">kaxa</div>
                        <div>
                            <input type="text" class="span3" id="message" name="message" />
                            <button class="btn btn-primary" onclick="send();">send</button>
                            <button class="btn btn-danger" id="close" type="button">close</button>
                            <input type="hidden" name="sendto" id="sendto" value="<?echo $chatFrom;?>">
                            <input type="hidden" name="from" id="from" value="<? echo $chatMe;?>" />
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div id="galdiv">
                <? include_once( "prGal.php"); gal1($_GET[ 'username'],$dbc); ?>
            </div>
        </td>
    </tr>
</table>