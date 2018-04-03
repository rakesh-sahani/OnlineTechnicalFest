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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="Register.php";
  $loginUsername = $_POST['UserName'];
  $LoginRS__query = sprintf("SELECT Username FROM register WHERE Username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_mysql, $mysql);
  $LoginRS=mysql_query($LoginRS__query, $mysql) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "RegisterFrom")) {
  $insertSQL = sprintf("INSERT INTO register (Fname, Lname, College, Course, Sem, Sid, Event, Mob, Email, Username, Password) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Fname'], "text"),
                       GetSQLValueString($_POST['Lname'], "text"),
                       GetSQLValueString($_POST['College'], "text"),
                       GetSQLValueString($_POST['Course'], "text"),
                       GetSQLValueString($_POST['Sem'], "text"),
                       GetSQLValueString($_POST['Eid'], "int"),
                       GetSQLValueString($_POST['Event'], "text"),
                       GetSQLValueString($_POST['Mobile'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['Password'], "text"));

  mysql_select_db($database_mysql, $mysql);
  $Result1 = mysql_query($insertSQL, $mysql) or die(mysql_error());

  $insertGoTo = "RegisterSuccess.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_mysql, $mysql);
$query_Register = "SELECT * FROM register";
$Register = mysql_query($query_Register, $mysql) or die(mysql_error());
$row_Register = mysql_fetch_assoc($Register);
$totalRows_Register = mysql_num_rows($Register);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
	<nav>
		<ul>
			<li><a href="Register.php">Register</a></li>
			<li><a href="Login.php">Login</a></li>
             <li><a href="AdminLogin.php">Admin Login</a></li>             
             
		</ul>
	</nav>
</div>
<div id="Content">
<div id="PageHeading">
  <h1 id="Text2">Sign Up!!</h1>
</div>
<div id="ContentLeft">
  <h2 id="Text2">IINTM <br /><br /> Organising Online Technical Fest 2K15 ..</h2>
  
</div>
<div id="ContentRight">
  <form action="<?php echo $editFormAction; ?>" id="RegisterFrom" name="RegisterFrom" method="POST">
    <table width="400" border="0" align="center" id="Text">
      <tr>
        <td><table border="0">
          <tr>
            <td><span id="sprytextfield1">First Name:
              <label for="Fname"></label>
              <br />
<input name="Fname" type="text" class="StyleTextField" id="Fname" />
              <span class="textfieldRequiredMsg">*</span></span></td>
            <td><span id="sprytextfield2">Last Name:
              <label for="Lname"></label>
              <br />
<input name="Lname" type="text" class="StyleTextField" id="Lname" />
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
        </table></td>
      </tr>
    
      <tr>
        <td><table border="0">
          <tr>
            <td><span id="sprytextfield3">College Name:
              <label for="College"></label>
              <br />
<input name="College" type="text" class="StyleTextField" id="College" />
              <span class="textfieldRequiredMsg">*</span></span></td>
            <td><span id="sprytextfield4">Course:
              <label for="Course"></label>
              <br />

<label for="Course"></label>
<select name="Course" id="Course" class="StyleTextField">
   <option></option>
  <option>BCA</option>
  <option>BBA</option>
  <option>BCAM</option>
  <option>MCA</option>
</select>
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
        </table></td>
      </tr>
     
      <tr>
        <td><table border="0">
          <tr>
            <td width="202"><span id="sprytextfield5">Semester:
              <label for="Sem"></label>
              <br />
<select name="Sem" id="Sem"  class="StyleTextField">
   <option></option>
  <option>1st</option>
  <option>2nd</option>
  <option>3rd</option>
  <option>4th</option>
  <option>5th</option>
  <option>6th</option>
</select>
              <span class="textfieldRequiredMsg">*</span></span></td>
            <td width="202"><span id="sprytextfield6">Enrollment No.
              :<br />
              <label for="Eid"></label>
              <input name="Eid" type="text" class="StyleTextField" id="Eid" />
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
        </table></td>
      </tr>
     
      <tr>
        <td>
        <table border="0">
        <tr>
        <td><span id="sprytextfield7">Event:<br />
          <label for="Event"></label>
          <select name="Event"  class="StyleTextField" id="Event"><option> </option>
<option> ARTI-CODE</option>
            <option>BUG 2 DEBUG</option>
            <option>SPIDERWICK</option>
            <option>X-COMWAR</option>
          </select>
          <span class="textfieldRequiredMsg">*</span></span></td>
          <td><p>Mobile :<span id="sprytextfield12"><br />
            <label for="Mobile"></label>
          <input name="Mobile" type="text" size="10" class="StyleTextField" id="Mobile" />
          <span class="textfieldRequiredMsg">*</span></span></p></td>
       </tr>
        </table>
        </td>
      </tr>
<tr>
        <td>
        <table border="0">
        <tr>
        <td><span id="sprytextfield8">User Name:<br />
          <label for="UserName"></label>
          <input name="UserName" type="text" class="StyleTextField" id="UserName" />
          <span class="textfieldRequiredMsg">*</span></span></td>
           <td><span id="sprytextfield9">Email:<br />
            <label for="Email"></label>
            <input name="Email" type="text" class="StyleTextField" id="Email" />
            <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      </tr>
    
       </tr>
        </table>
        </td>
      </tr>
     
      <tr>
        <td>
        <table border="0">
          <tr>
            <td><span id="sprytextfield10">
              <label for="Password"></label>Password:
              <br />
              <input name="Password" type="Password" class="StyleTextField" id="Password" />
              <span class="textfieldRequiredMsg">*</span></span></td>
            <td><span id="sprytextfield11">Confirm Password:
              <label for="PasswordC"></label>
              <br />
<input name="PasswordC" type="password" class="StyleTextField" id="PasswordC" />
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
        </table>
        </td>
      </tr>
     
      <tr>
        <td><div align="center">
          <input type="submit" class="StyleButton" name="RegisterButton" id="RegisterButton" value="Register" />
        </div></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="RegisterFrom" />
  </form>
</div>
</div>
<div id="Footer"></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "email");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
</script>
</body>
</html>
<?php
mysql_free_result($Register);
?>
