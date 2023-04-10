<?php
include "koneksi.php";
$id = $_GET ['id'];
$query = mysqli_query($koneksi, "delete from transaksi where id = '$id'");
echo "<script>window.location = '?page=transaksi/index';</script>";
?>