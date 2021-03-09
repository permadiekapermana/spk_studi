<?php
session_start()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrative Login - Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<style type="text/css">
  input[type=text],input[type=password], select {
  width: 100%;
  padding: 9px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 .myButton2 {
  box-shadow:inset 0px -3px 7px 0px #ff1414;
  background:linear-gradient(to bottom, #f72e49 5%, #ff0000 100%);
  background-color:#f72e49;
  border-radius:3px;
  border:0px solid #0b0e07;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 252px;
  text-decoration:none;
  text-shadow:0px 1px 0px #263666;
}
.myButton2:hover {
  background:linear-gradient(to bottom, #ff0000 5%, #f72e49 100%);
  background-color:#ff0000;
}
.myButton2:active {
  position:relative;
  top:1px;
}
</style>
</head>

<body>
<?php
include("header.php");
?>

<p class="head1">Adminstrative Login </p>
<form name="form1" method="post" action="login.php">
<center>
<table width="50%" border="0">

  <tr>
    <td width="100" rowspan="5"><span class="style2"><span class="head1"><img src="login.jpg" width="131" height="155"></span></span>
    </td>
    <td width="100" class="style2" rowspan="2">Login ID </td>
  </tr>

  <tr>
    <td colspan="2"><input name="loginid" type="text" id="loginid"></td>
  </tr>
  <tr>
    <td class="style2" rowspan="1">Password</td>
    <td colspan="2"><input name="pass" type="password" id="pass"></td>
  </tr>
  <tr>
    <td colspan="2"><input name="submit" class= "myButton2" type="submit" id="submit" value="Login"></td>

  </tr>

  <tr>
    <td ></td>
    <td></td>
  </tr>

</table>
</center>


</form>

</body>
</html>
