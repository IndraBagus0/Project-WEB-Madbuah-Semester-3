<?php

    include ('koneksi.php');

    
    $nama = $post['nama'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $alamat = $post['alamat'];
    $no_telp = $post['no_telp'];
    $tanggal_gabung = $post['tanggal_gabung'];
    $foto =  $post['foto'];
    

    $query = "INSERT INTO `data_pelanggan` VALUES (NULL, '$nama','$username','$email', '$password', '$alamat','$no_telp','$tanggal_gabung','$foto') ";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo json_encode( array ('message' => 'created'));
    } else {
        echo json_encode( array ('message' => 'error'));
    }


?>