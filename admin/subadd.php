<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

//echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Subject Add </h3>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysql_query("select * from mst_subject where sub_name='$subname'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Subject is Already Exists</div>";
	exit;
}
mysql_query("insert into mst_subject(sub_id,sub_name) values ('$id_subject','$subname')",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>
<style type="text/css">
  body{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;}
   .myButton {
    box-shadow:inset 0px -3px 7px 0px #29bbff;
    background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
    background-color:#2dabf9;
    border-radius:3px;
    border:0px solid #0b0e07;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    padding:9px 23px;
    text-decoration:none;
    text-shadow:0px 1px 0px #263666;
  }
  .myButton:hover {
    background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
    background-color:#0688fa;
  }
  .myButton:active {
    position:relative;
    top:1px;
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
  padding:9px 23px;
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
.input {
  width: 80%;
  padding: 9px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<title>Add Subject</title>
<form name="form1" method="post" onSubmit="return check();">
  <table width="41%"  border="0" align="center">
    <tr>
      <td width="45%" height="32"><div align="center"><strong>Enter Subject Name </strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
        <input name="subname" class="input" placeholder="enter language name" type="text" id="subname">
        <?php
          $pel="SUBJ.";
          $y=substr($pel,0,4);
          $query=mysql_query("select * from mst_subject where substr(sub_id,1,4)='$y' order by sub_id desc limit 0,1");
          $row=mysql_num_rows($query);
          $data=mysql_fetch_array($query);
          if ($row>0){
          $no=substr($data['sub_id'],-6)+1;}
          else{
          $no=1;
          }
          $nourut=1000000+$no;
          $nopel=$pel.substr($nourut,-6);
          echo"
           <td><input type='hidden' value='$nopel' name='id_subject'></td>
          ";
          ?>
    <tr>
        <td height="26"> </td>
        <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="submit" class="myButton" value="Add" >
        <a href="login.php?page=subject" class="myButton2" style="color:#fff; text-decoration:none;" >Back</a>
      </td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>