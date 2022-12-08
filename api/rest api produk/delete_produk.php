<?php

    include ('koneksi.php');
    parse_str(file_get_contents('php://input'),$_POST);

    $id_barang = $_POST ['id_barang'];

    $query = "DELETE FROM produk WHERE id_barang='$id_barang' ";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo json_encode( array ('message' => 'produck dihapus'));
    } else {
        echo json_encode( array ('message' => 'error'));
    }


?>