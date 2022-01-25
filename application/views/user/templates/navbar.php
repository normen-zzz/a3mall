 <?php if ($this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == NULL) { ?>
     <!-- Navbar Dashboard -->
     <nav class="navbar navbar-expand-md navbar-light fixed-top my-auto" id="navbar">
         <div class="container">
             <a class="navbar-brand fw-bold bt" href="<?= base_url('Dashboard') ?>">A3MALL</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ms-5 me-auto">
                     <li class="nav-item">
                         <a class="nav-link active" href="<?= base_url('Dashboard') ?>">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link bt" href="<?= base_url('Product') ?>">Produk</a>
                     </li>
                 </ul>
                 <ul class="navbar-nav">
                     <li class="nav-item my-auto me-3">
                         <!-- <form class="input-group border-1 border rounded-3">
                             <span class="input-group-text border-0 bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
                             <input class="form-control border-0" type="search" placeholder="Search" aria-label="Search" />
                         </form> -->
                     </li>
                     <li class="nav-item cartres my-auto me-4">
                         <div id="cart" class="d-none"></div>
                         <a href="./keranjang.html" class="cart h5 bt position-relative d-inline-flex" aria-label="View your shopping cart">
                             <i class="bi bi-cart3"></i>
                             <div id="total_items"></div>
                         </a>
                     </li>
                     <!-- Jika Login Manual -->
                     <?php if ($this->session->userdata('email')) { ?>
                         <li class="nav-item dropdown my-auto">
                             <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img class="rounded-circle shadow bg-danger" src="" width="30" height="30" alt="" />
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <li>
                                     <p class="fw-light text-secondary small text-center">Hai, <?= $user['first_name'] . ' ' . $user['last_name'] ?></p>
                                 </li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                                 <li><a class="dropdown-item" href="#">Status Pesanan</a></li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                             </ul>
                         </li>
                         <!-- Jika Login Google -->
                     <?php } elseif ($this->session->userdata('user_data')) {

                            $user_data = $this->session->userdata('user_data');
                        ?>
                         <li class="nav-item dropdown my-auto">
                             <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img class="rounded-circle shadow bg-danger" src="<?= $user_data['picture'] ?>" width="30" height="30" alt="" />
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <li>
                                     <p class="fw-light text-secondary small text-center">Hai, <?= $user_data['name'] ?></p>
                                 </li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                                 <li><a class="dropdown-item" href="#">Status Pesanan</a></li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                             </ul>
                         </li>
                     <?php } else { ?>
                         <li class="nav-item my-auto">
                             <a class="nav-link my-auto bt btn btn-warning px-5 rounded-pill" href="<?= base_url('Login') ?>">Login</a>
                         </li>
                     <?php } ?>


                 </ul>
             </div>
         </div>
     </nav>
     <!-- Akhir Navbar -->

 <?php } else { ?>
     <!-- Navbar Selain Dashboard -->
     <nav class="navbar navbar-expand-lg navbar-light py-3" id="navbar">
         <div class="container">
             <a class="navbar-brand fw-bold" href="<?= base_url('Dashboard') ?>">A3MALL</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ms-5 me-auto">
                     <li class="nav-item">
                         <a class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) === FALSE) {
                                                echo 'active';
                                            } ?>" href="<?= base_url('Dashboard') ?>">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link  <?php if ($this->uri->segment(1) == 'Product' || $this->uri->segment(1) === FALSE) {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('Product') ?>">Produk</a>
                     </li>
                 </ul>
                 <ul class="navbar-nav">
                     <li class="nav-item my-auto me-3">
                         <form class="input-group">
                             <span class="input-group-text border-0 bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
                             <input class="form-control border-0" type="search" placeholder="Search" aria-label="Search" />
                         </form>
                     </li>
                     <li class="nav-item cartres my-auto me-4">
                         <div id="cart" class="d-none"></div>
                         <a href="<?= base_url('Cart') ?>" class="cart text-dark h5 position-relative d-inline-flex" aria-label="View your shopping cart">
                             <i class="bi bi-cart3"></i>
                             <div id="total_items">

                             </div>
                         </a>
                     </li>
                     <?php if ($this->session->userdata('email')) { ?>
                         <li class="nav-item dropdown my-auto">
                             <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img class="rounded-circle shadow bg-danger" src="" width="30" height="30" alt="" />
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <li>
                                     <p class="fw-light text-secondary small text-center">Hai, <?= $user['first_name'] . ' ' . $user['last_name'] ?></p>
                                 </li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                                 <li><a class="dropdown-item" href="#">Status Pesanan</a></li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                             </ul>
                         </li>
                     <?php } elseif ($this->session->userdata('user_data')) {
                            $user_data = $this->session->userdata('user_data'); ?>

                         <li class="nav-item dropdown my-auto">
                             <a class="nav-link dropdown-toggle small my-auto" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img class="rounded-circle shadow bg-danger" src="<?= $user_data['picture'] ?>" width="30" height="30" alt="" />
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <li>
                                     <p class="fw-light text-secondary small text-center">Hai, <?= $user_data['name'] ?></p>
                                 </li>
                                 <hr />
                                 <li><a class="dropdown-item" href="<?= base_url('Profile') ?>">Profile</a></li>
                                 <li><a class="dropdown-item" href="#">Staus Pesanan</a></li>
                                 <hr />
                                 <li><a class="dropdown-item" onclick="alert('Apakah anda yakin ingin logout?')" href="<?= base_url('user/Auth/logout') ?>">Log Out</a></li>
                             </ul>
                         </li>
                     <?php } else { ?>
                         <li class="nav-item my-auto">
                             <a class="nav-link my-auto bt btn btn-warning px-5 rounded-pill" href="<?= base_url('Login') ?>">Login</a>
                         </li>
                     <?php } ?>

                 </ul>
             </div>
         </div>
     </nav>
     <!-- Akhir Navbar -->
 <?php } ?>