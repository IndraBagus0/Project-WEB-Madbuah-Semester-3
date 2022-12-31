<?php
include 'assets/layout/header.php';

// mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

// menampilkan data barang
$produkbuah = select("SELECT * FROM `produk` WHERE id_barang = $id_barang ")[0];
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
      <a class="nav-link " href="produk-buah.php">
        <i class="bi bi-menu-button-wide"></i>
        <span>Produk</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="data-costumers.php">
            <i class="bi bi-circle"></i><span>Data Costumers</span>
          </a>
        </li>
        <li>
          <a href="data-admin.php">
            <i class="bi bi-circle"></i><span>Data Admin</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-cart"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="tables-general.html">
            <i class="bi bi-circle"></i><span>General Tables</span>
          </a>
        </li>
        <li>
          <a href="tables-data.html">
            <i class="bi bi-circle"></i><span>Data Tables</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="charts-chartjs.html">
            <i class="bi bi-circle"></i><span>Chart.js</span>
          </a>
        </li>
        <li>
          <a href="charts-apexcharts.html">
            <i class="bi bi-circle"></i><span>ApexCharts</span>
          </a>
        </li>
        <li>
          <a href="charts-echarts.html">
            <i class="bi bi-circle"></i><span>ECharts</span>
          </a>
        </li>
      </ul>
    </li><!-- End Charts Nav -->

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.html">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.php">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->
  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Produk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item active">Detail Produk</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Detail Produk <?= $produkbuah['nama_barang']; ?></h5>


            <!-- Table with hoverable rows -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="col-lg-2">ID Produk</th>
                  <td><?= $produkbuah['id_barang']; ?></td>
                </tr>
                <tr>
                  <th scope="col">Nama</th>
                  <td><?= $produkbuah['nama_barang']; ?></td>
                </tr>
                <tr>
                  <th scope="col">Harga</th>
                  <td>RP <?= $produkbuah['harga']; ?></td>
                </tr>
                <tr>
                  <th scope="col">Stok</th>
                  <td><?= $produkbuah['qty']; ?></td>
                </tr>
                <tr>
                  <th scope="col">Kategori</th>
                  <td><?= $produkbuah['kategori']; ?></td>
                </tr>
                <th scope="col">Deskripsi</th>
                <td><?= $produkbuah['deskripsi']; ?></td>
                </tr>
                </tr>
                <th scope="col">Gambar</th>
                <td><img src="assets/img/<?= $produkbuah['foto_produk']; ?>" width="100"></td>
                </tr>


              </thead>
            </table>
            <a href="produk-buah.php" class="btn btn-secondary btn-sn">Kembali</a>
          </div>

        </div>
      </div>



  </section>

</main><!-- End #main -->

<?php include 'assets/layout/footer.php'; ?>

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