<?php
include 'koneksi.php';                                //MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
?>
<html>
<body>
  <div class="wrap">                                  <!-- bagian menu     -->
    <nav class="menu">
      <table border="1" width="50%" height="8%" align="center" >
        <tr align="center">
          <ul>
            <td><li><a href="item_master/item_master.php">Item Master</a></li></td>
            <td><li><a href="receipt_header/receipt_header.php">Receipt Header</a></li></td>
            <td><li><a href="receipt_detail/receipt_detail.php">Receipt Detail</a></li></td>
            <td><li><a href="Kwitansi.php">Kwitansi</a></li></td>
          </ul>
        </tr>
      </table>
    </nav>                                            <!-- akhir bagian menu -->
  <div class="blog">                                  <!-- Header -->
    <div class="conteudo">
      <h1>Kwitansi</h1>                              <!-- Tugas nomer.3, tiga tabel menjadi satu -->
        <hr>
          <?php                                        //perintah menggabungkan 3 tabel menjadi satu

            $sql = "SELECT tbl_item_master.item_code, tbl_item_master.item_desc, tbl_item_master.item_price, tbl_receipt_header.id_header, tbl_receipt_header.receipt_no, tbl_receipt_header.receipt_date, tbl_receipt_detail.id_detail, tbl_receipt_detail.quantity, tbl_receipt_detail.batch, tbl_receipt_detail.quantity*tbl_item_master.item_price AS total FROM tbl_receipt_detail JOIN tbl_item_master ON tbl_item_master.item_code = tbl_receipt_detail.item_code JOIN tbl_receipt_header ON tbl_receipt_header.id_header = tbl_receipt_detail.id_header";
            $query = mysql_query($sql);
            $total = mysql_num_fields(mysql_query($sql));       //menampilkan query berdasarkan row
          ?>
        <h3>Total Item : <?= $total; ?></h3>                <!-- tampilan kolom di kwitansi -->
    <table width="100%" border="1" align="center" style="font-size: 14; border-collapse: collapse;">
      <tr align="center">
        <td><b>No</b></td>
        <td><b>Receipt No</b></td>
        <td><b>Receipt Date</b></td>
        <td><b>Item </b></td>
        <td><b>Item Des</b></td>
        <td><b>QTY</b></td>
        <td><b>Bacth</b></td>
        <td><b>Quantity</b></td>
        <td><b>Price</b></td>
        <td><b>Total</b></td>
      </tr>
<?php                                                               //pengulangan untuk berikutnya
  if($total > 0){
    $no = 0;
    while ($row = mysql_fetch_array($query)):
      $no++;
        echo "<tr>";
          echo "<td align=center>".$no.".</td>";
          echo "<td align=center>".$row['receipt_no']."</td>";
          echo "<td align=center>".$row['receipt_date']."</td>";
          echo "<td align=center>".$row['item_code']."</td>";
          echo "<td align=center>".$row['item_desc']."</td>";
          echo "<td align=center>".$row['quantity']."</td>";
          echo "<td align=center>".$row['batch']."</td>";
          echo "<td align=center>".$row['quantity']."</td>";
          echo "<td align=center>".$row['item_price']."</td>";
          echo "<td align=center>".$row['total']."</td>";
        echo "</tr>";
    endwhile;
  }else{                                                  //jika ada kemungkinan data tidak tersedia
        echo "<tr><td colspan=7>Data tidak tersedia</td></tr>"; 
    }
?>
     </table>                                               <!-- AKHIR DATABASE -->
      </div>
    </div>                                                  <!-- akhir bagian konten Blog -->
  </div>
</body>
</html>