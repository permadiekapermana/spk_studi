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

</style>
<!-- <div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left"> -->

<?php if($page=="test" && $sub==""){?>
    <span style="font-size:18px; font-weight:bold;">ADD TEST </span> 
    <a href="testadd.php"><button class="button1" >Tambah</button></a>
<?php }elseif($page=="test" && $sub=="edit"){?>
    <span style="font-size:18px; font-weight:bold;">EDIT TEST </span> 
<?php } ?>
<br><br>
<?php if($page=="test" && $sub==""){ ?>
<!-- form tampil data -->
<table id="customers">
    <tr>
      <th width="30">No</th>
      <th>Subject</th>
      <th>Test</th>
      <th>Total</th>
      <th width="100">Act</th>
    </tr>
    <?php 
      $qt = mysql_query("SELECT * FROM mst_test,mst_subject WHERE mst_test.sub_id=mst_subject.sub_id ORDER BY sub_name ASC");
      while ($sbj = mysql_fetch_array($qt)) { $no++;
    ?>
    <tr>
      <td  align="center"><?=$no?></td>
      <td><?=$sbj[sub_name]?></td>
      <td><?=$sbj[test_name]?></td>
      <td><?=$sbj[total_que]?></td>
      <td  align="center">
          <a href="?page=test&sub=edit&id=<?php echo $sbj[test_id]?>"><img src="../image/edit.png" width="20px" title="edit data"></a> &nbsp;
          <a href="javascript:confirmDelete('delete.php?form=test&delid=<?=$sbj[test_id]?>')"><img src="../image/del.png" width="20px" title="hapus"></a>
      </td>
    </tr>
    <?php  } $no=1;?>

</table>
<?php }elseif($page=="test" && $sub=="edit") {
  $qe = mysql_query("SELECT * FROM mst_test,mst_subject WHERE mst_test.sub_id=mst_subject.sub_id AND mst_test.test_id='$_GET[id]'");
  $dsbj = mysql_fetch_array($qe);
?>
<!-- Form tambah subjet -->
  <form name="form1" method="POST" action="" >
    <table width="100%"  border="0">
      <tr>
        <td width="250" height="32"><strong>Enter Subject ID </strong></td>
        <td width="" height="32">
          <select name="subject">
              <?php
                $S = mysql_query("SELECT * FROM mst_subject order by sub_name");
                while ($ss = mysql_fetch_array($S)) {
              ?>
                <option value="<?=$ss[sub_id]?>" <?php if($ss[sub_id]==$dsbj[sub_id]){echo "selected";}?> > <?=$ss[sub_name]?></option>
              <?php
                }
              ?>
          </select>
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Test Name </strong></td>
        <td width="" height="32">
          <input name="test" value="<?=$dsbj[test_name]?>" type="text" id="subname">
        </td>
      </tr>

      <tr>
        <td width="250" height="32"><strong>Enter Total Question </strong></td>
        <td width="" height="32">
          <input name="total" value="<?=$dsbj[total_que]?>" type="number" id="subname">
        </td>
      </tr>

      <tr>
        <td colspan="2"><input type="submit" class="myButton" name="btnedit" value="UPDATE"></td>
      </tr>
    </table>
  </form>
  <?php
  if(isset($_POST[btnedit])){
    $subject = $_POST[subject];
    $test = $_POST[test];
    $total = $_POST[total];

      $Q = mysql_query("UPDATE mst_test SET sub_id = '$subject', test_name='$test', total_que='$total'
                        WHERE test_id='$_GET[id]'") or die(mysql_error());
        if($Q){
          echo "<script>alert('Data baru berhasil disimpan..');
          window.location=('?page=test')</script>";
        }else{
          echo "<script>alert('Gagal menyimpan data!');
          window.location=('?page=test')</script>";
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