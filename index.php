<?php

include 'assets/layout/header.php';

//Menghitung Jumlah Pengguna
$data_pelanggan = mysqli_query($koneksi, "SELECT * FROM data_user WHERE status= 'user'");
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);

$data_penjualan = mysqli_query($koneksi, "SELECT * FROM transaksi");
$jumlah_penjualan = mysqli_num_rows($data_penjualan);


?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav " id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.php">
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
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Penjualan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $jumlah_penjualan; ?> Penjualan</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Pendapatan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Rp 1.345.264</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Pengguna</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $jumlah_pelanggan; ?> Pengguna</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->


                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Penjualan Terakhir</h5>
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
                                                <td>RP <?= $pesanan['total']; ?></td>
                                                <td><?= $pesanan['status_transaksi']; ?></td>
                                                <!-- <td><span class="badge rounded-pill bg-success ">Selesai</span></td> -->

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="filter">
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Penjualan Teratas</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">terjual</th>
                                        <th scope="col">Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/anggur.svg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Anggur</a></td>
                                        <td>$64</td>
                                        <td class="fw-bold">124</td>
                                        <td>$5,828</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/mangga.svg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Mangga</a></td>
                                        <td>$46</td>
                                        <td class="fw-bold">98</td>
                                        <td>$4,508</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                        <td>$59</td>
                                        <td class="fw-bold">74</td>
                                        <td>$4,366</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                        <td>$32</td>
                                        <td class="fw-bold">63</td>
                                        <td>$2,016</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                                        <td>$79</td>
                                        <td class="fw-bold">41</td>
                                        <td>$3,239</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End activity item-->

                <!-- Recent Cictumers-->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Pelanggan Terbaru</h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pelanggan as $data_pelanggan) : ?>
                                        <tr>
                                            <td><?= $data_pelanggan['id_user']; ?></td>
                                            <td><?= $data_pelanggan['fullname']; ?></td>
                                            <td><?= $data_pelanggan['email']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>




        </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php include 'assets/layout/footer.php'; ?>