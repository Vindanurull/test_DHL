<?php
include'../koneksi.php';							//MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
?>
<html>
<head>
	<script type="text/javascript" language="JavaScript">			//notifikasi untuk HAPUS DATA
		function konfirmasi() {										
	 		tanya = confirm("Hapus data ini ?");
	 		if (tanya == true) return true;
	 		else return false;
	 		}
	</script>
</head>
	<body>
		<div class="wrap">
		    <!-- bagian menu     -->
		    <nav class="menu">		      
		      	<table border="1" width="50%" height="8%" align="center" >
		      		<tr align="center">
		      			<ul>
		        <td><li><a href="item_master.php">Item Master</a></li></td>
		        <td><li><a href="../receipt_header/receipt_header.php">Receipt Header</a></li></td>
		        <td><li><a href="../receipt_detail/receipt_detail.php">Receipt Detail</a></li></td>
		      	<td><li><a href="../Kwitansi.php">Kwitansi</a></li></td>
		      			</ul>
		      		</tr>
		      	</table>
		    </nav>
		<div class="blog">
      	<div class="conteudo">
		    <h1>Item Master</h1>									<!-- header atas -->
		    <hr>													<!-- Button TAMBAH DATA -->
		        <a href="input.php" style="text-decoration: none;"><button style="width: 15%; font-size: 16px;">Tambah Data</button></a>
		<table border="1" width="40%" align="center">			<!-- 4.MEMBUAT COLOUM utk VIEW -->
			<tr align="center">
				<td><b>No</b></td>
				<td><b>Item Code</b></td>
				<td><b>Item Description</b></td>
				<td><b>Item Unit</b></td>
				<td><b>Item Price</b></td>
			</tr>
<?php											//5.MEMBUAT PENGULANGAN YG AKAN MENAMPILKAN DATABASE
	$no = 0;
	$sql = "SELECT * FROM `tbl_item_master`";
    $query = mysql_query($sql);
		while ($row = mysql_fetch_array($query)){
	$no++;												//berisikan button UBAH dan HAPUS
		echo "<tr>";
			echo "<td align=center>".$no.".</td>";
			echo "<td align=center>".($row['item_code'])."</td>";
			echo "<td align=center>".($row['item_desc'])."</td>";
			echo "<td align=center>".($row['item_unit'])."</td>";
			echo "<td align=center>".($row['item_price'])."</td>";
			echo '<td align=center>
				<a href="edit.php?item_code='.$row['item_code'].'"><button>Ubah</button></a>
				<a onclick="return konfirmasi()" href="hapus.php?item_code='.$row['item_code'].'"><button>Hapus</button></a> </td>';
	    echo "</tr>";
    	}
?>
		</table>
	</div>
</div>
</body>
</html>