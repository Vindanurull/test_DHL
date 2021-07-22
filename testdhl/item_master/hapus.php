<?php
include '../koneksi.php';							//MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
if(isset($_GET['item_code'])){						//Nggate id utk proses hapus
	$sql = "DELETE FROM `tbl_item_master` WHERE `item_code`='$_GET[item_code]'";
	$query = mysql_query($sql);
	echo"<script>alert('Data Berhasil di Hapus');document.location.href='item_master.php';</script>";
}else{												//jika data tidak bisa dihapus
	echo"<script>alert('Gagal Hapus Data');document.location.href='item_master.php';</script>";
}
?>