<?php
include 'controler.php';
$id_barang = (int)$_GET['id_produk'];

if (hapus_barang($id_barang) > 0) {
    echo "<script>
                alert('Berhasil Menghapus Produk!');
                 document.location.href = 'produk-buah.php';
            </script>";
} else {
    echo "<script>
                alert('Tidak Bisa Menhapus Produk!');
                document.location.href = 'produk-buah.php';
            </script>";
}
