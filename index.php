<!DOCTYPE HTML>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<? 
session_start();
include './siteElements/mobCheck/Mobile_Detect.php';
$detect = new Mobile_Detect();

if($_SESSION['user']==''){
    //login form start
include_once("./siteElements/loginForm.php");
if($detect->isMobile()==FALSE){
echo echologin();}
else{
	loginmobile();
}
    //login form end
}


else{
    $user=$_SESSION['user'];
    include_once("config.php");
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
 
    //site header start
    if($detect->isMobile()==FALSE){
    include_once("./siteElements/h1.php");
    header1();
	}
	else{
		    include_once("./siteElements/h2.php");
			header2();
	}
    //site header end
    
    //friend list start
    $dbc=mysqli_connect($sqlhost,$sqluser,$sqlpassword,$sqldb);
    //include_once('./siteElements/friendList.php');
    //friendlist($dbc);
    //friend list end
    //homeProfileStart
if($detect->isMobile()==FALSE){
    include_once('./siteElements/homeProfile.php');
    homeProfile($user,$dbc);}
else{
	
}
    //homeProfileEnd
    
  
}

?>
</body>
