<?php

include '../koneksi.php';

if(isset($_GET['id_detail'])){
	$sql = "DELETE FROM `tbl_receipt_detail` WHERE `id_detail`='$_GET[id_detail]'";
	$query = mysql_query($sql);
	echo"<script>alert('Data Berhasil di Hapus');document.location.href='receipt_detail.php';</script>";
}else{
	echo"<script>alert('Gagal Hapus Data');document.location.href='receipt_detail.php';</script>";
}
?>