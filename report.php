<?php
include 'assets/layout/header.php';
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
            <a class="nav-link" href="report.php">
                <i class="bi bi-bar-chart" class="active"></i>
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
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="laporan.php">Laporan</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
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

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $pesanan) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pesanan['id_transaksi']; ?></td>
                                        <td><?= $pesanan['fullname']; ?></td>
                                        <td><?= $pesanan['tanggal_beli']; ?></td>
                                        <td><?= $pesanan['qty']; ?> Produk</td>
                                        <td><?= $pesanan['total']; ?></td>
                                        <td><?= $pesanan['status']; ?></td>
                                    </tr>
                            </tbody>
                        <?php endforeach; ?>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->
        </div>
        <section class="section">
</main><!-- End #main -->
<!-- Css invoive -->

<?php
include 'assets/layout/footer.php';
?>