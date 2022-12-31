<?php
include 'assets/layout/header.php';

// mengambil id transaksi dari url
$id_transaksi = (int)$_GET['id_transaksi'];

// menampilkan data transaksi
$pesanan = select("SELECT  detail_transaksi.id_transaksi, detail_transaksi.qty,detail_transaksi.total, produk.nama_produk FROM detail_transaksi INNER JOIN produk ON detail_transaksi.id_produk = produk.id_produk  WHERE id_transaksi = $id_transaksi ")[0];

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
        <i class="bi bi-menu-button-wide" class="active"></i>
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
      <a class="nav-link " href="pesanan.php">
        <i class="bi bi-cart" class="active"></i>
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
    <h1>Pesanan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="invoive.php">Detail Pesanan</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="section-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"> <br> <strong>Transaksi ID <span><?= $pesanan['id_transaksi']; ?></span></strong></h3>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-condensed">
                          <thead>
                            <tr>
                              <td><strong>Produk</strong></td>
                              <td><strong>Quantity</strong></td>
                              <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?= $pesanan['nama_produk']; ?></td>
                              <td><?= $pesanan['qty']; ?> Produk</td>
                              <td>Rp <?= $pesanan['total']; ?></td>
                            </tr>
                            <tr>
                              <td class="thick-line"></td>
                              <td class="thick-line text-center"><strong>Total</strong></td>
                              <td class="thick-line text-right">Rp <?= $pesanan['total']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</main><!-- End #main -->
<!-- Css invoive -->
<style>
  .invoice-title h2,
  .invoice-title h3 {
    display: inline-block;
  }

  body {
    font-family: "Open Sans", sans-serif;
    background: #f6f9ff;
    color: #444444;
  }

  .table>tbody>tr>.no-line {
    border-top: none;
  }

  .table>thead>tr>.no-line {
    border-bottom: none;
  }

  .table>tbody>tr>.thick-line {
    border-top: 2px solid;
  }
</style>




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