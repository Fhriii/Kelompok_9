<?php
 $koneksi = mysqli_connect(
	"localhost",
	"fahri",
	"1877",
	"db_kelompok9"

 );
 if(mysqli_connect_errno()){
	echo "Koneksi Gagal" .mysqli_connect_error();
	
  }else{
	echo "";
 }
?>
