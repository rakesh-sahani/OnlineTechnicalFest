<?php require_once('Connections/mysql.php'); ?>
<?php
@session_start();
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

$colname_AdminHome = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_AdminHome = $_SESSION['MM_Username'];
}
mysql_select_db($database_mysql, $mysql);
$query_AdminHome = sprintf("SELECT * FROM `admin` WHERE Username = %s", GetSQLValueString($colname_AdminHome, "text"));
$AdminHome = mysql_query($query_AdminHome, $mysql) or die(mysql_error());
$row_AdminHome = mysql_fetch_assoc($AdminHome);
$totalRows_AdminHome = mysql_num_rows($AdminHome);

if(isset($_POST["submit"]))
{
	$View = $_POST['View'];
	if($View == 'ARTI')
	{
		 header('Location: ViewArti.php');   
	}elseif($View == 'SPIDER')
	{
		 header('Location: ViewSpider.php');   
	}elseif($View == 'DEBUG')
	{
		 header('Location: ViewDebug.php');   
	}
	elseif($View == 'X-COMWAR')
	{
		 header('Location: ViewXComwar.php');   
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Users</title>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
	<nav>
		<ul>
        <li><a href="AdminManageHome.php">Home</a></li>
        <li><a href="ViewUsers.php">View Users</a></li> 			
        <li><a href="AdminManage.php">Manage Account</a></li>
        <li><a href="EventResult.php">Result</a></li>
        <li><a href="LogOut.php">Logout</a></li>
        </ul>
	</nav>
</div>
<div id="Content">
<div id="PageHeading">
  <h1 id="Text2">Hi, <strong><?php echo $row_AdminHome['Username']; ?></strong></h1>
</div>
<div id="ContentLeft">
</div>
<div id="ContentRight">
  <form id="View" name="View" method="post" action="" >
  <table width="500" align="center" id="Text4">
      <tr>
      <td><input type="radio" name="View" id="View" value="ARTI" />
        <label for="ARTI"> ARTI-CODE</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="radio" name="View" id="View" value="SPIDER" />
        <label for="SPIDER">  SPIDERWICK</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="radio" name="View" id="View" value="DEBUG" />
        <label for="DEBUG"> BUG 2 DEBUG</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="radio" name="View" id="View" value="X-COMWAR" />
        <label for="X-COMWAR">X-COMWAR</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="hidden" name="ViewResult" id="ViewResult" /></td>
    </tr>
    <tr>
      <td><center><input name="submit" type="submit" class="StyleButton" id="View Users" value="View Users" /></center></td>
    </tr>
  </table>
    </form>
</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($AdminHome);
?>
