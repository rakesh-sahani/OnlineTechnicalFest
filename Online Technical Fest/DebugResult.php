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

$currentPage = $_SERVER["PHP_SELF"];

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
$query_User = sprintf("SELECT * FROM `admin` WHERE Username = %s", GetSQLValueString($colname_User, "text"));
$User = mysql_query($query_User, $mysql) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);

$maxRows_ManageUsers = 100;
$pageNum_ManageUsers = 0;
if (isset($_GET['pageNum_ManageUsers'])) {
  $pageNum_ManageUsers = $_GET['pageNum_ManageUsers'];
}
$startRow_ManageUsers = $pageNum_ManageUsers * $maxRows_ManageUsers;

mysql_select_db($database_mysql, $mysql);
$query_ManageUsers = "SELECT * FROM `result` WHERE `result`.Event_Name = '      BUG 2 DEBUG'";
$query_limit_ManageUsers = sprintf("%s LIMIT %d, %d", $query_ManageUsers, $startRow_ManageUsers, $maxRows_ManageUsers);
$ManageUsers = mysql_query($query_limit_ManageUsers, $mysql) or die(mysql_error());
$row_ManageUsers = mysql_fetch_assoc($ManageUsers);

if (isset($_GET['totalRows_ManageUsers'])) {
  $totalRows_ManageUsers = $_GET['totalRows_ManageUsers'];
} else {
  $all_ManageUsers = mysql_query($query_ManageUsers);
  $totalRows_ManageUsers = mysql_num_rows($all_ManageUsers);
}
$totalPages_ManageUsers = ceil($totalRows_ManageUsers/$maxRows_ManageUsers)-1;

$queryString_ManageUsers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ManageUsers") == false && 
        stristr($param, "totalRows_ManageUsers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ManageUsers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ManageUsers = sprintf("&totalRows_ManageUsers=%d%s", $totalRows_ManageUsers, $queryString_ManageUsers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DebugResult</title>
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
  <h1 id="Text2">Hi,<strong><?php echo $row_User['Username']; ?></strong> !</h1>
</div>
<div id="ContentLeft">
 
</div>
<div id="ContentRight">
 <form id="Form" name="Form" method="post" action="">
       <table width="670" border="0" align="center">
    <tr>
      <td height="31" align="right" valign="top"><pre><strong>Showing: <?php echo ($startRow_ManageUsers + 1) ?>   To :  <?php echo min($startRow_ManageUsers + $maxRows_ManageUsers, $totalRows_ManageUsers) ?>  Of :<?php echo $totalRows_ManageUsers ?></strong>
      </pre></td>
    </tr>
    <tr>
      <td  valign="top">
      <table width="500" bgcolor="#CCCCCC" align="center">
        <tr>
          <td width="243"><strong>Full Name</strong></td>
          <td width="241"><strong>Score</strong></td>
        </tr>
        </table>
        </br>
        <?php do { ?>
          <table width="500" bgcolor="#CCCCCC" align="center">
            <tr>
              <td width="243"><strong><?php echo $row_ManageUsers['FullName']; ?></strong></td>
              <td width="241"><strong><?php echo $row_ManageUsers['Score']; ?></strong></td>
              </tr>
          </table>
          <?php } while ($row_ManageUsers = mysql_fetch_assoc($ManageUsers)); ?>
        </center></td>
    </tr>
    <tr>
    
     </tr>
    </table>
    <center></br></br>
    <input name="Print" type="button" class="StyleButton" onClick="window.print()" value="Print" /></center>
    </form>
</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($User);
mysql_free_result($ManageUsers);
?>
