<?php require_once('Connections/mysql.php'); ?>
<?php @session_start(); ?>
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
 @session_start(); 
 ?><?php
if(isset($_POST["Submit"]))
{
	$Fname = $_POST['Fname'];
	$EventName = $_POST['EventName'];
	$Score=0;
	$answer1 = $_POST['Ques1'];
	$answer2 = $_POST['Ques2'];
	$answer3 = $_POST['Ques3'];
	$answer4 = $_POST['Ques4'];
	$answer5 = $_POST['Ques5'];
	$answer6 = $_POST['Ques6'];
	$answer7 = $_POST['Ques7'];
	$answer8 = $_POST['Ques8'];
	$answer9 = $_POST['Ques9'];
	$answer10 = $_POST['Ques10'];
	if($answer1 == "b")
	{
	$Score++;
	}
	if($answer2 == "a")
	{
	$Score++;
	}
	if($answer3 == "a")
	{
	$Score++;
	}
	if($answer4 == "b")
	{
	$Score++;
	}	
	if($answer5 == "d")
	{
	$Score++;
	}	
	if($answer6 == "c")
	{
	$Score++;
	}
	if($answer7 == "b")
	{
	$Score++;
	}
	if($answer8 == "a")
	{
	$Score++;
	}
	if($answer9 == "c")
	{
	$Score++;
	}
	if($answer10 == "a")
	{
	$Score++;
	}
	
	$sql="INSERT INTO result (FullName,Event_Name,Score) VALUES ('$Fname','$EventName','$Score')";
	$result = mysql_query($sql);
	if($result)
	{
		 header('Location: ProcessTest.php');   
	}
}
@session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ARTI-CODE</title>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="Content">
<form id="QuizTest" name="QuizTest" method="post" action="">
<div id="Text3">
<input name="Fname" type="text" class="StyleTextField2" id="Fname" readonly="readonly" value="<?php echo $row_User['Fname']; ?> <?php echo $row_User['Lname']; ?>" /> </div>
<br/><br/>
<table border="2" bgcolor="#CCCCCC" bordercolor="#000000" ><td><br/>
<center>
  <input name="EventName" type="text" class="StyleTextField2" id="EventName"  value = "      ARTI-CODE" readonly="readonly" align="middle"/></center>
       <table width="900" align="center">
      <tr>
        <td>All Questions Compulsory &amp; No Negative Marking..</td>
      </tr>
      <tr>
        <td><p>1.  Which specification that provides runtime environment in which java byte code can be executed?</p>
          <p>
            <label>
              <input type="radio" name="Ques1" value="a" id="Ques1" />
              JDK</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="b" id="Ques1" />
              JVM</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="c" id="Ques1" />
              JRE</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="d" id="Ques1" />
              None of the above</label>
          </p></td>
        </tr>
      <tr>
        <td>2. Which is an application designed to be transmitted over the Internet and executed by a Java-compatible Web browser?<br />   <br />
          <label>
              <input type="radio" name="Ques2" value="a" id="Ques2" />
             An Applet</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="b" id="Ques2" />
               An Application</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="c" id="Ques2" />
             Both A &amp; B</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="d" id="Ques2" />
              None of the above</label>            <br />
         </td>
        </tr>
      <tr>
        <td><p>3. Which are used to produce a programming environment that supports the   development of far more robust and scalable programs than does the process-oriented model?</p>
          <p>
            <label>
              <input type="radio" name="Ques3" value="a" id="Ques3" />
              Polymorphism, Encapsulation, and Inheritance</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="b" id="Ques3" />
              Encapsulation and Inheritance</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="c" id="Ques3" />
              Polymorphism and Encapsulation</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="d" id="Ques3" />
              Inheritance and Polymorphism</label>
            <br />
          </p></td>
        </tr>
      <tr>
        <td>4. In this type one super-class is having more than one sub-class?<br />
          <br />
          <label>
            <input type="radio" name="Ques4" value="a" id="Ques4" /></label>
          <label> Single inheritance</label>
          <br />
          <label>
            <input type="radio" name="Ques4" value="b" id="Ques4" />
          </label>
          Hierarchical inheritance<br />
          <label>
            <input type="radio" name="Ques4" value="c" id="Ques4" />
            Multiple inheritances</label>
          <br />
          <label>
            <input type="radio" name="Ques4" value="d" id="Ques4" />
            Multilevel inheritance
            <br />
            <br />
          </label></td>
        </tr>
      <tr>
        <td>5. Which symbol Used to contain the values of automatically initialized arrays. Also used<br />
             &nbsp;&nbsp;&nbsp;&nbsp;To define a block of code, for classes, methods, and local scopes?<br />
          <br />
          <label>
            <input type="radio" name="Ques5" value="a" id="Ques5" />
            Brackets</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="b" id="Ques5" />
            Parentheses</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="c" id="Ques5" />
            Semicolon</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="d" id="Ques5" />
            Braces
<br />
          </label></td>
        </tr>
      <tr>
        <td><p>6. Which data type has this Minimum and Maximum value 3.4e-038 to 3.4e+038?</p>
          <p>
            <label>
              <input type="radio" name="Ques6" value="a" id="Ques6" />
              long</label>
            <br />
            <label>
              <input type="radio" name="Ques6" value="b" id="Ques6" />
              Int</label>
            <br />
            <label>
              <input type="radio" name="Ques6" value="c" id="Ques6" />
              Float</label>
            <br />
            <label>
              <input type="radio" name="Ques6" value="d" id="Ques6" />
Byte</label>
          </p></td>
        </tr>
      <tr>
        <td>7. Which variables are created when an object is created with the use of   the keyword 'new' and destroyed when the object is destroyed?<br />
          <br />
          <label>
            <input type="radio" name="Ques7" value="a" id="Ques7" />
Local variables</label>
          <br />
          <label>
            <input type="radio" name="Ques7" value="b" id="Ques7" />
Instance variables</label>
          <br />
          <label>
            <input type="radio" name="Ques7" value="c" id="Ques7" />
            Class Variables</label>
          <br />
          <label>
            <input type="radio" name="Ques7" value="d" id="Ques7" />
Static variables
<br />
<br />
          </label></td>
        </tr>
      <tr>
        <td>8. Who is also called father of Java Programming Language?<br />
          <br />
          <label>
            <input type="radio" name="Ques8" value="a" id="Ques8" />
            James Gosling</label>
          <br />
          <label>
            <input type="radio" name="Ques8" value="b" id="Ques8" />
            Ken Thompson</label>
          <br />
          <label>
            <input type="radio" name="Ques8" value="c" id="Ques8" />
            Dennis Richie</label>
          <br />
          <label>
            <input type="radio" name="Ques8" value="d" id="Ques8" />
          None of the above<br />
          <br />
          </label></td>
        </tr>
      <tr>
        <td>9. In  control statements break, continue, return, try-catch-finally and assert belongs to ?
          <br/><br />
            <label>
              <input type="radio" name="Ques9" value="a" id="Ques9" />
              Selection statements</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="b" id="Ques9" />
              Loop Statements</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="c" id="Ques9" />
              Transfer statements</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="d" id="Ques9" />
              None of the above<br />
              <br />
            </label>
          </p></td>
        </tr>
      <tr>
        <td>10.What output you will get if you run this program?<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;class Modulus {<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; public static void main(String args[]) {<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; int x = 42;<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;double y = 42.25;<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System.out.println(&quot;x mod 10 = &quot; + x % 10);<br />
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;System.out.println(&quot;y mod 10 = &quot; + y % 10);<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }<br />
          <br />
          <label>
            <input type="radio" name="Ques10" value="a" id="Ques10" />
x mod 10 = 2 <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;y mod 10 = 2.25</label>
          <br />
          <label>
            <input type="radio" name="Ques10" value="b" id="Ques10" /></label>
          x mod 10 = 4<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;y mod 10 = 2.50 <br />
          <label>
            <input type="radio" name="Ques10" value="c" id="Ques10" /></label>
x mod 10 = 6<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;y mod 10 = 3.25<br />
          <label>
            <input type="radio" name="Ques10" value="d" id="Ques10" />
          None of the above<br />
          </label></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="center" ><input name="Submit" type="submit" class="StyleButton" id="Submit" value="Submit" /></td>
        </tr>
    </table><br/></td></table>
  </form>
 
  
</div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
<?php
mysql_free_result($User);
@session_destroy();
@session_unset();
?>
