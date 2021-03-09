<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo "<br><h2><div  class=head1>Add Test</div></h2>";
if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
mysql_query("insert into mst_test(test_id, sub_id,test_name,total_que) values ('$id_test', '$subid','$testname','$totque')",$cn) or die(mysql_error());
echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
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
<form name="form1" method="post" onSubmit="return check();">
  <table width="58%"  border="0" align="center" cellpadding="9" cellspacing="0">
    <tr>
      <td width="15%" height="32"><div align="left"><strong>Enter Subject ID </strong></div></td>
      
      <td width="48%" height="32"><select name="subid"  class="input" >
<?php
$rs=mysql_query("Select * from mst_subject order by  sub_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Test Name </strong></div></td>
        
    <td><input name="testname" type="text"  class="input"  id="testname"></td>
    </tr>
          <?php
          $pel="TEST.";
          $y=substr($pel,0,4);
          $query=mysql_query("select * from mst_test where substr(test_id,1,4)='$y' order by test_id desc limit 0,1");
          $row=mysql_num_rows($query);
          $data=mysql_fetch_array($query);
          if ($row>0){
          $no=substr($data['test_id'],-6)+1;}
          else{
          $no=1;
          }
          $nourut=1000000+$no;
          $nopel=$pel.substr($nourut,-6);
          echo"
           <td><input type='hidden' value='$nopel' name='id_test'></td>
          ";
          ?>
    <tr>
      <td height="26"><div align="left"><strong>Enter Total Question </strong></div></td>
     
      <td><input name="totque" type="text" class="input" id="totque"></td>
    </tr>
    <tr>
      <td height="26"></td>
     
      <td><input type="submit" name="submit" class="myButton" value="Add" >
      <a href="login.php?page=test" class="myButton2" style="color:#fff; text-decoration:none;">Back</a></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
