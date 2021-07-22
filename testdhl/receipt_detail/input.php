<?php
include '../koneksi.php';
if($_POST){                                                   //proses tambah
  $id_detail = $_POST['id_detail'];
  $id_header = $_POST['id_header'];
  $item_code = $_POST['item_code'];
  $quantity = $_POST['quantity'];
  $batch = $_POST['batch'];

    $sql = "INSERT INTO `tbl_receipt_detail`(`id_detail`,`id_header`,`item_code`,`quantity`,`batch`) VALUES ('$id_detail','$id_header','$item_code','$quantity','$batch')";
    if(mysql_query($sql)){
        echo"<script>alert('Data Berhasil di Tambah');document.location.href='receipt_detail.php';</script>";
    }else{
        echo"<script>alert('Gagal Tambah Data');document.location.href='input.php';</script>";
    }
}
?>
<html>
<body>
  <div class="wrap">
    <nav class="menu">                                          <!-- bagian menu     -->
      <ul>
        <li><a href="../index.php">Beranda</a></li>
        <li><a href="../item_master/item_master.php">Item Master</a></li>
        <li><a href="../receipt_header/receipt_header.php">Receipt Header</a></li>
        <li><a href="receipt_detail.php">Receipt Detail</a></li>
      </ul>
    </nav>                                                      <!-- akhir bagian menu -->
    <div class="blog">                                          <!-- bagian konten Blog -->
      <div class="conteudo">
        <h1>Tambah Detail</h1>
        <hr>
        <p>
    <form action="input.php" method="POST">   <!-- DATABASE -->
      <table width="50%" align="center">
              <tr>
                <td width="5%">Id Detail</td>
                <td width="1%" >:</td>
                <td width="2%">
                  <input type="text" name="id_detail" id="id_detail" style="width: 500px;height: 30px;"/></td>
              </tr>
              <tr>
                <td width="5%">Id Header</td>
                <td width="1%" >:</td>
                <td width="25%">
                 <select name="id_header" id="id_header" onchange="changeValue(this.value)" style="width: 500px;height: 30px;">
                      <option>Pilih Id header ...</option>
                      <option></option>
                      <?php

                      // GET DATA DARI TABEL RECEIPT HEADER
                      $sql_j=mysql_query("select * from tbl_receipt_header ORDER BY id_header");
                      while($data=mysql_fetch_array($sql_j)):
                      echo "<option value=".($data['id_header'])."> ".($data['id_header'])." / ".($data['supplier_name'])." </option>";
                      endwhile
                      ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td width="5%">Item Code</td>
                <td width="1%" >:</td>
                <td width="25%">
                 <select name="item_code" id="item_code" onchange="changeValue(this.value)" style="width: 500px;height: 30px;">
                      <option>Pilih Item Code ...</option>
                      <option></option>
                      <?php

                      // GET DATA DARI TABEL ITEM MASTER
                      $sql_j=mysql_query("select * from tbl_item_master ORDER BY item_code");
                      while($data=mysql_fetch_array($sql_j)):
                      echo "<option value=".($data['item_code'])."> ".($data['item_code'])." / ".($data['item_desc'])." </option>";
                      endwhile
                      ?>
                    </select>
                </td>
              </tr>
                   <tr>
                <td width="5%">Quantity</td>
                <td width="1%" >:</td>
                <td width="25%">
                  <input type="text" name="quantity" id="quantity" style="width: 500px;height: 30px;"/></td>
              </tr>
                 <tr>
                <td width="5%" >Batch</td>
                <td width="1%" >:</td>
                <td width="25%">
                  <input type="text" name="batch" id="batch" style="width: 500px;height: 30px;"/></td>
              </tr>
              <tr>
                <td colspan="3" height="50" align="right">
                  <input type="submit" name="button" id="button" value="Tambah" />
                </td>
              </tr>
            </table>
            </form>                                 <!-- DATABASE -->
        </p>
        <a href="receipt_detail.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>
      </div>
    </div>                                <!-- akhir bagian konten Blog -->
  </div>
</body>
</html>