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
 	if($page=="range" && $sub==""){
 	
 	
 	?>
	<span style="font-size:18px; font-weight:bold;">VALUE RANGE </span> <a href="?page=range&sub=tambah"><button class="button1" >Tambah</button></a><br><br>
	<table id="customers">
	  <tr>
	    <th>No</th>
	    <th>Jurusan</th>
	    <th>Bawah</th>
	    <th>Tengah</th>
	    <th>Atas</th>
	    <th>Act</th>
	  </tr>

	  <?php //tampilkan data
	   $Qkn= mysql_query("SELECT * FROM mst_valueakred, mst_knowledge WHERE mst_valueakred.id_knowledge=mst_knowledge.id_knowledge")or die(mysql_error());
	   while ($data =mysql_fetch_array($Qkn)) { $no++;?>
		  <tr>
		    <td width="10"><?=$no;?></td>
		    <td><?=$data[jurusan_know];?></td>
		    <td><?=$data[bawah_akre];?></td>
		    <td><?=$data[tengah_akre];?></td>
		    <td><?=$data[atas_akre];?></td>
		    <td width="60">
		  		<a href="?page=range&sub=edit&id=<?php echo $data[id_akre]?>"><img src="../image/edit.png" width="20px" title="edit data"></a> &nbsp;
		  		<a href="javascript:confirmDelete('delete.php?form=range&delid=<?=$data[id_akre]?>')"><img src="../image/del.png" width="20px" title="hapus"></a>
		  	</td>
		  </tr>
	  <?php } $no=1;?>
	</table>

	<?php }elseif ($page=="range" && $sub=="tambah") {?>
  <form action="" method="POST">
  	<table width="100%" border="0" cellpadding="5">
  		<tr>
  			<td width="130">Nama Jurusan</td>
  			<td>: 
  			<select name="jurusan" required> <option value="">Pilih Jurusan</option>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_knowledge ORDER BY jurusan_know ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
		  					echo "<option value='$Qsldata[id_knowledge]'>$Qsldata[jurusan_know]</option>";
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
		  <?php
          $pel="AKRE.";
          $y=substr($pel,0,4);
          $query=mysql_query("select * from mst_valueakred where substr(id_akre,1,4)='$y' order by id_akre desc limit 0,1");
          $row=mysql_num_rows($query);
          $data=mysql_fetch_array($query);
          if ($row>0){
          $no=substr($data['id_akre'],-6)+1;}
          else{
          $no=1;
          }
          $nourut=1000000+$no;
          $nopel=$pel.substr($nourut,-6);
          echo"
           <td><input type='hidden' value='$nopel' name='id_akre'></td>
          ";
          ?>
  		<tr>
  			<td>Nilai Bawah</td>
  			<td>:
	  			<input type="number" name="bawah" required>
  			</td>
  		</tr>
  		<tr>
  			<td>Nilai Tengah</td>
  			<td>:
  				<input type="number" name="tengah" required>
	  			
  			</td>
  		</tr>
  		<tr>
  			<td>Nilai Atas</td>
  			<td>:
  				<input type="number" name="atas" required>
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
	  			$bawah   =  $_POST[bawah];
	  			$tengah  =  $_POST[tengah];
	  			$atas    =  $_POST[atas];

	  			$Q = mysql_query("INSERT INTO mst_valueakred
	  							 VALUES('$id_akre','$jurusan','$bawah','$tengah ','$atas')");
	  			if($Q){
	  				echo "<script>alert('Data baru berhasil disimpan..');
	  				window.location=('?page=range')</script>";
	  			}else{
	  				echo "<script>alert('Gagal menyimpan data!');
	  				window.location=('?page=range&sub=tambah')</script>";
	  			}		
		  	}

	  	?>


    <?php }elseif ($page=="range" && $sub=="edit") {
    	$QE = mysql_query("SELECT * FROM mst_valueakred WHERE id_akre='$_GET[id]'")or die(mysql_error());
  		$de = mysql_fetch_array($QE);

    ?>
	<form action="" method="POST">
  	<table width="100%" border="0" cellpadding="5">
  		<tr>
  			<td width="130">Nama Jurusan</td>
  			<td>: 
  			<select name="jurusan" required>
		  			<?php 
		  				$Qsl =mysql_query("SELECT * FROM mst_knowledge ORDER BY jurusan_know ASC");
						while ($Qsldata = mysql_fetch_array($Qsl)) {
					?>
		  			<option value='<?=$Qsldata[id_knowledge]?>' <?php if($Qsldata[id_knowledge]==$de[id_knowledge]){echo "selected";}?> >
		  			<?=$Qsldata[jurusan_know]?></option>
		  			<?php	
		  				}
		  				
		  			?>
	  			</select>
  			</td>
  		</tr>
  		<tr>
  			<td>Nilai Bawah</td>
  			<td>:
	  			<input type="number" name="bawah" value="<?=$de[bawah_akre]?>" required>
  			</td>
  		</tr>
  		<tr>
  			<td>Nilai Tengah</td>
  			<td>:
  				<input type="number" name="tengah" value="<?=$de[tengah_akre]?>"  required>
	  			
  			</td>
  		</tr>
  		<tr>
  			<td>Nilai Atas</td>
  			<td>:
  				<input type="number" name="atas" value="<?=$de[atas_akre]?>"  required>
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
	  			$bawah   =  $_POST[bawah];
	  			$tengah  =  $_POST[tengah];
	  			$atas    =  $_POST[atas];

	  			$Q = mysql_query("UPDATE mst_valueakred SET
	  							 id_knowledge='$jurusan',
	  							 bawah_akre='$bawah',
	  							 tengah_akre='$tengah ',
	  							 atas_akre='$atas' WHERE id_akre = '$_GET[id]'")or die(mysql_error());
	  			if($Q){
	  				echo "<script>alert('Data baru berhasil disimpan..');
	  				window.location=('?page=range')</script>";
	  			}else{
	  				echo "<script>alert('Gagal menyimpan data!');
	  				window.location=('?page=range')</script>";
	  			}		
		  	}

	  	?>
  	<?php }?>
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