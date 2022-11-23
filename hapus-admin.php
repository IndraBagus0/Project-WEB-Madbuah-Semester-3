<?php

    include 'controler.php';

    $id_admin =(int)$_GET['id_admin'];

    if (hapus_admin ($id_admin) > 0) {
        echo "<script>
                alert('deledted admin succes');
                 document.location.href = 'data-admin.php';
            </script>";
    } else {
        echo "<script>
                alert('deleted admin no compleate');
                document.location.href = 'data-admin.php';
            </script>";
    }

?>