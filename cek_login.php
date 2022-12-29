<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from data_user where username='$username' and password='$password'  ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if ($data['status'] == "super_admin") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "super_admin";

		// alihkan ke halaman dashboard admin
		header("location:index.php");
		// cek jika user login sebagai user
	} else if ($data['status'] == "admin") {
		// buat session login dadminname
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "admin";
		// alihkan ke halaman dashboard user
		header("location:index.php");
	} else {
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}
