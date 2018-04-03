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

if ((isset($_POST['DeletehiddenField'])) && ($_POST['DeletehiddenField'] != "")) {
  $deleteSQL = sprintf("DELETE FROM register WHERE UserID=%s",
                       GetSQLValueString($_POST['DeletehiddenField'], "int"));

  mysql_select_db($database_mysql, $mysql);
  $Result1 = mysql_query($deleteSQL, $mysql) or die(mysql_error());

  $deleteGoTo = "AccountDelete.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

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

$maxRows_ManageUsers = 10;
$pageNum_ManageUsers = 0;
if (isset($_GET['pageNum_ManageUsers'])) {
  $pageNum_ManageUsers = $_GET['pageNum_ManageUsers'];
}
$startRow_ManageUsers = $pageNum_ManageUsers * $maxRows_ManageUsers;

mysql_select_db($database_mysql, $mysql);
$query_ManageUsers = "SELECT * FROM register ORDER BY `Timestamp` DESC";
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
<title>Manage Account</title>
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
  <h1 id="Text2">Hi , <strong><?php echo $row_User['Username']; ?></strong> !</h1>
</div>
<div id="ContentLeft">
</div>
<div id="ContentRight">
 <form id="DeleteForm" name="DeleteForm" method="post" action="">
       <table width="670" align="center">
    <tr>
      <td height="31" align="right" valign="top"><pre>Showing:<strong><?php echo ($startRow_ManageUsers + 1) ?></strong> To:<strong><?php echo min($startRow_ManageUsers + $maxRows_ManageUsers, $totalRows_ManageUsers) ?></strong> Of:<strong><?php echo $totalRows_ManageUsers ?></strong>
      </pre></td>
    </tr>
    <tr>
      <td align="center" valign="top"><?php if ($totalRows_ManageUsers > 0) { // Show if recordset not empty ?>
        <?php do { ?>
            <table width="583" border="1" align="left" bgcolor="#CCCCCC">             
              <tr align="center">
                <h3>
                  <td><strong>First Name </strong></td>
                  <td><strong>Last Name </strong></td>
                  <td><strong>Email</strong></td>
                  <td><strong>Delete</strong></td>
                  </h3>
                </tr>
              <tr align="center">
                <h3>
                  <td><strong><?php echo $row_ManageUsers['Fname']; ?></strong></td>
                  <td><strong><?php echo $row_ManageUsers['Lname']; ?></strong></td>
                  <td><strong><?php echo $row_ManageUsers['Email']; ?></strong></td>
                  </h3>
                <td rowspan="2" align="center"><input name="DeletehiddenField" type="hidden" id="DeletehiddenField" value="<?php echo $row_ManageUsers['UserID']; ?>" />
                  <input name="DeleteUsers" type="submit" class="StyleButton1" id="DeleteUsers" value="Delete User" /></td>
                </tr>
             </table>
            <?php } while ($row_ManageUsers = mysql_fetch_assoc($ManageUsers)); ?>
        <?php } // Show if recordset not empty ?></td>
        </tr>
        <tr>
          <td align="center" valign="top"><h2> <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, min($totalPages_ManageUsers, $pageNum_ManageUsers + 1), $queryString_ManageUsers); ?>">Next</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php printf("%s?pageNum_ManageUsers=%d%s", $currentPage, $totalPages_ManageUsers, $queryString_ManageUsers); ?>">Previous</a></h2></td>
        </tr>
      </table></td>
    </tr>
    <tr>
     
    
    </table></form>
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
