<?php
require("../database.php");
$page = $_GET[page]; $sub=$_GET[sub];
//include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
?>
<style type="text/css">
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
  #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      font-size: 12px;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      font-size: 14px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    .scroll{

      overflow: scroll;
      height: 550px;
      
      /*script tambahan khusus untuk IE */
      scrollbar-face-color: #CE7E00; 
      scrollbar-shadow-color: #FFFFFF; 
      scrollbar-highlight-color: #6F4709; 
      scrollbar-3dlight-color: #11111; 
      scrollbar-darkshadow-color: #6F4709; 
      scrollbar-track-color: #FFE8C1; 
      scrollbar-arrow-color: #6F4709;
    }

</style>
<!-- <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left"> -->

<?php if($page=="quest" && $sub==""){?>
    <span style="font-size:18px; font-weight:bold;">LIST OF QUESTIONS </span> 
    <a href="questionadd.php"><button class="button1" >Tambah</button></a>
<?php }elseif($page=="quest" && $sub=="edit"){?>
    <span style="font-size:18px; font-weight:bold;">EDIT QUESTIONS </span> 
<?php } ?>
<br><br>
<?php if($page=="quest" && $sub==""){ ?>
<!-- form tampil data -->
<div class="scroll">
<table id="customers">
    <tr>
      <th width="30">No</th>
      <th>Test</th>
      <th>Que Desc</th>
      <th>Answer 1</th>
      <th>Answer 2</th>
      <th>Answer 3</th>
      <th>Answer 4</th>
      <th width="70">Act</th>
    </tr>
    <?php 
      $qt = mysql_query("SELECT * FROM mst_question,mst_test WHERE mst_question.test_id=mst_test.test_id ORDER BY mst_question.test_id ASC")or die(mysql_error());
      while ($sbj = mysql_fetch_array($qt)) { $no++;
    ?>
    <tr>
      <td  align="center"><?=$no?></td>
      <td><?=$sbj[test_name]?></td>
      <td><?=$sbj[que_desc]?></td>
      <td><?=$sbj[ans1]?></td>
      <td><?=$sbj[ans2]?></td>
      <td><?=$sbj[ans3]?></td>
      <td><?=$sbj[ans4]?></td>
      <td align="center">
          <a href="?page=quest&sub=edit&id=<?php echo $sbj[que_id]?>"><img src="../image/edit.png" width="20px" title="edit data"></a> &nbsp;
          <a href="javascript:confirmDelete('delete.php?form=quest&delid=<?=$sbj[que_id]?>')"><img src="../image/del.png" width="20px" title="hapus"></a>
      </td>
    </tr>
    <?php  } $no=1;?>
    
</table>
</div>
<?php }elseif($page=="quest" && $sub=="edit") {
  $qe = mysql_query("SELECT * FROM mst_question,mst_test WHERE mst_question.test_id=mst_test.test_id AND mst_question.que_id='$_GET[id]'");
  $dsbj = mysql_fetch_array($qe);
?>
<!-- Form tambah subjet -->
  <form name="form1" method="POST" action="" >
    <table width="100%"  border="0">
      <tr>
        <td width="250" height="32"><strong>Select Test Name </strong></td>
        <td width="" height="32">
          <select name="test" required>
              <?php
                $S = mysql_query("SELECT * FROM mst_test order by test_name");
                while ($ss = mysql_fetch_array($S)) {
              ?>
                <option value="<?=$ss[test_id]?>" <?php if($ss[test_id]==$dsbj[test_id]){echo "selected";}?> > <?=$ss[test_name]?></option>
              <?php
                }
              ?>
          </select>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Question </strong></td>
        <td width="" height="32">
          <input name="ques" value="<?=$dsbj[que_desc]?>" type="text" id="subname" required>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Answer 1 </strong></td>
        <td width="" height="32">
          <input name="ans1" value="<?=$dsbj[ans1]?>" type="text" id="subname" required>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Answer 2 </strong></td>
        <td width="" height="32">
          <input name="ans2" value="<?=$dsbj[ans2]?>" type="text" id="subname" required>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Answer 3 </strong></td>
        <td width="" height="32">
          <input name="ans3" value="<?=$dsbj[ans3]?>" type="text" id="subname" required>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Answer 4 </strong></td>
        <td width="" height="32">
          <input name="ans4" value="<?=$dsbj[ans4]?>" type="text" id="subname" required>
        </td>
      </tr>

      <tr>
        <td colspan="2"><input type="submit" class="myButton" name="btnedit" value="UPDATE"></td>
      </tr>
    </table>
  </form>
  <?php
  if(isset($_POST[btnedit])){
    $test   = $_POST[test];
    $ques   = $_POST[ques];
    $ans1   = $_POST[ans1];
    $ans2   = $_POST[ans2];
    $ans3   = $_POST[ans3];
    $ans4   = $_POST[ans4];

      $Q = mysql_query("UPDATE mst_question SET test_id = '$test', que_desc='$ques', 
                        ans1='$ans1',ans2='$ans2',ans3='$ans3',ans4='$ans4'
                        WHERE que_id='$_GET[id]'") or die(mysql_error());
        if($Q){
          echo "<script>alert('Data baru berhasil disimpan..');
          window.location=('?page=quest')</script>";
        }else{
          echo "<script>alert('Gagal menyimpan data!');
          window.location=('?page=quest')</script>";
        } 
    }
  
  ?>

<?php }?>

<!-- </div> -->

<!--KONFIRMASI HAPUS JS-->
<script type="text/javascript">
function confirmDelete(delUrl) {
  if (confirm("Yakin ingin menghapus data ini...? Data tidak dapat dikembalikan setelah dihapus")) {
    document.location = delUrl;
  }
}
</script>
<!--END KONFIRMASI HAPUS JS-->