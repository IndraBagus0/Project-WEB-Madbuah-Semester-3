<?php
          include 'assets/layout/header.php';
          if (isset($_POST['add'])) {
              if (tambah_admin($_POST) >0) {
                      echo "<script>
                          alert('add admin succes');
                          document.location.href = 'data-admin.php';
                          </script>";
                    }else{
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
        <a class="nav-link collapsed" href="adminpage.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" href="produk-buah.php">
                    <i class="bi bi-menu-button-wide"></i><span>Product</span><i></i>
                </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="data-costumers.php">
              <i class="bi bi-circle"></i><span>Data Costumers</span>
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
          <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
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
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminpage.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-11">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Admin <span> <?php if ($_SESSION['level'] == "super_admin"): ?>
                <a href="#" type="submit" name="add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahadmin" style="float: right;">Tambah Admin</a>
              <?php endif; ?></span></h5> 
                <!-- Untuk Membatasi hak Akses -->
             
              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Role</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($admin as $data_admin) : ?>
                  <tr>
                    <td><?= $data_admin['id_admin']; ?></td>
                    <td><?= $data_admin['nama']; ?></td>
                    <td><?= $data_admin['username']; ?></td>
                    <td><?= $data_admin['email']; ?></td>
                    <td><?= $data_admin['no_telp']; ?></td>
                    <td><?= $data_admin['level']; ?></td>
                    <td><?= $data_admin['alamat']; ?></td>
                    <td><img src="assets/img/<?= $data_admin['foto']; ?>" width="70"></td>
                    <th>
                      <a href="hapus-admin.php?id_admin=<?= $data_admin['id_admin'] ?>" onclick="return confirm('are you sure want to delete this data?')">Hapus</a>
                    </th>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!--  -->
        <div class="modal fade" id="modaltambahadmin" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Admin</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action=""method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Name</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <label for="password" class="visually-hidden">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Address</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" required>
                    </div>
                    <div class="mb-3">
                      <label for="no_telp" class="form-label">Contact</label>
                      <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                    <label for="level" class="form-label" >Role</label>
                    <select class="form-select" aria-label="Default select example" id="level" name="level" required>
                    <option selected>Set As Role</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                    </select>
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label" >Select Photo</label>
                      <input class="form-control" type="file" id="foto" name="foto" >
                    </div>
                    <!-- <button type="submit" name="add" class="btn btn-primary" style="float: right;">Add</button> -->
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

        <!-- Untuk Membatasi hak Akses -->
        <!-- <?php if ($_SESSION['level'] == "super_admin"): ?>
        <div class="col-lg-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Admin</h5>
            <form action=""method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Name</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
             <label for="password" class="visually-hidden">Password</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Address</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Address" required>
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form-label">Contact</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Phone Number" required>
            </div>
            <div class="mb-3">
            <label for="level" class="form-label" >Role</label>
            <select class="form-select" aria-label="Default select example" id="level" name="level" required>
             <option selected>Set As Role</option>
             <option value="admin">Admin</option>
             <option value="super_admin">Super Admin</option>
            </select>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label" >Select Photo</label>
              <input class="form-control" type="file" id="foto" name="foto" >
            </div>
            <button type="submit" name="add" class="btn btn-primary" style="float: right;">Add</button>
            </form>
            </div>
          </div>
        </div>
        <?php endif; ?> -->

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