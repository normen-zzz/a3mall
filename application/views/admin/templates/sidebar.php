<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="menu-header">Dashboard</li>
            <li class="<?php if ($this->uri->segment(2) == "dashboard" || $this->uri->segment(2) == "Dashboard") {
                            echo "active";
                        } ?>"><a class="nav-link" href="<?= base_url('admin/Dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li> -->

            <li class="menu-header">Data Barang</li>
            <li class="<?php if ($this->uri->segment(2) == "Barang") {
                            echo "active";
                        } ?> nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Barang</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if ($this->uri->segment(3) == "springbed") {
                                    echo "active";
                                } ?>"><a class="nav-link" href="<?= base_url('admin/Barang/springbed') ?>">Spring Bed</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "sofa") {
                                    echo "active";
                                } ?>"><a class="nav-link" href="<?= base_url('admin/Barang/sofa') ?>">Sofa</a></li>
                </ul>
            </li>
            <li class="menu-header">Data Pemesanan</li>
            <li class="nav-item dropdown <?php if ($this->uri->segment(2) == 'Transaksi') {
                                                echo 'active';
                                            } ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i> <span>Status Pesanan</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if ($this->uri->segment(3) == 'unPaid') {
                                    echo 'active';
                                } ?>"><a class="nav-link " href="<?= base_url('admin/Transaksi/unPaid') ?>">Belum Dibayar</a></li>
                    <li class="<?php if ($this->uri->segment(3) == 'paid') {
                                    echo 'active';
                                } ?>"><a class="nav-link " href="<?= base_url('admin/Transaksi/paid') ?>">Sudah Dibayar</a></li>
                    <li class="<?php if ($this->uri->segment(3) == 'onProgress') {
                                    echo 'active';
                                } ?>"><a class="nav-link " href="<?= base_url('admin/Transaksi/onProgress') ?>">On Progress</a></li>
                    <li class="<?php if ($this->uri->segment(3) == 'done') {
                                    echo 'active';
                                } ?>"><a class="nav-link " href="<?= base_url('admin/Transaksi/done') ?>">Selesai</a></li>
                </ul>
            </li>
    </aside>
</div>