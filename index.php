<!-- CRUD. Create, Read, Update, Delete. -->

<?php
// mengkoneksikan dengan file koneksi.php
include 'koneksi.php';

// memulai/mengaktifkan session
session_start();
?>

<!DOCTYPE html>
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

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                CRUD-PHP-MySQL
            </a>
        </div>
    </nav>

    <!-- membuat tampilan menjadi container -->
    <div class="container mb-5">

        <!-- Judul -->
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi Data Yang Telah Disimpan Di Database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD. <cite title="Source Title">Create, Read, Update, Delete.</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>

        <!-- alert with session -->
        <?php
        if (isset($_SESSION['hasil'])) :
            $split = explode(",", $_SESSION['hasil']);
        ?>
            <div class="alert alert-<?php echo $split[1]; ?> alert-dismissible fade show" role="alert">
                <strong><?php echo $split[0]; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- mematikan session supaya ketika reload, session mati/hilang -->
        <?php
            session_destroy();
        endif;
        ?>

        <!-- Table -->
        <div class="table-responsive">
            <table id="dt" class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- memunculkan output result ke variable result-->
                    <?php
                    // code query untuk menampilkan seua data di table siswa
                    $query = "SELECT * FROM tb_siswa;";
                    // running query
                    $sql = mysqli_query($conn, $query);

                    // untuk nomer table
                    $no = 0;

                    // menyimpan output sql ke $result
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <!-- mengeluarkan result ke datatables -->
                            <td>
                                <center>
                                    <?php echo ++$no; ?>.
                                </center>
                            </td>
                            <td>
                                <?php echo $result['nisn']; ?>
                            </td>
                            <td>
                                <?php echo $result['nama_siswa']; ?>
                            </td>
                            <td>
                                <?php echo $result['jenis_kelamin']; ?>
                            </td>
                            <td>
                                <center>
                                    <img class="rounded" style="max-height: 100px;" src="assets/images/<?php echo $result['foto_siswa']; ?>">
                                </center>
                            </td>
                            <td>
                                <?php echo $result['alamat']; ?>
                            </td>
                            <td class="d-flex justify-content-center align-items-center" style="height: 100px;">
                                <center>
                                    <!-- meminta $_POST. setiap tabel pada user memiliki nilai "ubah" yang berbeda, misal user 1, maka nilai "ubah" miliknya adalah "1" -->
                                    <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm mb-1">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <!-- meminta $_GET. setiap tabel pada user memiliki nilai "hapus" yang berbeda, misal user 1, maka nilai "hapus" miliknya adalah "1" -->
                                    <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- div container end -->

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="#" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-google"></i>
                </a>
                <a href="https://www.instagram.com/akbrptraz/" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.instagram.com/rabkera/" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/akbarekaputra01" class="me-4 text-reset" style="text-decoration: none;">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Rabkaera
                        </h6>
                        <p>
                            Hi! Nama saya Akbar Eka Putra, sekolah di SMKN 5 Kota Bekasi.
                            <br>
                            BTW, the name Rabka is the opposite of the name Akbar.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Expert
                        </h6>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">Javascript</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">PHP</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Student
                        </h6>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">SMKN 5 Kota BEKASI</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">SMPN 25 Kota BEKASI</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset text-decoration-none">SDIT Al Muchtar</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-house-user me-3"></i> Perum. Pesona Anggrek H.</p>
                        <p>
                            <i class="fas fa-envelope-open me-3"></i> akbarekaputra01@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +62 813 8027 9293</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © <?php echo date('Y'); ?> Copyright:
            <a class="text-reset fw-bold" href="https://www.instagram.com/akbrptraz/">Rabkaera</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- JS -->
    <script>
        // untuk menggunakan datatables
        $(document).ready(function() {
            $('#dt').DataTable();
        });

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