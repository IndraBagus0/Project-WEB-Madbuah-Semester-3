<?php

include 'controler.php';

$id_admin = (int)$_GET['id_user'];

if (hapus_admin($id_admin) > 0) {
    echo "<script>
                alert('hapus sukses');
                 document.location.href = 'data-admin.php';
            </script>";
} else {
    echo "<script>
                alert('hapus gagal');
                document.location.href = 'data-admin.php';
            </script>";
}
