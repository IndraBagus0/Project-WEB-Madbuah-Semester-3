<?php
include 'assets/layout/header.php';
// session_start();

// // membatasi halaman sebelum login
// if (!isset($_SESSION["login"])) {
//     echo "<script>
//             document.location.href = 'login.php';
//           </script>";
//     exit;
// }
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" href="produk-buah.php">
        <i class="bi bi-menu-button-wide"></i><span>Produk</span><i></i>
      </a>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="data-costumers.php" class="active">
            <i class="bi bi-circle"></i><span>Data Pelanggan</span>
          </a>
        </li>
        <li>
          <a href="data-admin.php">
            <i class="bi bi-circle"></i><span>Data Admin</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pesanan.php">
        <i class="bi bi-cart"></i>
        <span>Pesanan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="report.php">
        <i class="bi bi-bar-chart"></i>
        <span>Laporan</span>
      </a>
    </li><!-- End Charts Nav -->


  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pelanggan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Pelanggan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-11">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Pelanggan</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Kontak</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pelanggan as $data_pelanggan) : ?>
                  <tr>
                    <td><?= $data_pelanggan['id_user']; ?></td>
                    <td><?= $data_pelanggan['fullname']; ?></td>
                    <td><?= $data_pelanggan['username']; ?></td>
                    <td><?= $data_pelanggan['email']; ?></td>
                    <td><?= $data_pelanggan['no_telp']; ?></td>
                    <td><?= $data_pelanggan['alamat']; ?></td>

                    <th>
                      <a href="hapus-pelanggan.php?id_user=<?= $data_pelanggan['id_user'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modalcostumer">Hapus</a>
                    </th>
                  </tr>
                  <!-- hapus Costumers -->
                  <div class="modal fade" id="delete_modalcostumer" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Admin</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Akan Menghapus Pelanggan Dengan Username <?= $data_pelanggan['username']; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="hapus-pelanggan.php?id_user=<?= $data_pelanggan['id_user'] ?>" class="btn btn-danger" type="button">Hapus </a>
                        </div>
                      </div>
                    </div>
                  </div><!-- End  Modal-->
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php
include 'assets/layout/footer.php';
?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>