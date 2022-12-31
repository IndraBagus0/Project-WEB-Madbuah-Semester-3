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
      <a class="nav-link collapsed" href="dashboard.php">
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

    <li>
      <a class="nav-link collapsed" href="logout.php">
        <i class="bi bi-box-arrow-right"></i>
        <span>Keluar</span>
      </a>
    </li>
  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Pelanggan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
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
                  </tr>
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