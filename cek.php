<?php
include("database.php");



$AK = mysql_query("SELECT * FROM mst_valueakred WHERE id_knowledge = '".$hajur[$i][id]."' ");
				while ($akred = mysql_fetch_array($AK)) {
					if($akhir >= $akred[bawah_akre]){
						$akreditasi = 'C';
					}elseif(($akhir >= $akred[bawah_akre]+1) || ($akhir == $akred[tengah_akre]))  {
						$akreditasi = 'B';
					}elseif (($akhir >= $akred[tengah_akre]+1) || ($akhir == $akred[atas_akre])) {
						$akreditasi = 'A';
					}
				}
 echo $akreditasi;
?>