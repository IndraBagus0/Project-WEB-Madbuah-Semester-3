<?php

    include ('koneksi.php');
    parse_str(file_get_contents('php://input'),$_POST);

    $id_pelanggan = $_POST ['id_pelanggan'];

    $query = "DELETE FROM data_pelanggan WHERE id_pelanggan='$id_pelanggan' ";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo json_encode( array ('message' => 'produck dihapus'));
    } else {
        echo json_encode( array ('message' => 'error'));
    }


?>