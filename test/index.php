<!DOCTIPE HTML>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">

	function kk(){
		alert('return sent');
            $.ajax({
                type: "POST",
                url: "g.php",
                data: {'some','some'};
                dataType:'text'; //or HTML, JSON, etc.
                success: function(response){
                    alert(response);
                    //echo what the server sent back...
                }
            });
	};
</script>
</head>
<body onload="kk();">
	
	<button id="btn1" onclick="kk();">click</button>
</body>