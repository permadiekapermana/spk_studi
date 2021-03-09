<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

echo "<BR>";
if (!isset($_SESSION[alogin]))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Add Question </h3>";
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
extract($_POST);
mysql_query("insert into mst_question(que_id,test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$id_question','$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo "<p align=center>Question Added Successfully.</p>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form1.anstrue.focus();
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
<div style="margin:auto;width:90%;height:auto;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<br><br>
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="0" align="center">
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="testid" id="testid" class="input">
<?php
$rs=mysql_query("Select * from mst_test order by test_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" cols="60" rows="2" id="addque" class="input"></textarea></td>
    </tr>
    <?php
          $pel="QUES.";
          $y=substr($pel,0,4);
          $query=mysql_query("select * from mst_question where substr(que_id,1,4)='$y' order by que_id desc limit 0,1");
          $row=mysql_num_rows($query);
          $data=mysql_fetch_array($query);
          if ($row>0){
          $no=substr($data['que_id'],-6)+1;}
          else{
          $no=1;
          }
          $nourut=1000000+$no;
          $nopel=$pel.substr($nourut,-6);
          echo"
           <td><input type='hidden' value='$nopel' name='id_question'></td>
          ";
          ?>
    <tr>
      <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85" class="input"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer2 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85" class="input"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer3 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85" class="input"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer4</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85" class="input"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter True Answer </strong></td>
      <td>&nbsp;</td>
      <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50" class="input"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" class="myButton">
          <a href="login.php?page=quest" class="myButton2" style="color:#fff; text-decoration:none;" >Back</a>
      </td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>