<!-- Navbar -->
<?php $brand = $this->db->get('brand_product')->result_array(); ?>
<nav class="navbar navbar-expand-md navbar-light bg-white my-auto" id="navbar">
    <div class="container">
        <div class="img">
            <a href="<?= base_url('Dashboard') ?>"><img src="<?= base_url('assets/user/') ?>img/logo-gradiant_revisi01022022-2.png" height="50" alt="" /></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav navb ms-5 me-auto">
                <li class="nav-item ms-3">

                    <a class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == False) {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Dashboard') ?>">Beranda</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'Product') {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Product') ?>">Produk</a>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle <?php if ($this->uri->segment(1) == 'Brand') {
                                                            echo 'active';
                                                        } ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Brand </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($brand as $brand) { ?>
                            <li><a class="dropdown-item" href="<?= base_url('Brand/' . $brand['name_brand']) ?>"><?= $brand['name_brand'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'Blog') {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Blog') ?>">Blog</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link <?php if ($this->uri->segment(1) == 'Catalogue') {
                                            echo 'active';
                                        } ?>" href="<?= base_url('Catalogue') ?>">Katalog</a>

                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item cartres my-auto">
                    <div id="cart" class="d-none"></div>
                    <a href="<?= base_url('Cart') ?>" class="cart h5 my-auto text-dark position-relative d-inline-flex" aria-label="View your shopping cart">
                        <i class="bi bi-cart3"></i>
                        <div id="total_items"></div>
                    </a>
                </li>

                <!-- Jika Login Manual -->
                <?php if ($this->session->userdata('email')) { ?>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle shadow bg-danger" src="<?= base_url('assets/user/img/profile/' . $user['photo']) ?>" width="30" height="30" alt="" />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <p class="fw-light text-secondary small text-center">Hai, <?= $user['first_name'] . ' ' . $user['last_name'] ?></p>
                            </li>
                            <li>
                                <p class="fw-light text-secondary small text-center">
                                    Saldo: Rp. <?= number_format($user['saldo'], '0', ',', '.') ?>
                                </p>
                            </li>
                            <hr />
                            <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Status') ?>">Status Pesanan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Alamat') ?>">Alamat</a></li>
                            <?php $CI = &get_instance();
                            $CI->load->model('Referal_model');
                            $referal = $CI->Referal_model->getReferal($usergoogle['referal'])->row();
                            if ($referal->level_referal == 2) { ?>
                                <li><a class="dropdown-item" href="<?= base_url('Referal') ?>">Status Referal</a></li>
                            <?php } ?>
                            <hr />
                            <li><a class="dropdown-item" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                        </ul>
                    </li>
                    <!-- Jika Login Google -->
                <?php } elseif ($this->session->userdata('user_data')) { ?>
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle shadow bg-danger" src="<?= base_url('assets/user/img/profile/' . $usergoogle['photo']) ?>" width="30" height="30" alt="" />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <p class="fw-light text-secondary small text-center">Hai, <?= $usergoogle['first_name'] ?></p>
                            </li>
                            <li>
                                <p class="fw-light text-secondary small text-center">
                                    Saldo: Rp. <?= number_format($usergoogle['saldo'], '0', ',', '.') ?>
                                </p>
                            </li>
                            <hr />
                            <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Status') ?>">Status Pesanan</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Alamat') ?>">Alamat</a></li>
                            <?php
                            $CI = &get_instance();
                            $CI->load->model('Referal_model');
                            $referal = $CI->Referal_model->getReferal($usergoogle['referal'])->row();
                            if ($referal->level_referal == 2) { ?>
                                <li><a class="dropdown-item" href="<?= base_url('Referal') ?>">Status Referal</a></li>
                            <?php } ?>
                            <hr />
                            <li><a class="dropdown-item" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="nav-item my-auto">
                        <a class="nav-link h4 my-auto text-dark rounded-pill" href="<?= base_url('Login') ?>"><i class="bi bi-person"></i></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Akhir Navbar -->