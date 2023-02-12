<?php
// menghubungkan file fungsi.php
include 'fungsi.php';

// memulai/mengaktifkan session
session_start();

// jika button meminta $_POST dan bernama "aksi"
if (isset($_POST['aksi'])) {

	// jika button aksi berisi post dan memiliki value = "add"
	if ($_POST['aksi'] == "add") {

		// running function tambah_data dan menyimpannya di variable $successTambahData
		$successTambahData = tambah_data($_POST, $_FILES);

		// jika $successTambahData dapat berjalan tanpa error
		if ($successTambahData) {
			// alert with session
			$_SESSION['hasil'] = "Data berhasil ditambahkan,success";
			// replace to loc: index.php
			header("location: index.php");
		}
		// jika $succesTambahData tidak berjalan atau error
		else {
			// echo $succesTambahData untuk megetahui titik error
			echo $successTambahData;
		}
	}
	// jika button $_POST bernama aksi dan memiliki value "edit"
	else if ($_POST['aksi'] == "edit") {
		// run function ubah_data dan dimpan di variable $succesUbahData
		$successUbahData = ubah_data($_POST, $_FILES);

		// jika $successUbahData dapat berjalan tanpa error
		if ($successUbahData) {
			// alert with session
			$_SESSION['hasil'] = "Data berhasil diperbarui,success";
			// replace to loc: index.php
			header("location: index.php");
		}
		// jika $succesUbahData tidak berjalan atau error
		else {
			// echo $succesUbahData untuk megetahui titik error
			echo $successUbahData;
		}
	}
}

// jika button meminta $_GET dan bernama hapus
if (isset($_GET['hapus'])) {

	// run function hapus_data dan menyimpan di varibale $successHapusData
	$successHapusData = hapus_data($_GET);

	// jika $successHapusData dapat berjalan tanpa error
	if ($successHapusData) {
		// alert with session
		$_SESSION['hasil'] = "Data berhasil dihapus,success";
		// replace to loc: index.php
		header("location: index.php");
	}
	// jika $succesHapusData tidak berjalan atau error
	else {
		// echo $succesHapusData untuk megetahui titik error
		echo $succesHapusData;
	}
}
