<?php											// 3. koneksi mysql,dgn localhost	dan username root
$con=mysql_connect("localhost","root","");
$db=mysql_select_db("technical");
if (!$con) {
	echo "Tidak dapat terkoneksi ke server";
}
if (!$db) {
	echo "Database tidak ada";
}
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'technical', 'root', '');
?>