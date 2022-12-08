<?php

    include ('koneksi.php');

    $query = "SELECT * FROM produk";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $result = array();
        while ($row = mysqli_fetch_array($sql)){
            array_push( $result, array(
                'id barang'=> $row['id_barang'],
                'nama produk'=> $row['nama_barang'],
                'stock'=> $row['qty'],
                'harga'=> $row['harga'],
                'kategori'=> $row['kategori'],
                'deskripsi'=> $row['deskripsi'],
                'gambar'=> $row['foto_produk'],
            ));
        }
    }

    echo json_encode( array ('produk' => $result));


?>