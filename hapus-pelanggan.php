<?php

    include 'controler.php';

    $id_pelanggan =(int)$_GET['id_pelanggan'];

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

?>