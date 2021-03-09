<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz  - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>

<script type="text/javascript">

$(document).ready(function()
	{
		$("#tablemhs").tablesorter();
	}
);
</script>

<style>
	.customers {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 80%;
	}

	.customers td, .customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	.customers tr:nth-child(even){background-color: #f2f2f2;}

	.customers tr:hover {background-color: #ddd;}

	.customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: center;
	  background-color: #4CAF50;
	  color: white;
	}
</style>

</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_SESSION);
$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
t.test_id=r.test_id and r.login='$login'",$cn) or die(mysql_error());

echo "<h1 class=head1> Result </h1>";
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
	exit;
}
echo "<table class='customers' align=center>
		<tr class=style2>
			<td align='center' width=300>Test Name </td> 
			<td align='center'>Total Question </td> 
			<td align='center'>Score</td>";
while($row=mysql_fetch_row($rs))
{
echo "<tr class=style8><td>$row[0] <td align=center> $row[1] <td align=center> $row[3]";
}
echo "</table>";
?>




<?php 
	$uid = $_SESSION[login];
	$hajur = array();
	$Q = mysql_query("SELECT * FROM mst_knowledge ORDER BY jurusan_know ASC");
	while ($jur=mysql_fetch_array($Q)) {
		array_push($hajur, array(
			'jurusan'=> $jur[jurusan_know],
			'id'     => $jur[id_knowledge],
			'nl1'    => $jur[NLsub1_know],
			'nl2'    => $jur[NLsub2_know],
			'nl3'    => $jur[NLsub3_know],
			));
	}

	$jumarr = count($hajur);
	$Result = array();
	$akreditasi='';
	for($i=0; $i<$jumarr; $i++){
		$R = mysql_query("SELECT SUM(score) AS SCC,login FROM mst_result WHERE login='$uid' AND
							 (mst_result.test_id = '".$hajur[$i][nl1]."' OR 
							 mst_result.test_id = '".$hajur[$i][nl2]."' OR  
							 mst_result.test_id = '".$hajur[$i][nl3]."')")or die(mysql_error());
		if(mysql_num_rows($R) >0){
			while ($scr=mysql_fetch_array($R)) {
				$akhir =$scr[SCC]/3;


				$AK = mysql_query("SELECT * FROM mst_valueakred WHERE id_knowledge = '".$hajur[$i][id]."' ");
				while ($akred = mysql_fetch_array($AK)) {
					if( ($akhir >= $akred[bawah_akre] ) && ($akhir < $akred[tengah_akre])){
						$akreditasi = 'C';
					}elseif(($akhir >= $akred[tengah_akre]) && ($akhir < $akred[atas_akre]))  {
						$akreditasi = 'B';
					}elseif ($akhir >= $akred[atas_akre]) {
						$akreditasi = 'A';
					}else {
						$akreditasi = 'Belum Layak';
					}

				}

				array_push($Result, array(
					'idjur'     =>$hajur[$i][id],
					'jurusan'   =>$hajur[$i][jurusan],
					'user'      =>$scr[login],
					'score'     =>$akhir,
					'Akreditasi'=>$akreditasi
					));
			}
		}
		
	}
	//echo json_encode(array($Result));

?>
	<center>
	<br>
    <h3>JURUSAN TERCOCOK</h3>
		<table width="80%" border="1" class="customers" id="tablemhs">
		<thead><tr>
			<th >NO</th>
			<th>Jurusan</th>
			<th width="250">Akreditasi</th>
			<th width="100">Score</th></tr>
		</thead>
		<tbody>
			<?php $jum = count($Result);
				for($a=0; $a<$jum; $a++){ $no++;?>
					<tr>
						<td align="center"><?=$no?></td>
						<td><?=$Result[$a][jurusan]?></td>
						<td align="center"><?=$Result[$a][Akreditasi]?></td>
						<td align="center"><?=substr($Result[$a][score], 0,5)?></td>
					</tr>
			<?php } $no=1;?>
		</tbody>
		</table>
		<br><br>
		Hasil Score terbaik akan muncul setelah anda mengikuti semua test yang tersedia<br>
		Klik pada Header Tabel untuk Mengurutkan Data.
	</center>
	

	<br>
</body>
</html>
