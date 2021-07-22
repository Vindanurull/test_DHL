<?php
include'../koneksi.php';						// 2.MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
if ($_POST) {									//PROSES INPUT
	$item_code = $_POST['item_code'];
	$item_desc = $_POST['item_desc'];
	$item_unit = $_POST['item_unit'];
	$item_price = $_POST['item_price'];
												//sql insert untuk menambahkan data
		$sql = "INSERT INTO `tbl_item_master`(`item_code`,`item_desc`,`item_unit`,`item_price`) VALUES ('$item_code','$item_desc','$item_unit','$item_price')";
    	if(mysql_query($sql)){
        echo"<script>alert('Data Berhasil di Tambah');document.location.href='item_master.php';</script>";
    	}else{
        echo"<script>alert('Gagal Tambah Data');document.location.href='input.php';</script>";
    	}
}
?>
<html>																<!-- text form -->
	<head>															<!-- tulisan header -->
		<div class="blog">
          <div class="conteudo">
            <h1>Tambah Item Master</h1>
	</head>
	<body>															<!-- 1. MEMBUAT FORM-->
		<form action="input.php" method="POST">						
		<table width="40%" align="center">							<!-- deskripsi ukuran table -->
			<tr>													<!-- form baris pertama -->
				<td width="5%">Item Code</td>
				<td width="1%">:</td>
				<td width="25%">
					<input type="text" name="item_code"> </td>
			</tr>
			<tr>													<!-- form baris Kedua -->
				<td width="5%">Item Description</td>
				<td>:</td>
				<td width="25%">
					<input type="text" name="item_desc"> </td>
			</tr>
			<tr>													<!-- form baris ketiga -->
				<td width="5%">Item Unit</td>
				<td>:</td>
				<td width="25%"> 
					<input type="text" name="item_unit"> </td>
			</tr>
			<tr>													<!-- form baris Keempat -->
				<td width="5%">Item Price</td>
				<td>:</td>
				<td width="25%">
					<input type="text" name="item_price"> </td>
			</tr>
			<tr>													<!-- button tambah -->	
				<td colspan="3" height="30" align="right">	<!--utk menggabungkan beberapa tabel -->
				<input type="submit" name="button" value="Tambah">
				</td>
			</tr>
		</table>
		</form>
		<a href="item_master.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>							<!-- BUTTON KEMBALI -->
	</body>
</html>