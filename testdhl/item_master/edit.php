<?php
include '../koneksi.php';                           //MENGHUBUNGKAN ke DB yg di FILE KONEKSI.PHP
if($_POST){                                         //PROSES EDIT
  $item_desc = $_POST['item_desc'];
  $item_unit = $_POST['item_unit'];
  $item_price= $_POST['item_price'];
    $sql = "UPDATE `tbl_item_master` SET `item_desc`='$item_desc',`item_unit`='$item_unit',`item_price`='$item_price' WHERE `item_code`='$_GET[item_code]'";
      if(mysql_query($sql)){
        echo"<script>alert('Data Berhasil di Ubah');document.location.href='item_master.php';</script>"; }
      else{
        echo"<script>alert('Gagal Ubah Data');document.location.href='edit.php?item_code=$_GET[item_code];</script>"; }
}
if(isset($_GET['item_code'])){                      //mengambil data yang ada sebelumnya utk dirubah
    $item_code = $_GET['item_code'];                //utk item code tdk dapat dirubah
    $sql = "SELECT * FROM `tbl_item_master` WHERE `item_code`='$item_code'";  
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0){                       //data yang akan diubah
        while ($row = mysql_fetch_array($query)) {
          $item_desc = $row['item_desc'];
          $item_unit = $row['item_unit'];
          $item_price = $row['item_price'];
        }
    }else{                                                //jika kemungkinan data tidak dapat dirubah
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
        <div class="blog">                                
          <div class="conteudo">
            <h1>Ubah Item Master</h1>                       <!-- HEADER -->
      <form id="form1" name="form1" method="post" action="edit.php?item_code=<?php echo $_GET['item_code']; ?>">                                   <!-- Proses Form EDIT -->   
        <table width="500" border="0" align="center">
          <tr>
            <td height="30">Item Desc</td>
            <td >:</td>
            <td ><input type="text" name="item_desc" id="item_desc" value="<?php echo $item_desc;?>"/></td>
          </tr>
          <tr>
            <td height="30">Item Unit</td>
            <td >:</td>
            <td ><input type="text" name="item_unit" id="item_unit" value="<?php echo $item_unit;?>"/></td>
          </tr>
          <tr>
            <td height="30">Item Price</td>
            <td >:</td>
            <td ><input type="text" name="item_price" id="item_price" value="<?php echo $item_price;?>"/></td>
          </tr>
          <tr>
            <td colspan="3" height="50" align="right">
              <input type="submit" name="button" id="button" value="Ubah" />
            </td>
          </tr>
        </table>
      </form>
        <a href="item_master.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>                                    <!-- BUTTON KEMBALI -->
      </div>
    </div>
  </div>
</body>
</html>