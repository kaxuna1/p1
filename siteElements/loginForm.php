<?
function echologin(){?>
<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="mystile.css" />
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).on("click","#regC",function(){
	$("#regModall").slideToggle();
});
	$(document).on("click","#reg",function(){
	$("#regModall").slideToggle();
});
	
</script>


<div style="margin:0 auto; width:55%; text-align: center;">
<h1>Welcome!</h1>
<form   method="post" action="checklogin.php">
<input type="text" name="username" placeholder="username" />
<input type="password" name="password" placeholder="password" /><br />
<button class="btn btn-primary">login</button>
<button type="button" class="btn" id="reg">register</button>
</form>

</div>';

<div class="modal-backdrop" id="regModall" hidden="true">
		<div style="text-align: center;
    position:absolute;
    top: 50%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/">
		<div class="well">
			<h2>Register</h2>
			<form class="well" id="register" method="post" action="register.php">
				<input id="username" name="username" type="text" placeholder="username" required="true"  />
				<input id="name" type="text" required="true" placeholder="name" name="name" />
				<input id="password" name="password" type="password" placeholder="password" type="password" required="true" />	
				<input id="email" type="email" placeholder="email" name="email" required="true" />		
				<br />
				<button type="submit" name="submit" class="btn-success">register</button>
				<button type="button" id="regC" class="btn-danger">close</button>
			</form>
		</div>
		</div>
	</div>
	<?
}
function loginmobile(){
	?>
	<!-- Home -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
<div data-role="page" id="page1">
    <div data-theme="b" data-role="header" data-position="fixed">
        <h2>
            Welcome
        </h2>
    </div>
    <div data-role="content">
        <form action="checklogin.php" method="POST" data-ajax="false">
            <div data-role="fieldcontain">
                <input name="username" id="username" placeholder="username" value="" type="text">
            </div>
            <div data-role="fieldcontain">
                <input name="password" id="password" placeholder="password" value="" type="password">
            </div>
            <input type="submit" data-inline="true" data-theme="b" value="Login">
        </form>
        <a id="reg" data-role="button" data-transition="turn" data-theme="c" href="regMobile.php"
        data-icon="arrow-r" data-iconpos="left" class="reg">
            Register
        </a>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            Please Login or Register
        </h3>
    </div>
</div>
	<?
}

?>