<?php

include '../koneksi.php';
date_default_timezone_set("Asia/Jakarta");

//proses edit
if($_POST){
  $id_header = $_POST['id_header'];
  $item_code = $_POST['item_code'];
  $quantity = $_POST['quantity'];
  $batch = $_POST['batch'];

   $sql = "UPDATE `tbl_receipt_detail` SET `id_header`='$id_header',`item_code`='$item_code',`quantity`='$quantity',`batch`='$batch' WHERE `id_detail`='$_GET[id_detail]'";

    if(mysql_query($sql)){
       echo"<script>alert('Data Berhasil di Ubah');document.location.href='receipt_detail.php';</script>";
    }
    else{
       echo"<script>alert('Gagal Ubah Data');document.location.href='edit.php?id_detail=$_GET[id_detail];</script>";
    }
}

if(isset($_GET['id_detail'])){
    $id_detail = $_GET['id_detail'];
    $sql = "SELECT * FROM `tbl_receipt_detail` WHERE `id_detail`='$id_detail'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0){
        while ($row = mysql_fetch_array($query)) {
          $id_header = $row['id_header'];
          $item_code = $row['item_code'];
          $quantity = $row['quantity'];
          $batch = $row['batch'];

        }
    }else{
        echo "Not Found";
        die();
    }
}else{
    die();
}
?>

<body>
<html>
<head>
  <title>Technical</title>
  <link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>

    <!-- bagian konten Blog -->
    <div class="blog">
      <div class="conteudo">
        <h1>Ubah Receipt Header</h1>
        <hr>
        <p>
          <!-- DATABASE -->
            <form id="form1" name="form1" method="post" action="edit.php?id_detail=<?php echo $_GET['id_detail']; ?>">
            <table width="500" border="1" align="center">
              <tr>
                <td width="20%" height="50">Id Header</td>
                <td width="10%" >:</td>
                <td width="50%">
                  <select name="id_header" id="id_header" onchange="changeValue(this.value)" style="width: 500px;height: 30px;">
                      <option value="<?= $id_header;?>"><?= $id_header;?></option>
                      <option></option>
                      <?php
                      $sql_j=mysql_query("select * from tbl_receipt_header ORDER BY id_header");
                      while($data=mysql_fetch_array($sql_j)):
                      echo "<option value=".($data['id_header'])."> ".($data['id_header'])." / ".($data['supplier_name'])." </option>";   
                      endwhile
                      ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td width="20%" height="50">Item Code</td>
                <td width="10%" >:</td>
                <td width="50%">
                  <select name="item_code" id="item_code" onchange="changeValue(this.value)" style="width: 500px;height: 30px;">
                      <option value="<?= $item_code;?>"><?= $item_code;?></option>
                      <option></option>
                      <?php
                      $sql_j=mysql_query("select * from tbl_item_master ORDER BY item_code");
                      while($data=mysql_fetch_array($sql_j)):
                      echo "<option value=".($data['item_code'])."> ".($data['item_code'])." / ".($data['item_desc'])." </option>";   
                      endwhile
                      ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td height="30">Quantity</td>
                <td >:</td>
                <td ><input type="text" name="quantity" id="quantity" value="<?php echo $quantity;?>"/></td>
              </tr>
              <tr>
                <td height="30">Batch</td>
                <td >:</td>
                <td ><input type="text" name="batch" id="batch" value="<?php echo $batch;?>"/></td>
              </tr>
              <tr>
                <td colspan="3" height="50" align="right">
                  <input type="submit" name="button" id="button" value="Ubah" />
                </td>
                </tr>
            </table>
            </form>
          <!-- DATABASE -->
        </p>
        <a href="receipt_detail.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>
      </div>
    </div>
    <!-- akhir bagian konten Blog -->
  </div>
 
</body>
</html>