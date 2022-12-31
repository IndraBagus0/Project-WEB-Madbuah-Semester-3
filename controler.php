<?php
include 'koneksi.php';
//Menampilkan data admin
function select($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$admin = select("SELECT * FROM `data_user` WHERE status = 'admin' ");

// Menampilkan data costumers
function select_costumers($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$pelanggan = select("SELECT * FROM `data_user` WHERE status = 'user' ORDER BY id_user DESC ");



//upload foto
// fungsi mengupload file
function upload_file()
{
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png', 'jfif'];
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
// Hapus barang
function hapus_barang($id_barang)
{
    global $koneksi;
    $query = "DELETE FROM produk  WHERE id_produk = $id_barang";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Hapus Admin

function hapus_admin($id_user)
{
    global $koneksi;
    $query = "DELETE FROM data_user  WHERE id_user = $id_user";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
// Hapus Costumers

//hapus transaksi
function hapus_transaksi($id_transaksi)
{
    global $koneksi;
    $query = "DELETE FROM transaksi  WHERE id_transaksi = $id_transaksi";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}




//menampilkan produk

function select_produk($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$no = 1;
$produkbuah = select("SELECT * FROM `produk` ");


//nambah produk
function tambah_produk($post)
{
    global $koneksi;

    $id_kategori = $post['id_kategori'];
    $nama_produk = $post['nama_produk'];
    $qty = $post['qty'];
    $harga = $post['harga'];
    $kategori = $post['kategori'];
    $foto_produk = addslashes(file_get_contents($_FILES['foto_produk']['tmp_name']));
    $keterangan = $post['keterangan'];

    // Query untuk menambahkan data ke tabel produk
    $query = "INSERT INTO produk (id_kategori, nama_produk, qty, harga, kategori, foto_produk, keterangan) VALUES ('$id_kategori', '$nama_produk', '$qty', '$harga', '$kategori', '$foto_produk', '$keterangan')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

//Tambah Data Admin
function tambah_admin($post)
{
    global $koneksi;


    $username = $post['username'];
    $password = $post['password'];
    $nama = $post['fullname'];
    $email = $post['email'];
    $no_telp = $post['no_telp'];
    $alamat = $post['alamat'];
    $level = $post['status'];


    $query = "INSERT INTO data_user(username, password, fullname , email, no_telp, alamat, status ) VALUES ('$username','$password','$nama','$email', '$no_telp','$alamat' ,'$level') ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function edit_produk($post)
{
    global $koneksi;

    $id_produk = $post['id_produk'];
    $nama_produk = $post['nama_produk'];
    $qty = $post['qty'];
    $harga = $post['harga'];
    $kategori = $post['kategori'];
    $keterangan = $post['keterangan'];
    $query = "UPDATE produk  SET  `nama_produk` = '$nama_produk', `qty` = '$qty', `harga` = '$harga', `kategori` = '$kategori', `keterangan` = '$keterangan' = WHERE id_produk='$id_produk' ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function pesanan($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
$no = 1;
$pesanan = select("SELECT transaksi.id_transaksi, data_user.fullname, transaksi.tanggal_beli, 
detail_transaksi.qty, detail_transaksi.total, transaksi.status FROM transaksi 
INNER JOIN data_user ON transaksi.id_user = data_user.id_user 
INNER JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi 
INNER JOIN produk ON detail_transaksi.id_produk =produk.id_produk");

// Update Pesanan
function Proses($post)
{
    global $koneksi;

    $id_transaksi = $post['id_transaksi'];
    $status = $post['status'];
    $query = "UPDATE `transaksi` SET `status`='$status' WHERE id_transaksi='$id_transaksi' ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
