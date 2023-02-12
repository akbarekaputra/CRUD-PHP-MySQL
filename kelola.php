<!DOCTYPE html>

<?php
// mengkoneksikan dengan file "koneksi.php"
include 'koneksi.php';

// membuat varibale untuk default
$id_siswa = '';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';

// jika klik buton berisi $_GET dan bernama "ubah"
if (isset($_GET['ubah'])) {
    // membuat id siswa dari id db yang diambil memlalui $_GET
    $id_siswa = $_GET['ubah'];

    // query untuk mengambil data dari db dimana id siswa yang diminta haru sesuai dengan di db
    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    // run query
    $sql = mysqli_query($conn, $query);
    // menyimpan output query ke variable $result
    $result = mysqli_fetch_assoc($sql);

    // membuat variable dari db untuk view atau value input ketika user mengedit data
    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">

    <!-- Data Tables/JQuery -->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

    <link rel="icon" href="assets/images/logoRabkaera.png" type="image/icon type">
    <title>CRUD-PHP-MySQL</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD-PHP-MySQL
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <!-- membuat value input dari db -->
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">
                    NISN
                </label>
                <div class="col-sm-10">
                    <input required type="number" name="nisn" class="form-control" id="nisn"
                        placeholder="Example: 123456789" value="<?php echo $nisn; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">
                    Nama Siswa
                </label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama"
                        placeholder="Example: AKBAR EKA PUTRA" value="<?php echo $nama_siswa; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jkel" class="col-sm-2 col-form-label">
                    Jenis Kelamin
                </label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jenis_kelamin" class="form-select">
                        <!-- option default -->
                        <option value="">Jenis Kelamin</option>
                        <!-- jika jenis kelamin di db adalah laki laki, makan vaue laki laki akan di selected -->
                        <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                    echo "selected";
                                } ?> value="Laki-laki">
                            Laki-laki</option>
                        <!-- jika jenis kelamin di db adalah perempuan, makan vaue perempuan akan di selected -->
                        <option <?php if ($jenis_kelamin == 'Perempuan') {
                                    echo "selected";
                                } ?> value="Perempuan">
                            Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">
                    Foto Siswa
                </label>
                <div class="col-sm-10">
                    <!-- jika user di page tambah data bukan di page edit, maka form foto harus diisi (required) -->
                    <input <?php if (!isset($_GET['ubah'])) {
                                echo "required";
                            } ?> class="form-control" type="file" name="foto" id="foto" accept="image/*">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">
                    Alamat Lengkap
                </label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="alamat" name="alamat" rows="3"
                        placeholder="Example: JL. Perum. Pesona Anggrek Anggrek H."><?php echo $alamat; ?></textarea>
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <!-- jika user di page ubah/edit, maka button berfungi sebagai simpan perubahan -->
                    <?php
                    if (isset($_GET['ubah'])) {
                    ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fas fa-floppy-disk" aria-hidden="true"></i>
                        Simpan Perubahan
                    </button>
                    <?php
                    }
                    // jika user tidak di pake ubah atau mungkin di page tambah data, maka button berfungsi sebagai tambah data
                    else {
                    ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                        Tambahkan
                    </button>
                    <?php
                    }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
                </div>
            </div>

        </form>
        <!-- form end -->
    </div>
    <!-- container end -->

    <!-- JS -->
    <script>
    // remove watermark 000webhost
    document.addEventListener('DOMContentLoaded', () => {
        var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
        if (disclaimer) {
            disclaimer.remove();
        }
    });
    </script>

</body>

</html>