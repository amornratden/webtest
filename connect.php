<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
	<?php
	date_default_timezone_set("Asia/Bangkok");
	
	$mysqli = new mysqli("localhost","root","mtwtfss2012","ccvcacth_ccvc");
	mysqli_set_charset($mysqli,"utf8");
	if($mysqli -> connect_errno){
		
		echo "Failes to connect:" .$mysqli -> connect_error;
		exit();
	}
	
	
	?>
	
</body>
</html>