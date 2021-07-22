<?php
include '../koneksi.php';							//MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
if(isset($_GET['id_header'])){						//Nggate id utk proses hapus
	$sql = "DELETE FROM `tbl_receipt_header` WHERE `id_header`='$_GET[id_header]'";
	$query = mysql_query($sql);
	echo"<script>alert('Data Berhasil di Hapus');document.location.href='receipt_header.php';</script>";
}else{												//jika data tidak bisa dihapus
	echo"<script>alert('Gagal Hapus Data');document.location.href='receipt_header.php';</script>";
}
?>