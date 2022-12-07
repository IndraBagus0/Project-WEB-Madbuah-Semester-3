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

// Menampilkan data costumers
function select_costumers($query)
{
 global $koneksi;
 $result = mysqli_query($koneksi ,$query);
 $rows =[];

 while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
 }
return $rows;
}
$pelanggan = select("SELECT * FROM `data_pelanggan` ORDER BY id_pelanggan DESC ");

// //menghitung jumlah user
// function select_alluser($query)
// {
//  global $koneksi;
//  $result = mysqli_query($koneksi ,$query);
//  $rows =[];

//  while($row = mysqli_fetch_assoc($result)) {
//   $rows[] = $row;
//  }
// return $rows;
// }
// $pelangganjumlah = select_all("SELECT * FROM `data_pelanggan`");
// $jumlahuser = mysqli_num_rows($pelangganjumlah);


//Tambah Data Admin
function tambah_admin($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $no_telp = $post['no_telp'];
    $alamat = $post ['alamat'];
    $level = $post ['level'];
    $foto =upload_file();
    

    $query = "INSERT INTO `data_admin` VALUES (NULL, '$nama','$username','$email', '$password','$no_telp','$alamat' ,'$level','$foto') ";

    mysqli_query($koneksi ,$query);

    return mysqli_affected_rows($koneksi);
}


//upload foto
// fungsi mengupload file
function upload_file()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png','jfif'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'produk-buah.php';
              </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'produk-buah.php';
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}


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


// Hapus barang
function hapus_barang($id_barang)
{
    global $koneksi;
    $query = "DELETE FROM produk  WHERE id_barang = $id_barang";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

//menampilkan produk

function select_produk($query)
{
 global $koneksi;
 $result = mysqli_query($koneksi ,$query);
 $rows =[];

 while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
 }
return $rows;
}
$no=1;
$produkbuah = select("SELECT * FROM `produk` ");


//nambah produk
function tambah_produk($post)
{
    global $koneksi;

    $nama_barang = $post['nama_barang'];
    $qty = $post['qty'];
    $kategori = $post['kategori'];
    $harga = $post['harga'];
    $deskripsi = $post['deskripsi'];
    $foto_produk = upload_file();
    

    $query = "INSERT INTO `produk` VALUES (NULL, '$nama_barang','$qty','$harga','$kategori', '$deskripsi','$foto_produk') ";

    mysqli_query($koneksi ,$query);

    return mysqli_affected_rows($koneksi);
}

function edit_produk($post)
{
    global $koneksi;
    $id_barang = strip_tags($post['id_barang']);
    $nama_barang = strip_tags($post['nama_barang']);
    $qty = strip_tags($post['qty']);
    $kategori = strip_tags($post['kategori']);
    $harga = strip_tags($post['harga']);
    $deskripsi = strip_tags($post['deskripsi']);
    $fotoLama = strip_tags($post['fotoLama']);

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto_produk = $fotoLama;
    } else {
        $foto_produk = upload_file();
    }

    // query ubah data
    $query = "UPDATE `produk` SET nama_barang= '$nama_barang', qty= '$qty',harga= '$harga',kategori= '$kategori', deskripsi= '$deskripsi', foto_produk='$foto_produk' WHERE id_barang='$id_barang' ";
    mysqli_query($koneksi, $query);

}



?>

