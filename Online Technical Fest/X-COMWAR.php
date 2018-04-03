<?php require_once('Connections/mysql.php'); ?>
<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X-COMWAR</title>

</head>
<body>
<div id="Holder">
<a href="Login.php"><div id="Header"></div></a>
<div id="Content">
<div id="PageHeading">
<div id="Text3">
<h1 align="center">
<?php
		echo"This Event will be Organise at College......!!";
		@session_destroy();
		@session_unset();
		header( "refresh:5;url=Login.php" );
?>
</h1>  
</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
