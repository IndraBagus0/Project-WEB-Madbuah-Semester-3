<?php
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from data_admin where username='$username' and password='$password'  ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	// cek jika user login sebagai admin
	if ($data['level'] == "super_admin") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "super_admin";
		// alihkan ke halaman dashboard admin
		header("location:adminpage.php");
		// cek jika user login sebagai user
	} else if ($data['level'] == "user") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "users";
		// alihkan ke halaman dashboard user
		header("location:halaman_user.php");
	} else {
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}
