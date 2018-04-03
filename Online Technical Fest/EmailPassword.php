<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot</title>

</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="Content">
<div id="PageHeading">
<h1 align="center">
<?php 
@session_start();
$_SESSION['EMPW'] = $_POST['Email'];
require_once('Connections/mysql.php'); 
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_EmailPasswordRecovery = "-1";
if (isset($_SESSION['EMPW'])) {
  $colname_EmailPasswordRecovery = $_SESSION['EMPW'];
}
mysql_select_db($database_mysql, $mysql);
$query_EmailPasswordRecovery = sprintf("SELECT * FROM register WHERE Email = %s", GetSQLValueString($colname_EmailPasswordRecovery, "text"));
$EmailPasswordRecovery = mysql_query($query_EmailPasswordRecovery, $mysql) or die(mysql_error());
$row_EmailPasswordRecovery = mysql_fetch_assoc($EmailPasswordRecovery);
$totalRows_EmailPasswordRecovery = mysql_num_rows($EmailPasswordRecovery);

mysql_free_result($EmailPasswordRecovery);
?>

<h1 id="Text2">
<?php
if($totalRows_EmailPasswordRecovery>0)
{
	$from = "noreply@iintm2015.tk";
$email =$_POST['Email'];
$subject = "Your Email Password";
$message = "Here is Your Password :".$row_EmailPasswordRecovery['Password'];
mail($email,$subject,$message,"From:".$from);
}
if($totalRows_EmailPasswordRecovery>0)
{
	echo"Please Check Your Email ID,Password SuccessFully Sent ......!!!";
}
else
{
echo"Failed - Please Check Your Email ID......!!!";
}

@session_destroy();
@session_unset();
?>
</h1>  
</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
