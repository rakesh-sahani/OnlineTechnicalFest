<?php require_once('Connections/mysql.php'); ?>
<?php @session_start(); ?>
<?php
if (!function_exists("GetSQLValueString")) 
{
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  if (PHP_VERSION < 6) 
	  {
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	  }
	
	  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
	  switch ($theType)
	  {
		case "text": $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		break;    
		case "long":
		case "int": $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		break;
		case "double": $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
		break;
		case "date": $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		break;
		case "defined": $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		break;
	  }
	  return $theValue;
	}
}

$colname_User = "-1";
if (isset($_SESSION['MM_Username'])) 
{
  $colname_User = $_SESSION['MM_Username'];
}
mysql_select_db($database_mysql, $mysql);
$query_User = sprintf("SELECT * FROM register WHERE Username = %s", GetSQLValueString($colname_User, "text"));
$User = mysql_query($query_User, $mysql) or die(mysql_error());
$row_User = mysql_fetch_assoc($User);
$totalRows_User = mysql_num_rows($User);
?>

<?php
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
<title>SPIDERWICK</title>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="Content">
<form id="QuizTest" name="QuizTest" method="post" action="">
<input name="Fname" type="text" class="StyleTextField2" id="Fname" readonly="readonly" value="<?php echo $row_User['Fname']; ?> <?php echo $row_User['Lname']; ?>" />
<br/><br/>
<table border="2" bgcolor="#CCCCCC" bordercolor="#000000" ><td><br/>
<center><input name="EventName" type="text" class="StyleTextField2" id="EventName"  value = "      SPIDERWICK" readonly="readonly" align="middle"/></center>
<table width="900" align="center">
<tr>
    <td>All Questions Compulsory &amp; No Negative Marking..</td>
</tr>
<tr>
    <td><p>1.  What does HTML stand for?</p>
          <p>
            <label>
              <input type="radio" name="Ques1" value="a" id="Ques1" /> 
               Half The Mess Later</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="b" id="Ques1" /></label>
             HyperText Markup Language<br />
            <label>
              <input type="radio" name="Ques1" value="c" id="Ques1" />
               HyperTools Markup Language</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="d" id="Ques1" />
               HyperText Mixup Language</label>
          </p></td>
        </tr>
      <tr>
        <td><p>2. 
          What is the correct format for inserting an image? <br />   
          <br />
          <label>
            <input type="radio" name="Ques2" value="a" id="Ques2" /> 
            &nbsp;&lt;img src=&quot;photo.jpg&quot;&gt;</label>
          <br />
          <label>
            <input type="radio" name="Ques2" value="b" id="Ques2" /> 
            &nbsp;&lt;image src=&quot;photo.jpg&quot;&gt;</label>
          <br />
          <label>
            <input type="radio" name="Ques2" value="c" id="Ques2" />  
            &nbsp;&lt;img href=&quot;photo.jpg&quot;&gt;</label>
          <br />
          <label>
            <input type="radio" name="Ques2" value="d" id="Ques2" />  
            &nbsp;&lt;img&gt;photo.jpg&lt;/img&gt;</label>
        </p>
         </td>
        </tr>
      <tr>
        <td><p>3. Which element is used for both text and password form fields?</p>
          <p>
            <label>
              <input type="radio" name="Ques3" value="a" id="Ques3" />
              input</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="b" id="Ques3" />
              select</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="c" id="Ques3" />
              form</label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="d" id="Ques3" /></label>
            hidden          </p></td>
        </tr>
      <tr>
        <td><p>4. What is the &lt;td&gt; &lt;/td&gt; element? <br /><br />
            <label>
              <input type="radio" name="Ques4" value="a" id="Ques4" />
            </label>
            a table head cell<br />
            <label>
              <input type="radio" name="Ques4" value="b" id="Ques4" />
            </label>
            a table data cell<br />
            <label>
              <input type="radio" name="Ques4" value="c" id="Ques4" /></label>
            a tabular distortion<br />
            <label>
              <input type="radio" name="Ques4" value="d" id="Ques4" />
              a table description<br />
              <br />
            </label>
          </p></td>
        </tr>
      <tr>
        <td>5. 
          Which of the following is a valid color code? <br />
          <br />
          <label>
            <input type="radio" name="Ques5" value="a" id="Ques5" />
             &nbsp;-505050</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="b" id="Ques5" />
            &nbsp;&amp;505050</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="c" id="Ques5" />
            &nbsp;$505050</label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="d" id="Ques5" />
            &nbsp;#505050<br />
          </label></td>
        </tr>
      <tr>
        <td><p>6. Which is the root element in a HTML document?</p>
          <p>
            <label>
              <input type="radio" name="Ques6" value="a" id="Ques6" /></label>
            HEAD<br />
            <label>
              <input type="radio" name="Ques6" value="b" id="Ques6" /></label>
            SCRIPT<br />
            <label>
              <input type="radio" name="Ques6" value="c" id="Ques6" />  
              HTML</label>
            <br />
            <label>
              <input type="radio" name="Ques6" value="d" id="Ques6" /> 
               </label>
BODY</p></td>
        </tr>
      <tr>
        <td>7.Which of the following examples shows correctly nested HTML elements? <br />
          <br />
          <label>
            <input type="radio" name="Ques7" value="a" id="Ques7" /></label>
          &nbsp;&lt;html&gt;&lt;head&gt;&lt;body&gt;&lt;/html&gt;&lt;/head&gt;&lt;/body&gt;<br />
          <label>
            <input type="radio" name="Ques7" value="b" id="Ques7" />
           &nbsp;&lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;&lt;/body&gt;&lt;/html&gt;</label>
          <br />
          <label>
            <input type="radio" name="Ques7" value="c" id="Ques7" /></label>
                 &nbsp;&lt;html&gt;&lt;head&gt;&lt;head&gt;&lt;body&gt;&lt;body&gt;&lt;html&gt;<br />
          <label>
            <input type="radio" name="Ques7" value="d" id="Ques7" />
              &nbsp;&lt;html&gt;&lt;/html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;&lt;/body&gt;<br />
              <br />
          </label></td>
        </tr>
      <tr>
        <td><p>8. What is the code for getting the current time?</p>
          <p><br />
            <label>
              <input type="radio" name="Ques8" value="a" id="Ques8" />
              var now = new Date();</label>
            <br />
            <label>
              <input type="radio" name="Ques8" value="b" id="Ques8" />
              now = new Date();</label>
            <br />
            <label>
              <input type="radio" name="Ques8" value="c" id="Ques8" />
            </label>
            var now = Date();<br />
            <label>
              <input type="radio" name="Ques8" value="d" id="Ques8" />
              var now = new Date(current);<br />
              <br />
            </label>
          </p></td>
        </tr>
      <tr>
        <td>9. What is the code to start displaying the time when document loads?<br/><br />
            <label>
              <input type="radio" name="Ques9" value="a" id="Ques9" />
onload = displayTime;</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="b" id="Ques9" />
window. = displayTime;</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="c" id="Ques9" />
              window.onload = displayTime;</label>
            <br />
            <label>
              <input type="radio" name="Ques9" value="d" id="Ques9" />
window.onload = start;<br />
            </label>
          </p></td>
        </tr>
      <tr>
        <td>10.What is the default value of the <strong>type</strong> attribute?<br />
          <br />
          <label>
            <input type="radio" name="Ques10" value="a" id="Ques10" />
text/javascript</label>
          <br />
          <label>
            <input type="radio" name="Ques10" value="b" id="Ques10" /></label>
           text/css<br />
          <label>
            <input type="radio" name="Ques10" value="c" id="Ques10" />          
             </label>
           text<br />
          <label>
            <input type="radio" name="Ques10" value="d" id="Ques10" />
          None of the above<br />
          </label></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td align="center"  ><input name="Submit" type="submit" class="StyleButton" id="Submit" value="Submit" /></td>
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
