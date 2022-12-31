<?php
include 'connect.php';

$id_produk = $_GET['id'];

$sql1 = mysqli_query($conn, "SELECT * FROM `produk_user` WHERE id_produk = '$id_produk'");
$row1 = mysqli_fetch_array($sql1);

$kategori_barang = $_POST['tkategori_barang'];
$sql2 = mysqli_query($conn, "SELECT * FROM kategori_barang where nama_kategori = '$kategori_barang'");
$row2 = mysqli_fetch_array($sql2);


$id_kategori = $row2['id_kategori'];
$nama_produk = $_POST['tnama_produk'];
$harga = $_POST['tharga'];
$stok = $_POST['tstok'];
$kondisi = $_POST['tkondisi'];
$bahan = $_POST['tbahan'];
$merek = $_POST['tmerk'];
$ukuran = $_POST['tukuran'];
$motif = $_POST['tmotif'];
$berat = $_POST['tberat'];
$deskripsi = $_POST['tdeskripsi'];

$sql3 = mysqli_query($conn, "UPDATE `produk_user` SET `id_kategori`='$id_kategori',`nama_produk`='$nama_produk',`harga`='$harga',`stok`='$stok',`kondisi`='$kondisi',`bahan`='$bahan',`merek`='$merek',`ukuran`='$ukuran',`motif`='$motif',`berat`='$berat',`deskripsi`='$deskripsi' WHERE id_produk = '$id_produk'");

header('location:produk-saya.php');

?>