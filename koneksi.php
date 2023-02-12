<?php
// membuat variable
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_sekolah';

// menghubungkan mysql
$conn = mysqli_connect($host, $user, $pass, $db);

// mengecek apakah mysql connected or not connected
if ($conn) {
	//echo "Koneksi Berhasil";
}

// memilih db di mysql yang ingin digunakan
mysqli_select_db($conn, $db);