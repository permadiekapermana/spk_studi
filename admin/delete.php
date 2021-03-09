<?php
 include"../database.php";
 $id    = $_GET['delid']; 
 $layer = $_GET['form'];

 if($layer=="know"){
 	$D = mysql_query("DELETE FROM mst_knowledge WHERE id_knowledge = '$id'")or die(mysql_error());
 	if($D){
 		echo "<script>alert('Data telah terhapus..');
  			 window.location=('../admin/login.php?page=knowladge')</script>";
 	}else{
 		echo "<script>alert('Gagal menghapus data');
  			 window.location=('../admin/login.php?page=knowladge')</script>";
 	}

 }elseif($layer=="range"){
 	$D = mysql_query("DELETE FROM mst_valueakred WHERE id_akre = '$id'")or die(mysql_error());
 	if($D){
 		echo "<script>alert('Data telah terhapus..');
  			 window.location=('../admin/login.php?page=range')</script>";
 	}else{
 		echo "<script>alert('Gagal menghapus data');
  			 window.location=('../admin/login.php?page=range')</script>";
 	}
 }elseif($layer=="subject"){
 	$D = mysql_query("DELETE FROM mst_subject WHERE sub_id = '$id'")or die(mysql_error());
 	if($D){
 		echo "<script>alert('Data telah terhapus..');
  			 window.location=('../admin/login.php?page=subject')</script>";
 	}else{
 		echo "<script>alert('Gagal menghapus data');
  			 window.location=('../admin/login.php?page=subject')</script>";
 	}
 }elseif($layer=="test"){
 	$D = mysql_query("DELETE FROM mst_test WHERE test_id = '$id'")or die(mysql_error());
 	if($D){
 		echo "<script>alert('Data telah terhapus..');
  			 window.location=('../admin/login.php?page=test')</script>";
 	}else{
 		echo "<script>alert('Gagal menghapus data');
  			 window.location=('../admin/login.php?page=test')</script>";
 	}
 }elseif($layer=="quest"){
 	$D = mysql_query("DELETE FROM mst_question WHERE que_id = '$id'")or die(mysql_error());
 	if($D){
 		echo "<script>alert('Data telah terhapus..');
  			 window.location=('../admin/login.php?page=quest')</script>";
 	}else{
 		echo "<script>alert('Gagal menghapus data');
  			 window.location=('../admin/login.php?page=quest')</script>";
 	}
 }

?>