<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Site top Sem nome</title>
	<script src="jquery-3.2.1.js" type="text/javascript"></script>
	<script>
	///*
		$(document).ready(function(){
			var aberto = true;
			$("#menu").click(function(){
				if(aberto){
					$("body").css({"grid-template-columns": "0 auto"});
					aberto =false;
				} else{
					$("body").css({"grid-template-columns": "210px auto"});
					aberto=true;
				}
				
			})
		});
	//*/
	/*
	$(document).ready(function(){
		var aberto = false;
			$("#menu").click(function(){
				$('#contentSide').animate({width: 'toggle'});		
			})
	});
	*/
	</script>
	<link rel="stylesheet" type="text/css" href="siteTesteCSS.css">
</head>
<body>	

	<?php
	include("inc/header.inc.php");
	include("inc/navBar.inc.php");
	?>
	
	<div id="container">
		<?php
		include("inc/profilePosts.inc.php");
		include("inc/profile.inc.php");
		?>
	</div>

	<div id="bot">
		
	</div>
</body>
</html>

<!--
		
		

		