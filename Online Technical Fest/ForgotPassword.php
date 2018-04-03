<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/Layout.css" rel="stylesheet" type="text/css"/>
<link href="CSS/Menu.css" rel="stylesheet" type="text/css"/>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
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
  <h1>&nbsp;</h1>
</div>
<div id="ContentLeft">
  <h2 id="Text2">Enter Valid Email Address </h2>
  
</div>
<div id="ContentRight">
  <form id="EPForm" name="EPForm" method="post" action="EmailPassword.php">
    <div align="center">
      <table width="400" border="0" align="center">
        <tr>
          <td><h2><span id="sprytextfield1">
            <label for="Email"></label>
            <input name="Email" type="text" class="StyleTextField" id="Email" />
            <span class="textfieldRequiredMsg">A value is required.</span></span><br />
            <br />
              <input name="EMPWButton" type="submit" class="StyleButton" id="EMPWButton" value="Email Password" />
              <br />
            </h2></td>
        </tr>
      </table>
    </div>
  
    <label for="Email"></label>
    <div  id="h6">
      <div >       </div>
    </div>
    </span>
    <div align="left"></div>
  </form>
</div>
</div>
<div id="Footer"></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>