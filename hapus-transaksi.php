<?php
include 'controler.php';
$id_transaksi = (int)$_GET['id_transaksi'];

if (hapus_transaksi($id_transaksi) > 0) {
    echo "<script>
                alert('Berhasil Menghapus Transaksi!');
                 document.location.href = 'pesanan.php';
            </script>";
} else {
    echo "<script>
                alert('Tidak Bisa Menhapus Transaksi!');
                document.location.href = 'pesanan.php';
            </script>";
}
