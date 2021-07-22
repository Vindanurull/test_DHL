<?php
include'../koneksi.php';						// 2.MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
if ($_POST) {									//PROSES INPUT
	$id_header 		= $_POST['id_header'];
	$receipt_no 	= $_POST['receipt_no'];
	$receipt_date 	= $_POST['receipt_date'];
	$supplier_name	= $_POST['supplier_name'];
												//sql insert untuk menambahkan data
		$sql = "INSERT INTO `tbl_receipt_header`(`id_header`,`receipt_no`,`receipt_date`,`supplier_name`) VALUES ('$id_header','$receipt_no','$receipt_date','$supplier_name')";
    	if(mysql_query($sql)){
        echo"<script>alert('Data Berhasil di Tambah');document.location.href='receipt_header.php';</script>";
    	}else{
        echo"<script>alert('Gagal Tambah Data');document.location.href='input.php';</script>";
    	}
}
?>
<html>																<!-- text form -->
	<head>															<!-- tulisan header -->
		<div class="blog">
          <div class="conteudo">
            <h1>Tambah Receipt Header</h1>
	</head>
	<body>															<!-- 1. MEMBUAT FORM-->
		<form action="input.php" method="POST">						
		<table width="40%" align="center">							<!-- deskripsi ukuran table -->
			<tr>													<!-- form baris pertama -->
				<td width="5%">Id Header</td>
				<td width="1%">:</td>
				<td width="25%">
					<input type="text" name="id_header"> </td>
			</tr>
			<tr>													<!-- form baris Kedua -->
				<td width="5%">Receipt No</td>
				<td>:</td>
				<td width="25%">
					<input type="text" name="receipt_no"> </td>
			</tr>
			<tr>													<!-- form baris ketiga -->
				<td width="5%">Receipt Date</td>
				<td>:</td>
				<td width="25%"> 
					<input type="Date" name="receipt_date"> </td>
			</tr>
			<tr>													<!-- form baris Keempat -->
				<td width="5%">Supplier Name</td>
				<td>:</td>
				<td width="25%">
					<input type="text" name="supplier_name"> </td>
			</tr>
			<tr>													<!-- button tambah -->	
				<td colspan="3" height="30" align="right">	<!--utk menggabungkan beberapa tabel -->
				<input type="submit" name="button" value="Tambah">
				</td>
			</tr>
		</table>
		</form>
		<a href="receipt_header.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>							<!-- BUTTON KEMBALI -->
	</body>
</html>