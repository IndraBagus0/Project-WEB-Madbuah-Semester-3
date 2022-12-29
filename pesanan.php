<?php
include 'assets/layout/header.php';

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
        <i class="bi bi-menu-button-wide" class="active"></i>
        <span>Produk</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="data-costumers.php">
            <i class="bi bi-circle"></i><span>Data Pelanggan</span>
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

</aside><!-- End Sidebar-->

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Produk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="pesanan.php">Pesanan</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <!-- Recent Sales -->
  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Pesanan</h5>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">ID Transaksi</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Tanggal Pesanan</th>
                  <th>Kuantitas</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pesanan as $pesanan) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pesanan['id_transaksi']; ?></td>
                    <td><?= $pesanan['fullname']; ?></td>
                    <td><?= $pesanan['tanggal_beli']; ?></td>
                    <td><?= $pesanan['qty_transaksi']; ?> Produk</td>
                    <td><?= $pesanan['total']; ?></td>
                    <td><?= $pesanan['status_transaksi']; ?></td>
                    <!-- <td><span class="badge rounded-pill bg-success ">Selesai</span></td> -->
                    <td>
                      <a href="invoice.php?id_transaksi=<?= $pesanan['id_transaksi']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a href="hapus-transaksi.php?id_transaksi<?= $pesanan['id_transaksi']; ?>" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletepesanan<?= $pesanan['id_transaksi']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      <a href="#" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#orderModalId-62"><i class="fa fa-truck" aria-hidden="true"></i></a>
                    </td>
                  </tr>

                  <!-- hapus pesanan -->
                  <div class="modal fade" id="deletepesanan<?= $pesanan['id_transaksi']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Pesanan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Hapus Pesanan dengan id <?= $pesanan['id_transaksi']; ?>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="hapus-transaksi.php?id_transaksi<?= $pesanan['id_transaksi']; ?>" class="btn btn-primary" data-bs-dismiss="modal">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- End  Modal-->
                  <!-- modal ubah -->
                  <div class="modal fade" id="orderModalId-62" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Pesanan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST">
                            <div class="mb-3">
                              <label for="pesanan">Status</label>
                              <br>
                              <select name="order_status" id="pesanan" class="form-control">
                                <option selected="" value="0">Status</option>
                                <option value="1">Proses</option>
                                <option value="3">Selesai</option>
                                <option value="4">Di Batalkan</option>
                              </select>
                            </div>
                          </form>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ubah</button>
                          </div>

                        </div>
                      </div>
                    </div>
              </tbody>
            <?php endforeach; ?>
            </table>

          </div>

        </div>
      </div><!-- End Recent Sales -->
    </div>
    <section class="section">

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