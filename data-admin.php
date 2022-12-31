<?php
include 'assets/layout/header.php';
if (isset($_POST['add'])) {
  if (tambah_admin($_POST) > 0) {
    echo "<script>
                          alert('add admin succes');
                          document.location.href = 'data-admin.php';
                          </script>";
  } else {
    echo "<script>
                    alert('cannot add admin');
                    document.location.href = 'data-admin.php';
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
          <a href="data-costumers.php">
            <i class="bi bi-circle"></i><span>Data Pelanggan</span>
          </a>
        </li>
        <li>
          <a href="data-admin.php" class="active">
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
    <h1>Data Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item">Pengguna</li>
        <li class="breadcrumb-item active">Admin</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-11">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Admin <span><?php if ($_SESSION['status'] == "super_admin") : ?>
                  <a href="#" type="submit" name="add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahadmin" style="float: right;">Tambah Admin</a>
                <?php endif; ?></span></h5>
            <!-- Untuk Membatasi hak Akses -->
            <!-- Table with hoverable rows -->
            <table class="table table-hover">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Status</th>
                <th scope="col">Alamat</th>
                <th scope="col"></th>
              </tr>
              </thead>
              <tbody>
                <?php foreach ($admin as $data_admin) : ?>
                  <tr>
                    <td><?= $data_admin['id_user']; ?></td>
                    <td><?= $data_admin['fullname']; ?></td>
                    <td><?= $data_admin['username']; ?></td>
                    <td><?= $data_admin['email']; ?></td>
                    <td><?= $data_admin['no_telp']; ?></td>
                    <td><?= $data_admin['status']; ?></td>
                    <td><?= $data_admin['alamat']; ?></td>
                    <th>
                      <?php if ($_SESSION['status'] == "super_admin") : ?>
                        <a href="hapus-admin.php?id_user=<?= $data_admin['id_user'] ?>" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal<?= $data_admin['id_user'] ?>">
                          hapus </a>
                      <?php endif; ?>
                    </th>
                  </tr>
                  <!-- modal hapus -->
                  <div class="modal fade" id="delete_modal<?= $data_admin['id_user'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Hapus Admin</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Yakin Akan Menghapus Admin Dengan Username <?= $data_admin['username']; ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="hapus-admin.php?id_user=<?= $data_admin['id_user'] ?>" class="btn btn-danger">Hapus </a>
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


      <!-- modal add admin -->
      <div class="modal fade" id="modaltambahadmin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <label for="password" class="visually-hidden">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                  <label for="fullname" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" required>
                </div>
                <div class="mb-3">
                  <label for="no_telp" class="form-label">Nomor Telepon</label>
                  <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Phone Number" required>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" aria-label="Default select example" id="status" name="status" required>
                    <option selected>Set As Role</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                  </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="add" class="btn btn-primary" style="float: right;">Tambah Data</button>
              <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
              <!-- <a type="submit" name="ubahproduk" class="btn btn-primary">Ubah</a> -->
            </div>
            </form>
          </div>
        </div>
      </div><!-- End Ubah Produk Modal-->
  </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
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