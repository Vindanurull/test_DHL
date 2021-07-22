<?php
include '../koneksi.php';									//koneksi DB
?>
<html>
	<head>
	  <title>Technical</title>
	  <link rel="stylesheet" type="text/css" href="../css/custom.css">
	</head>
	<script type="text/javascript" language="JavaScript">
		function konfirmasi() {
			tanya = confirm("Hapus data ini ?");
		 	if (tanya == true) return true;
		 	else return false;
		}</script>
	<body>
	<div class="wrap">											<!-- bagian menu     -->
	    <nav class="menu">
	       <table border="1" width="50%" height="8%" align="center" >
                <tr align="center">
                    <ul>
                <td><li><a href="../item_master/item_master.php">Item Master</a></li></td>
                <td><li><a href="receipt_header.php">Receipt Header</a></li></td>
                <td><li><a href="../receipt_detail/receipt_detail.php">Receipt Detail</a></li></td>
                <td><li><a href="../Kwitansi.php">Kwitansi</a></li></td>
                    </ul>
                </tr>
            </table>
	    </nav>														<!-- akhir bagian menu -->
  	<div class="blog">
    <div class="conteudo">
        <h1>Receipt Header</h1>
        <hr>
          <a href="input.php" style="text-decoration: none;"><button style="width: 15%; font-size: 16px;">Tambah Data</button></a>
<?php 																	//Database
    $limit = 5;
        if(isset($_GET['page'])){
        $page = anti_injection($_GET['page']);
        }else{
        $page = 1;
        }
    $offset = ($page - 1) * $limit; 
    $sql = "SELECT * FROM `tbl_receipt_header` ORDER BY `id_header` ASC";
    $query = mysql_query($sql." LIMIT $offset, $limit");
    $total = mysql_num_rows(mysql_query($sql));
?>
    <h3>Total Item : <?= $total; ?></h3>
       <table width="100%" border="1" align="center" style="font-size: 14; border-collapse:collapse;">
          	<tr align="center">
            	<td><b>No</b></td>
                <td><b>Id Header</b></td>
                <td><b>Receipt No</b></td>
                <td><b>Receipt Date</b></td>
                <td><b>Supplier Name</b></td>
                <td><b>Aksi</b></td>
           	</tr>
<?php
    if($total > 0){
    $no = ($page - 1) * $limit;
    while ($row = mysql_fetch_array($query)):
    $no++;
        echo "<tr>";
            echo "<td align=center>".$no.".</td>";
            echo "<td align=center>".($row['id_header'])."</td>";
            echo "<td align=center>".($row['receipt_no'])."</td>";
            echo "<td align=center>".($row['receipt_date'])."</td>";
            echo "<td align=center>".($row['supplier_name'])."</td>";
            echo '<td align=center>
                <a href="edit.php?id_header='.$row['id_header'].'"><button>Ubah</button></a>
                <a onclick="return konfirmasi()" href="hapus.php?id_header='.$row['id_header'].'"><button>Hapus</button></a>
                </td>';
        echo "</tr>";
    endwhile;
    }else{
            echo "<tr><td colspan=7>Data tidak tersedia</td></tr>";    }
?>
    </table>							          <!-- DATABASE -->
    </div>
    </div>										<!-- akhir bagian konten Blog -->
  </div>
</body>
</html>