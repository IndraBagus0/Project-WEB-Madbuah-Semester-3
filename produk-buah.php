<?php
    include 'assets/layout/header.php';
          if (isset($_POST['addproduk'])) {
              if (tambah_produk($_POST) >0) {
                      echo "<script>
                          alert('Menambah Produk Berhasil');
                          document.location.href = 'produk-buah.php';
                          </script>";
                    }else{
                    echo "<script>
                    alert('Gagal Menambahkan Produk');
                    document.location.href = 'produk-buah.php';
                    </script>";
                  }
                  }
          
          

          // check apakah tombol ubah ditekan
                  if (isset($_POST['ubahproduk'])) {
                  if (edit_produk($_POST) > 0);
    }
                  ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminpage.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
                <a class="nav-link " href="produk-buah.php">
                    <i class="bi bi-menu-button-wide"  class="active"></i>
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
                <a class="nav-link collapsed" href="pesanan.php">
                    <i class="bi bi-cart" ></i>
                    <span>Pesanan</span>
                </a>
            </li>

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

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminpage.php">Home</a></li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
      <div class="col-lg-9">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produk</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($produkbuah as $produk) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $produk['id_barang']; ?></td>
                    <td><?= $produk['nama_barang']; ?></td>
                    <td>RP  <?= $produk['harga']; ?></td>
                    <td><?= $produk['qty']; ?></td>
                    <td><?= $produk['kategori']; ?></td>
                    <td><img src="assets/img/<?= $produk['foto_produk']; ?>" width="70"></td>
                    <th>
                      <a href="hapus-produk.php?id_barang=<?= $produk['id_barang'] ?>" onclick="return confirm('Apa Kamu Yakin Akan Menhapus Produk <?= $produk['nama_barang']; ?> ')" class="btn btn-danger" >Hapus</a>
                      <a href="detail-barang.php ?id_barang=<?= $produk['id_barang'] ?> " class="btn btn-info">Detail</a>
                      <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered<?= $produk['id_barang'] ?>">
                        Ubah </a>
                    </th>
                  </tr>
                <!-- modal -->
                <!-- Ubah Produk Modal -->
              <div class="modal fade" id="verticalycentered<?= $produk['id_barang'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Ubah Produk <?= $produk['nama_barang']; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action=""method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama_barang" placeholder="Name" required value="<?= $produk['nama_barang']; ?>">
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
                      <label for="Kategori" class="form-label" >Kategori</label>
                        <select class="form-select" aria-label="Default select example" id="Kategori" name="kategori" required>
                        <option selected>Pilih Kategori</option>
                        <option value="Buah" <?= $produk == 'Buah' ? 'selected' : null?>>Buah</option>
                        <option value="Parsel" <?= $produk == 'Parsel' ? 'selected' : null?>>Parsel</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Produk" required value="<?= $produk['deskripsi']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label" >Pilih Gambar</label>
                        <input class="form-control" type="file" id="foto" name="foto" value= <img src="assets/img/<?= $produk['foto_produk']; ?>" >
                      </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                      <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                      <a type="submit" name="ubahproduk" class="btn btn-primary">Ubah</a>
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
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Produk</h5>
           
            <form action=""method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Produk</label>
              <input type="text" class="form-control" id="nama" name="nama_barang" placeholder="Name" required>
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
            <label for="Kategori" class="form-label" >Kategori</label>
              <select class="form-select" aria-label="Default select example" id="Kategori" name="kategori" required>
              <option selected>Pilih Kategori</option>
              <option value="buah">Buah</option>
              <option value="parsel">Parsel</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Produk" required>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label" >Pilih Gambar</label>
              <input class="form-control" type="file" id="foto" name="foto" required>
            </div>
            <button type="submit" name="addproduk" class="btn btn-primary" style="float: right;">Tambah Produk</button>
            </form>
            </div>
          </div>
        </div>
        </div>



    </section>

  </main><!-- End #main -->

  <?php include 'assets/layout/footer.php';?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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