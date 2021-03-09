<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Adminstrative AreaOnline Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="stl.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
if(isset($submit))
{
	include("../database.php");
	$password     = md5($pass);
	$rs=mysql_query("select * from mst_admin where username='$loginid' and pass='$password'",$cn) or die(mysql_error());
	if(mysql_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
		
	}
	$_SESSION['alogin']="true";
	
}
else if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}
?>

<p class="head1">Welcome to Admistrative Area </p>
<div style="margin:auto;width:90%;height:auto;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<div class="box-menu">
<div class="box-link">
	<a href="?page=subject"><div class="t">Subject</div></a>
</div>
<div class="box-linkonten">
	<?php 
		$page = $_GET[page];
		if($page ==""){
			echo "Haloo admin selamat datang...";
		
		}else if($page =="subject"){
			include"subject.php";
		}else if($page =="test"){
			include"testlist.php";
		}else if($page =="quest"){
			include"question.php";
			
		}else if($page =="knowladge"){
			include"knowladge.php";
		}else if($page =="range"){
			include"range.php";
		}
	?>
</div>
<div class="box-link">
	<a href="?page=test"> <div class="t">Test</div></a>
</div>
<div class="box-link">
	<a href="?page=quest"><div class="t">Question</div></a>
</div>
<div class="box-link">
	<a href="?page=knowladge"><div class="t">Knowladge</div></a>
</div>
<div class="box-link">
	<a href="?page=range"><div class="t">Value Range</div></a>
</div>



	<p align="center" class="head1">&nbsp;</p>

</div>
	<div style="clear:both;"></div>
</div>
</body>
</html>
