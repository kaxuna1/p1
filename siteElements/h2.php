<?
session_start();
function header2(){
	?>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	<!-- Home -->
<div data-role="page" id="page1">
    <div id="h1" data-theme="b" data-role="header" data-position="fixed" class="h1">
        <a data-role="button" href="#" data-icon="bars" data-iconpos="left" class="ui-btn-left">
            <?echo $_SESSION['user'];?>
        </a>
        <a data-role="button" data-theme="b" href="./functions/logout.php" data-icon="minus"
        data-iconpos="right" class="ui-btn-right">
            Logout
        </a>
        <h3>
            Main Page
        </h3>
    </div>
    <div data-role="content">
    </div>
</div><?
}
?>