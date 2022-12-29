<?php
    // session_start();

    // // membatasi halaman sebelum login
    // if (!isset($_SESSION["login"])) {
    //     echo "<script>
    //             document.location.href = 'login.php';
    //           </script>";
    //     exit;
    // }
    include 'controler.php';

    $id_pelanggan =(int)$_GET['id_user'];

    if (hapus_pelanggan ($id_pelanggan) > 0) {
        echo "<script>
                alert('deleted costumer succes');
                 document.location.href = 'data-costumers.php';
            </script>";
    } else {
        echo "<script>
                alert('deleted costumer no compleate');
                document.location.href = 'data-costumers.php';
            </script>";
    }
