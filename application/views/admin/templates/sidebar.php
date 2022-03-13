<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">A3Mall</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">A3</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <?php if ($user['group'] == 1 || $user['group'] == 3) { ?>
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
                <li class="menu-header">Popup</li>
                <li class="<?php if ($this->uri->segment(2) == "popup" || $this->uri->segment(2) == "Popup") {
                                echo "active";
                            } ?>"><a class="nav-link" href="<?= base_url('admin/Popup') ?>"><i class="fas fa-fire"></i> <span>Popup</span></a></li>

                <li class="menu-header">Carousel</li>
                <li class="<?php if ($this->uri->segment(2) == "carousel" || $this->uri->segment(2) == "Carousel") {
                                echo "active";
                            } ?>"><a class="nav-link" href="<?= base_url('admin/Carousel') ?>"><i class="fas fa-fire"></i> <span>Carousel</span></a></li>

                <li class="menu-header">Blog</li>
                <li class="<?php if ($this->uri->segment(2) == "blog" || $this->uri->segment(2) == "Blog") {
                                echo "active";
                            } ?>"><a class="nav-link" href="<?= base_url('admin/Blog') ?>"><i class="fas fa-fire"></i> <span>Blog</span></a></li>
                <li class="menu-header">Catalogue</li>
                <li class="<?php if ($this->uri->segment(2) == "catalogue" || $this->uri->segment(2) == "Catalogue") {
                                echo "active";
                            } ?>"><a class="nav-link" href="<?= base_url('admin/Catalogue') ?>"><i class="fas fa-fire"></i> <span>Catalogue</span></a></li>

                <li class="menu-header">Pembayaran</li>
                <li class="<?php if ($this->uri->segment(2) == "pembayaran" || $this->uri->segment(2) == "Pembayaran") {
                                echo "active";
                            } ?>"><a class="nav-link" href="<?= base_url('admin/Pembayaran') ?>"><i class="fas fa-fire"></i> <span>Pembayaran</span></a></li>
                <?php if ($user['group'] == 1) { ?>
                    <li class="menu-header">Administrator</li>
                    <li class="<?php if ($this->uri->segment(2) == "administrator" || $this->uri->segment(2) == "Administrator") {
                                    echo "active";
                                } ?>"><a class="nav-link" href="<?= base_url('admin/Administrator') ?>"><i class="fas fa-fire"></i> <span>Administrator</span></a></li>
            <?php }
            } ?>

    </aside>
</div>