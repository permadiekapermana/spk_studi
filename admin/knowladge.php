<html>
<head>
	<title></title>
	<style>
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
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #4CAF50;
	  color: white;
	}
	</style>
</head>
<body>
 <?php 
    include("../database.php");
    $page=$_GET[page];  
    $sub = $_GET[sub];
 	//jika halaman knowledge di akses maka menampilkan data 
 	if($page=="knowladge" && $sub==""){
 	
 	
 ?>
	<span style="font-size:18px; font-weight:bold;">KNOWLADGE </span> <a href="?page=knowladge&sub=tambah"><button class="button1" >Tambah</button></a><br><br>
	<table id="customers">
	  <tr>
	    <th>No</th>
	    <th>Jurusan</th>
	    <th>Test 1</th>
	    <th>Test 2</th>
	    <th>Test 3</th>
	    <th>Act</th>
	  </tr>

	  <?php //tampilkan data
	   $Qkn= mysql_query("SELECT * FROM mst_knowledge")or die(mysql_error());
	   while ($data =mysql_fetch_array($Qkn)) { $no++;?>
		  <tr>
		    <td><?=$no;?></td>
		    <td><?=$data[jurusan_know];?></td>
		    <td><?php $none = mysql_fetch_array(mysql_query("SELECT test_name FROM mst_test WHERE test_id='$data[NLsub1_know]' ")); echo $none[test_name];?></td>
		    <td><?php $none = mysql_fetch_array(mysql_query("SELECT test_name FROM mst_test WHERE test_id='$data[NLsub2_know]' ")); echo $none[test_name];?></td>
		    <td><?php $none = mysql_fetch_array(mysql_query("SELECT test_name FROM mst_test WHERE test_id='$data[NLsub3_know]' ")); echo $none[test_name];?></td>
		  	<td>
		  		<a href="?page=knowladge&sub=edit&id=<?php echo $data[id_knowledge]?>"><img src="../image/edit.png" width="20px" title="edit data"></a> &nbsp;
		  		<a href="javascript:confirmDelete('delete.php?form=know&delid=<?=$data[id_knowledge]?>')"><img src="../image/del.png" width="20px" title="hapus"></a>
		  	</td>
		  </tr>
	  <?php } $no=1;?>

  	</table>

  <!-- untuk tambah data  -->
  <?php }elseif ($page=="knowladge" && $sub=="tambah") {?>
  <form action="" method="POST">
  	<table width="100%" border="0" cellpadding="5">
  		<tr>
  			<td width="130">Nama Jurusan</td>
  			<td>: <input type ="text" name="jurusan" placeholder="Nama Jurusan" required></td>
  		</tr>
		  <?php
          $pel="KNOW.";
          $y=substr($pel,0,4);
          $query=mysql_query("select * from mst_knowledge where substr(id_knowledge,1,4)='$y' order by id_knowledge desc limit 0,1");
          $row=mysql_num_rows($query);
          $data=mysql_fetch_array($query);
          if ($row>0){
          $no=substr($data['id_knowledge'],-6)+1;}
          else{
          $no=1;
          }
          $nourut=1000000+$no;
          $nopel=$pel.substr($nourut,-6);
          echo"
           <td><input type='hidden' value='$nopel' name='id_knowledge'></td>
          ";
          ?>
  		<tr>
  			<td>Test Pertama</td>
  			<td>:
	  			<select name="test1" required> <option value="">Pilih Test Pertama</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
		  					echo "<option value='$Qsldata[test_id]' >$Qsldata[test_name]</option>";
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>Test Kedua</td>
  			<td>:
  				<select name="test2" required> <option value="">Pilih Test Kedua</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
		  					echo "<option value='$Qsldata[test_id]' >$Qsldata[test_name]</option>";
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>Test Ketiga</td>
  			<td>:
  				<select name="test3" required> <option value="">Pilih Test Ketiga</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
		  					echo "<option value='$Qsldata[test_id]' >$Qsldata[test_name]</option>";
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td colspan="2">
  				<input type="submit" value="SIMPAN" name="btnsimpan">
  			</td>
  		</tr>
  	</table>
  	</form>
  	<?php
  		
  		if(isset($_POST[btnsimpan])){
  			$jurusan =  $_POST[jurusan];
  			$test1   =  $_POST[test1];
  			$test2   =  $_POST[test2];
  			$test3   =  $_POST[test3];

  			$Q = mysql_query("INSERT INTO mst_knowledge
  							 VALUES('$id_knowledge','$jurusan','$test1','$test2 ','$test3')");
  			if($Q){
  				echo "<script>alert('Data baru berhasil disimpan..');
  				window.location=('?page=knowladge')</script>";
  			}else{
  				echo "<script>alert('Gagal menyimpan data!');
  				window.location=('?page=knowladge&sub=tambah')</script>";
  			}		
  		}

  	?>
  <?php }elseif ($page=="knowladge" && $sub=="edit") { 
  	$QE = mysql_query("SELECT * FROM mst_knowledge WHERE id_knowledge='$_GET[id]'")or die(mysql_error());
  	$de = mysql_fetch_array($QE);
  //edit data?>

  	<form action="" method="POST">
  	<table width="100%" border="0" cellpadding="5">
  		<tr>
  			<td width="130">Nama Jurusan</td>
  			<td>: <input type ="text" name="jurusan" placeholder="Nama Jurusan" value="<?=$de[jurusan_know]?>" required></td>
  		</tr>
  		<tr>
  			<td>Test Pertama</td>
  			<td>:
	  			<select name="test1" required> <option value="">Pilih Test Pertama</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
					?>
		  				<option value='<?=$Qsldata[test_id]?>' <?php if($Qsldata[test_id]==$de[NLsub1_know]){echo "selected";}?> ><?=$Qsldata[test_name]?></option>

		  			<?php
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>Test Kedua</td>
  			<td>:
  				<select name="test2" required> <option value="">Pilih Test Kedua</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
					?>
		  				<option value='<?=$Qsldata[test_id]?>' <?php if($Qsldata[test_id]==$de[NLsub2_know]){echo "selected";}?> ><?=$Qsldata[test_name]?></option>

		  			<?php
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>Test Ketiga</td>
  			<td>:
  				<select name="test3" required> <option value="">Pilih Test Ketiga</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_test ORDER BY test_name ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
					?>
		  				<option value='<?=$Qsldata[test_id]?>' <?php if($Qsldata[test_id]==$de[NLsub3_know]){echo "selected";}?> ><?=$Qsldata[test_name]?></option>

		  			<?php
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td colspan="2">
  				<input type="submit" value="UPDATE" name="btnedit">
  			</td>
  		</tr>
  	</table>
  	</form>
  	<?php
  		
  		if(isset($_POST[btnedit])){
  			$jurusan =  $_POST[jurusan];
  			$test1   =  $_POST[test1];
  			$test2   =  $_POST[test2];
  			$test3   =  $_POST[test3];

  			$Q = mysql_query("UPDATE mst_knowledge SET jurusan_know='$jurusan',
  							  NLsub1_know='$test1',
  							  NLsub2_know='$test2 ',
  							  NLsub3_know='$test3' WHERE id_knowledge='$_GET[id]'")or die(mysql_error());
  			if($Q){
  				echo "<script>alert('Data baru berhasil disimpan..');
  				window.location=('?page=knowladge')</script>";
  			}else{
  				echo "<script>alert('Gagal menyimpan data!');
  				window.location=('?page=knowladge&sub=edit')</script>";
  			}		
  		}

  	?>
  <?php }?>
  <!-- end tambah data -->
</body>
</html>

<!--KONFIRMASI HAPUS JS-->
<script type="text/javascript">
function confirmDelete(delUrl) {
  if (confirm("Yakin ingin menghapus data ini...? Data tidak dapat dikembalikan setelah dihapus")) {
    document.location = delUrl;
  }
}
</script>
<!--END KONFIRMASI HAPUS JS-->