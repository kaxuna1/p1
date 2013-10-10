<?
session_start();
function header1(){?>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <script type="text/javascript" src="./js/myJs.js"></script>
<div style="text-align: center;">
<div class="input-append">
<form class="well span15" action="search.php">
<input type="text" name="search" placeholder="search..." />
<button class="btn"><i class="icon-search"></i></button>
<a href="index.php"><button type="button" class="btn"><i class="icon-home"></i>Home</button></a>
<button type="button" id="galleryOpen" class="btn"><i class="icon-picture"></i>Gallery</button>
<a href="edit.php"><button type="button" class="btn"><i class="icon-wrench"></i>Settings</button></a>
<a href="friends.php"><button type="button" class="btn"><i class="icon-group"></i>Friends</button></a>
<a href="messages.php"><button type="button" class="btn"><i class="icon-comment icon-black"></i>Messages</button></a>
<button type="button" id="notOpen" class="btn"><i class="icon-check-sign"></i>nofifications</button>
<a href="./functions/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
</form></div></div>
<input type="hidden" id="myname" value="<? echo $_SESSION["user"];  ?>" />

<style type="text/css">
body {
  background-color: #2b86ec;
  height: 100%;
  font-family: 'Source Sans Pro', sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  @include box-sizing(border-box);
}
</style>
     <?
}
?>
<div class="modal-backdrop" id="galleryModal1" style=" opacity: 0.9 " hidden="true">
		<div style="text-align: center;
    position:absolute;
    top: 20%;
    left: 50%;
    width:54em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -27em; /*set to a negative number 1/2 of your width*/">
		<div class="well">
			<div class="modal-header">
				<h1>Gallery</h1>
				<button type="button" class="close"  id="closeGallery" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div id="galleryIn" class="modal-body">
				
				
			</div>
			<div class="modal-footer"></div>
			
		</div>
		</div>
	</div>