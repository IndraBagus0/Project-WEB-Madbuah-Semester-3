

<?php
include 'koneksi.php';
//Menampilkan data admin
function select($query)
{
 global $koneksi;
 $result = mysqli_query($koneksi ,$query);
 $rows =[];

 while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
 }
return $rows;
}
$admin = select("SELECT * FROM `data_admin` ");


//Tambah Data Admin
function tambah_admin($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $no_telp = $post['no_telp'];
    $alamat = $post['alamat'];
    $level = $post['level'];
    $foto = $post['foto'];
    

    $query = "INSERT INTO `data_admin` VALUES (NULL, `$nama`,'username', `$email`, `$password`,  `$no_telp`, `$alamat`, `$level`,`$foto`) ";

    mysqli_query($koneksi ,$query);

    return mysqli_affected_rows($koneksi);
}

// function upload_file()
// {
//     $namaFile = $_FILES('foto')('name');
//     $ukuranFile = $_FILES ('foto')('size');
//     $error = $_FILES ('foto')('error');
//     $tmpname = $_FILES ('foto')('tmp_name');

//     $extensifileValid = ['jpg', 'png' ,'jpeg'];
//     $extensifile = explode('.' , $namaFile );
//     $extensifile = strtolower(end($extensifile) );

//     if(!in_array($extensifile, $extensifileValid)){
        
//     }
// }


// Hapus Admin

function hapus_admin($id_admin)
{
    global $koneksi;
    $query = "DELETE FROM data_admin  WHERE id_admin = $id_admin";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

// Hapus Costumers

function hapus_pelanggan($id_pelanggan)
{
    global $koneksi;
    $query = "DELETE FROM data_pelanggan  WHERE id_pelanggan = $id_pelanggan";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}


?>

