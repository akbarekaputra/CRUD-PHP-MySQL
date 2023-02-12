<?php

// mengkoneksikan dengan file koneksi.php
include 'koneksi.php';

// membuat function tambah data dengan mengambil parameter $_POST = $data dan $_FILES = $files
function tambah_data($data, $files)
{
	// membuat variable dari value $data
	$nisn = $data['nisn'];
	$nama_siswa = $data['nama_siswa'];
	$jenis_kelamin = $data['jenis_kelamin'];
	$alamat = $data['alamat'];

	// memisahkan nama foto setiap ada titik
	$split = explode('.', $files['foto']['name']);
	// mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
	$ekstensi = $split[count($split) - 1];

	// membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
	$combine = $nisn . $nama_siswa . '.' . $ekstensi;

	// menghapus space pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
	$foto = str_replace(" ", "", $combine);

	// tujuan foto disimpan
	$dir = "assets/images/";
	// mengambil foto dari tmpFile yang ada di array $_FILES
	$tmpFile = $files['foto']['tmp_name'];

	// memindahkan foto dari tmpFIle ke dir atau tujuan foto disimpan dengan nama $foto
	move_uploaded_file($tmpFile, $dir . $foto);

	// query untuk menambahkan data ke database
	$query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nama_siswa', '$jenis_kelamin', '$foto', '$alamat')";
	// running querry
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

// membuat function ubah data dengan mengambil parameter $_POST = $data dan $_FILES = $files
function ubah_data($data, $files)
{
	// membuat variable dari array di dalam $data/$_POST
	$id_siswa = $data['id_siswa'];
	$nisn = $data['nisn'];
	$nama_siswa = $data['nama_siswa'];
	$jenis_kelamin = $data['jenis_kelamin'];
	$alamat = $data['alamat'];

	// query untuk mengambil data dari db
	$queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output dari db ke variable $result
	$result = mysqli_fetch_assoc($sqlShow);

	// jika di dalam array $file dengan nama "name" di dalam "foto" tidak ada atau == ""
	if ($files['foto']['name'] == "") {
		// variable $foto berisi string sesuai di db
		$foto = $result['foto_siswa'];
	}

	// jika tidak, atau jika di dalam array $foto yang berisi "name" di dalam "foto" ada isinya atau !=
	else {
		// memisahkan nama foto setiap ada titik
		$split = explode('.', $files['foto']['name']);
		// mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
		$ekstensi = $split[count($split) - 1];

		// membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
		$combine = $nisn . $nama_siswa . '.' . $ekstensi;

		// menghapus space pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
		$foto = str_replace(" ", "", $combine);

		// menghapus file dalam assets/images/ dengan nama foto yang sesuai di db 
		unlink("assets/images/" . $result['foto_siswa']);

		// memindahkan foto dari tmp File ke assets/images/ dengan nama foto = $foto
		move_uploaded_file($files['foto']['tmp_name'], 'assets/images/' . $foto);
	}

	// query untuk update data
	$query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', foto_siswa = '$foto', alamat='$alamat' WHERE id_siswa='$id_siswa';";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

// membuat function hapus data dengan mengambil parameter $_POST = $data
function hapus_data($data)
{
	// membuat variable dengan mengambil isi dari $data untuk dijadikan id siswa
	$id_siswa = $data['hapus'];

	// query untuk mengambil data yang id siswanya sama dengan id siswa di db
	$queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output querry
	$result = mysqli_fetch_assoc($sqlShow);

	// meghapus file assets/images/ dengan nama sesuai nama foto siswa di db
	unlink("assets/images/" . $result['foto_siswa']);

	// query untuk menghapus data, dimana id siswa harus sesuai dengan id siswa di db
	$query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
	// running the query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}
