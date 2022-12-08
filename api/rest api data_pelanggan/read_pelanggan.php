<?php

    include ('koneksi.php');

    $query = "SELECT * FROM data_pelanggan";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $result = array();
        while ($row = mysqli_fetch_array($sql)){
            array_push( $result, array(
                'id pelanggan'=> $row['id_pelanggan'],
                'nama pelanggan'=> $row['nama'],
                'email'=> $row['email'],
                'password'=> $row['password'],
                'alamat'=> $row['alamat'],
                'no_telp'=> $row['no_telp'],
                'tanggal gabung'=> $row['tanggal_gabung'],
                'foto'=> $row['foto'],
            ));
        }
    }

    echo json_encode( array ('data pelanggan' => $result));


?>