<?php
include 'assets/layout/header.php';
if (isset($_POST['upload'])) {
  if (tambah_produk($_POST) > 0) {
    echo "<script>
                  alert('Menambah Produk Berhasil');
                  document.location.href = 'produk-buah.php';
                  </script>";
  } else {
    echo "<script>
            alert('Gagal Menambahkan Produk');
            document.location.href = 'produk-buah.php';
            </script>";
  }
}

// check apakah tombol ubah ditekan
if (isset($_POST['ubahproduk'])) {
  if (edit_produk($_POST) > 0) {
    echo "<script>
                          alert('Data produk Berhasil Diubah');
                          document.location.href = 'produk-buah.php';
                        </script>";
  } else {
    echo "<script>
                    alert('Data produk Gagal Diubah');
                    document.location.href = 'produk-buah.php';
                </script>";
  }
}
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
    <h1>Produk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Produk</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title">Produk <span><button type="submit" name="addproduk" data-bs-toggle="modal" data-bs-target="#tambahproduk" class="btn btn-primary" style="float: right;">Tambah Produk</button></span></h5>
            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">ID</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Stok</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produkbuah as $produk) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $produk['id_produk']; ?></td>
                    <td><?= $produk['nama_produk']; ?></td>
                    <td>RP <?= $produk['harga']; ?></td>
                    <td><?= $produk['qty']; ?></td>
                    <td><?= $produk['kategori']; ?></td>
                    <td><?= $produk['keterangan']; ?></td>
                    <td>
                      <?= '<img src="data:image/png;base64,' . base64_encode($produk['foto_produk']) . '" style="width:90px;height:90px;">'; ?>
                    </td>
                    <td>
                      <a href="hapus-produk.php?id_produk=<?= $produk['id_produk'] ?>" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_produkmodal<?= $produk['id_produk'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      <a href="#" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $produk['id_produk'] ?> "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  <!-- modal -->
                  <!-- hapus produk -->
                  <div class="modal fade" id="delete_produkmodal<?= $produk['id_produk'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Produk</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Akan Menghapus Barang dengan Nama <?= $produk['nama_produk']; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="hapus-produk.php?id_produk=<?= $produk['id_produk'] ?>" class="btn btn-danger" type="button">Hapus </a>
                        </div>
                      </div>
                    </div>
                  </div><!-- End  Modal-->
                  <!-- Ubah Produk Modal -->
                  <div class="modal fade" id="verticalycentered<?= $produk['id_produk'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Ubah Produk <?= $produk['nama_produk']; ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama Produk</label>
                              <input type="text" class="form-control" id="nama" name="nama_produk" placeholder="Name" required value="<?= $produk['nama_produk']; ?>">
                            </div>
                            <div class="mb-3">
                              <label for="harga" class="form-label">Harga</label>
                              <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" required value="<?= $produk['harga']; ?>">
                            </div>
                            <div class="mb-3">
                              <label for="qty" class="form-label">Qty</label>
                              <input type="qty" class="form-control" id="qty" name="qty" placeholder="qty" required value="<?= $produk['qty']; ?>">
                            </div>
                            <div class="mb-3">
                              <label for="kategori" class="form-label">satuan</label>
                              <input type="kategori" class="form-control" id="kategori" name="kategori" placeholder="kategori" required value="<?= $produk['kategori']; ?>">
                            </div>
                            <div class="mb-3">
                              <label for="deskripsi" class="form-label">Deskripsi</label>
                              <input type="text" class="form-control" id="deskripsi" name="keterangan" placeholder="Deskripsi Produk" required value="<?= $produk['keterangan']; ?>">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="ubahproduk" class="btn btn-primary" style="float: right;">Ubah Produk</button>
                              <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Ubah Produk Modal-->
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal Tambah Produk -->
      <div class="modal fade" id="tambahproduk" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Produk</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Produk</label>
                  <input type="text" class="form-control" id="nama" name="nama_produk" placeholder="Name" required>
                </div>
                <div class="mb-3">
                  <label for="Kategorii" class="form-label">Kategori</label>
                  <select class="form-select" aria-label="Default select example" id="Kategori" name="id_kategori" required>
                    <option selected>Pilih Kategori</option>
                    <option value="1">Buah</option>
                    <option value="2">Parsel</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="harga" required>
                </div>
                <div class="mb-3">
                  <label for="qty" class="form-label">Qty</label>
                  <input type="qty" class="form-control" id="qty" name="qty" placeholder="qty" required>
                </div>
                <div class="mb-3">
                  <label for="Kategori" class="form-label">satuan</label>
                  <select class="form-select" aria-label="Default select example" id="Kategori" name="kategori" required>
                    <option selected>Pilih Kategori</option>
                    <option value="kg">Kilogram</option>
                    <option value="paket">Paket</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="keterangan" placeholder="Deskripsi Produk" required>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Pilih Gambar</label>
                  <input class="form-control" type="file" id="foto" name="foto_produk" required>
                </div>
                <!-- <button type="submit" name="addproduk" class="btn btn-primary" style="float: right;">Tambah Produk</button> -->
                <div class="modal-footer">
                  <button type="submit" name="upload" class="btn btn-primary" style="float: right;">Tambah Produk</button>
                  <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                </div>
              </form>
            </div>
          </div>
        </div>
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