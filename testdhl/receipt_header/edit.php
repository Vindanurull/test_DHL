<?php
include '../koneksi.php';                                   //koneksi database
if($_POST){                                                 //proses edit
  $receipt_no = $_POST['receipt_no'];
  $receipt_date = $_POST['receipt_date'];
  $supplier_name = $_POST['supplier_name'];

   $sql = "UPDATE `tbl_receipt_header` SET `receipt_no`='$receipt_no',`receipt_date`='$receipt_date',`supplier_name`='$supplier_name' WHERE `id_header`='$_GET[id_header]'";

    if(mysql_query($sql)){
       echo"<script>alert('Data Berhasil di Ubah');document.location.href='receipt_header.php';</script>";
    }
    else{
       echo"<script>alert('Gagal Ubah Data');document.location.href='edit.php?id_header=$_GET[id_header];</script>";
    }
}

if(isset($_GET['id_header'])){
    $id_header = $_GET['id_header'];
    $sql = "SELECT * FROM `tbl_receipt_header` WHERE `id_header`='$id_header'";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) > 0){
        while ($row = mysql_fetch_array($query)) {
          $receipt_no = $row['receipt_no'];
          $receipt_date = $row['receipt_date'];
          $supplier_name = $row['supplier_name'];

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
            <form id="form1" name="form1" method="post" action="edit.php?id_header=<?php echo $_GET['id_header']; ?>">
            <table width="500" border="0" align="center">
              <tr>
                <td height="30">Receipt No</td>
                <td >:</td>
                <td ><input type="text" name="receipt_no" id="receipt_no" value="<?php echo $receipt_no;?>"/></td>
              </tr>
              <tr>
                <td height="30">Receipt Date</td>
                <td >:</td>
                <td ><input type="Date" name="receipt_date" id="receipt_date" value="<?php echo $receipt_date;?>"/>
                </td>
              </tr>
              <tr>
                <td height="30">Supplier Name</td>
                <td >:</td>
                <td ><input type="text" name="supplier_name" id="supplier_name" value="<?php echo $supplier_name;?>"/></td>
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
        <a href="receipt_header.php" style="text-decoration: none;"><button style="width: 10%; font-size: 16px;">Kembali</button></a>
      </div>
    </div>
    <!-- akhir bagian konten Blog -->
  </div>
 
</body>
</html>