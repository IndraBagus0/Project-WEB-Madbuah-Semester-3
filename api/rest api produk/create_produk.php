<?php

    include ('koneksi.php');

    $nama_barang = $_POST ['nama_barang'];
    $qty = $_POST ['qty'];
    $harga = $_POST ['harga'];
    $kategori = $_POST ['kategori'];
    $deskripsi = $_POST ['deskripsi'];
    $foto_produk = $_POST ['foto_produk'];

    $query = "INSERT INTO produk  VALUES (NULL,'$nama_barang','$qty' ,'$harga', '$kategori' ,'$deskripsi' ,'$foto_produk') ";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo json_encode( array ('message' => 'created'));
    } else {
        echo json_encode( array ('message' => 'error'));
    }


?>