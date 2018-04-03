<?php @session_start(); ?>
<?php require_once('Connections/mysql.php'); ?>
<?php
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

$colname_User = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_User = $_SESSION['MM_Username'];
}
mysql_select_db($database_mysql, $mysql);
$query_User = sprintf("SELECT * FROM register WHERE Username = %s", GetSQLValueString($colname_User, "text"));
$User = mysql_query($query_User, $mysql) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);

$WhereSQL = sprintf("SELECT * FROM event WHERE Event_Key ="+$_POST['EventID'],GetSQLValueString($_POST['EventhiddenField'], "int"));
switch ($WhereSQL) 
{
  	case "391993":  header('Location: SPIDERWICK.php'); 
    break;
	case "651993":  header('Location: ARTI-CODE.php');
    break;
  	case "951994":  header('Location: BUG 2 DEBUG.php');    
    break;
	case "2221994": header('Location: X-COMWAR.php');
    break;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
	<nav>
		<ul>
            <li><a href="LogOut.php">Logout</a></li>
		</ul>
	</nav>
</div>
<div id="Content">
<div id="PageHeading">
  <h1 id="Text3">Welcome, <?php echo $row_User['Fname']; ?> <?php echo $row_User['Lname']; ?> !</h1>
</div>
<div id="ContentLeft">
</div>
<div id="ContentRight">
  <div align="center">
    <form id="Event" name="Event"  action="" method="POST">
      <h1 id="Text2">Enter Event Key:    <span id="sprytextfield1">
        <label for="EventKey"></label>
      <select name="EventID" class="StyleTextField">
      <option value="">SELECT</option>
        <option value="391993">SPIDERWICK</option>
        <option value="651993">ARTI-CODE</option>
        <option value="951994">BUG 2 DEBUG</option>
        <option value="2221994">X-COMWAR</option>
      </select>
      <span class="textfieldRequiredMsg">Enter Valid Key</span></span>
      <input name="EventhiddenField" type="hidden" id="EventhiddenField"/>
      </br></br>
        <input name="EventBtn" type="submit" class="StyleButton" id="EventBtn" value="Enter" />
  </h1>
    </form>
  </div>
</div>
</div>
<div id="Footer"></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>
<?php
mysql_free_result($User);
?>
