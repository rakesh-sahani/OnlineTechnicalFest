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
 @session_start(); ?>

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
<title>BUG 2 DEBUG</title>
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="Content">
<form id="QuizTest" name="QuizTest" method="post" action="">
<input name="Fname" type="text" class="StyleTextField2" id="Fname" readonly="readonly" value="<?php echo $row_User['Fname']; ?> <?php echo $row_User['Lname']; ?>" />
<br/><br/>
<table border="2" bgcolor="#CCCCCC" bordercolor="#000000"><td><br/>
<center> 
  <input name="EventName" type="text" class="StyleTextField2" id="EventName"  value = "      BUG 2 DEBUG" readonly="readonly" align="middle"/></center>
   
    <table width="900" align="center">
      <tr>
        <td>All Questions Compulsory &amp; No Negative Marking..</td>
      </tr>
      <tr>
        <td><p>1.   Find the output of the following program<br />
        <div>  &nbsp;&nbsp;&nbsp;&nbsp;int main()<br />
         &nbsp;&nbsp;&nbsp; {<br />
         &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; int a[5]={1,2,3};<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  int i;<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for(i=0;i&lt;5;i++)<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; printf(“%d”,a[i]);<br />
         &nbsp;&nbsp;&nbsp; }</div></p>
          <p>
            <label>
              <input type="radio" name="Ques1" value="a" id="Ques1" />
              12</label>
            <br />
            <label>
              <input type="radio" name="Ques1" value="b" id="Ques1" /></label>
            12300<br />
            <label>
              <input type="radio" name="Ques1" value="c" id="Ques1" /></label>
            12301<br />
            <label>
              <input type="radio" name="Ques1" value="d" id="Ques1" />
              None of the above</label>
          </p></td>
        </tr>
      <tr>
        <td>2. What is    the result of the following code?<br />   
           <table border="0" cellpadding="0" cellspacing="0">
             <tbody>
               <tr>
                 <td valign="top" width="31"><div></div></td>
                 <td valign="top" width="606"><div> void    main( ) </div>
                   <div>  {</div>
                   <div> int   x = 0;</div>
                   <div> for(  x =1;     x&lt;4;  x++ );</div>
                   <div> printf(    &ldquo;x=%d, &rdquo;, x);</div>
                   <div> }</div></td>
               </tr>
             </tbody>
           </table>
           <br />
          <label>
              <input type="radio" name="Ques2" value="a" id="Ques2" />
             x=4,</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="b" id="Ques2" />
               x=0,</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="c" id="Ques2" />
              x=1,      x=2, x=3,</label>
            <br />
            <label>
              <input type="radio" name="Ques2" value="d" id="Ques2" />
              None of the above</label>            <br />
         </td>
        </tr>
      <tr>
        <td><p>3. Find  the output of the following program<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int main()<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ <br />  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int a=10,b=20,c;
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c=add(a,b);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(“%d”c);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int add(int x,int y)
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return(x+y);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return(x);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return(y);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return(x-y);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return(y+1);
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
          
<p>
  <label>
              <input type="radio" name="Ques3" value="a" id="Ques3" />
              30</label>
  <br />
            <label>
              <input type="radio" name="Ques3" value="b" id="Ques3" />
              10
            </label>
            <br />
            <label>
              <input type="radio" name="Ques3" value="c" id="Ques3" />
            </label>
            20
            <br />
            <label>
              <input type="radio" name="Ques3" value="d" id="Ques3" />
              -10</label>            <br />
      </p></td>
        </tr>
      <tr>
        <td>4. 
          Find the    output of the following program
          <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int main()<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int a,b,n;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a=100;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b=200;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;n=printf(“%d%d”,a,b);<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(“%d”,n);<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</div>
          <br />
          <label>
            <input type="radio" name="Ques4" value="a" id="Ques4" /></label>
          100,200,200<br />
          <label>
            <input type="radio" name="Ques4" value="b" id="Ques4" />
          </label>
          100,200,6<br />
          <label>
            <input type="radio" name="Ques4" value="c" id="Ques4" /></label>
          100,100,200<br />
          <label>
            <input type="radio" name="Ques4" value="d" id="Ques4" />
            100,100,2<br />
            <br />
          </label></td>
        </tr>
      <tr>
        <td>5.  Find the output of the following program<br />
          &nbsp;&nbsp;&nbsp;&nbsp;int main()<br />
          &nbsp;&nbsp;&nbsp;&nbsp;{<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;int i=1;<br />
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; while(i&lt;++i);<br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(“%d”,i);<br />
          &nbsp;&nbsp;&nbsp;&nbsp;}<br />
          <label>
            <input type="radio" name="Ques5" value="a" id="Ques5" />
            1
          </label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="b" id="Ques5" />
            6
          </label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="c" id="Ques5" />
            5
          </label>
          <br />
          <label>
            <input type="radio" name="Ques5" value="d" id="Ques5" />
            2<br />
          </label></td>
        </tr>
      <tr>
        <td><p>6. What is    the following code&rsquo;s output if choice = &lsquo;R&rsquo;?</p>
          <div>&nbsp;&nbsp;&nbsp;&nbsp;switch(choice)</div>
          <div>&nbsp;&nbsp;&nbsp;&nbsp;{  </div>
          <div>               case   &lsquo;R&rsquo;     : printf( &ldquo;RED &rdquo;);</div>
          <div>               case   &lsquo;W&rsquo; : printf( &ldquo;WHITE &rdquo;);</div>
          <div>               case   &lsquo;B&rsquo;     : printf( &ldquo;BLUE &rdquo;);</div>
          <div>               default      : printf( &ldquo;ERROR &rdquo;);</div>
          <div>               break;</div>
          <div>        }</div>
          <p>
            <label>
              <input type="radio" name="Ques6" value="a" id="Ques6" />
            </label>
            <label></label>
RED WHITE<br />
            <label>
              <input type="radio" name="Ques6" value="b" id="Ques6" /> 
            </label>
            WHITE BLUE<br />
            <label>
              <input type="radio" name="Ques6" value="c" id="Ques6" /> 
            </label>
            RED WHITE BLUE<br />
            <label>
              <input type="radio" name="Ques6" value="d" id="Ques6" />
            </label>
            RED  BLUE</p></td>
        </tr>
      <tr>
        <td>7. While    declaring an array in C as : <strong><em>datatype arrayname[size]; </em></strong>the <strong><em>size</em></strong> can be <br />
          <br />
          <label>
            <input type="radio" name="Ques7" value="a" id="Ques7" /></label>
           Any    constant<br />
          <label>
            <input type="radio" name="Ques7" value="b" id="Ques7" /></label>
           An integer <br />
          <label>
            <input type="radio" name="Ques7" value="c" id="Ques7" /></label>
           Any initialized integer variable<br />
          <label>
            <input type="radio" name="Ques7" value="d" id="Ques7" />
Static variables
<br />
<br />
          </label></td>
        </tr>
      <tr>
        <td>8. How would    you declare a constant of 5 called &quot;MYCONST&quot;?<br />
          <br />
          <label>
            <input type="radio" name="Ques8" value="a" id="Ques8" /></label>
          #define MYCONST 5 <br />
          <label>
            <input type="radio" name="Ques8" value="b" id="Ques8" /></label>
          constant MYCONST = 5;<br />
          <label>
            <input type="radio" name="Ques8" value="c" id="Ques8" /></label>
constant = 5<br />
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
        <td align="center"><input name="Submit" type="submit" class="StyleButton" id="Submit" value="Submit" / ></td>
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
