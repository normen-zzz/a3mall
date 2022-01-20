 <?php if ($this->uri->segment(1) == 'Dashboard') { ?>
     <!-- Navbar Dashboard -->
     <nav class="navbar navbar-expand-md navbar-light fixed-top my-auto" id="navbar">
         <div class="container">
             <a class="navbar-brand fw-bold bt" href="#">A3MALL</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ms-5 me-auto">
                     <li class="nav-item">
                         <a class="nav-link bt active" href="#">Home</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link bt dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="#">Sofa</a></li>
                             <li><a class="dropdown-item" href="#">Spring Bed</a></li>
                         </ul>
                     </li>
                 </ul>
                 <ul class="navbar-nav">
                     <li class="nav-item my-auto me-3">
                         <form class="input-group">
                             <span class="input-group-text border-0 bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
                             <input class="form-control border-0" type="search" placeholder="Search" aria-label="Search" />
                         </form>
                     </li>
                     <li class="nav-item my-auto me-3">
                         <a class="nav-link h5 my-auto bt" href="#"><i class="bi bi-cart3"></i></a>
                     </li>
                     <li class="nav-item dropdown my-auto">
                         <a class="nav-link dropdown-toggle bt" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <img class="rounded-circle shadow bg-danger" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" width="30" height="30" alt="" />
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="#">Profile</a></li>
                             <li><a class="dropdown-item" href="#">Staus Pesanan</a></li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Akhir Navbar -->

 <?php } else { ?>
     <!-- Navbar Selain Dashboard -->
     <nav class="navbar navbar-expand-lg navbar-light py-3">
         <div class="container">
             <a class="navbar-brand fw-bold" href="#">A3MALL</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ms-5 me-auto">
                     <li class="nav-item">
                         <a class="nav-link active" href="#">Home</a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="#">Sofa</a></li>
                             <li><a class="dropdown-item" href="#">Spring Bed</a></li>
                         </ul>
                     </li>
                 </ul>
                 <ul class="navbar-nav">
                     <li class="nav-item my-auto me-3">
                         <form class="input-group">
                             <span class="input-group-text border-0 bg-white" id="basic-addon1"><i class="bi bi-search"></i></span>
                             <input class="form-control border-0" type="search" placeholder="Search" aria-label="Search" />
                         </form>
                     </li>
                     <li class="nav-item my-auto me-3">
                         <a class="nav-link h5" href="#"><i class="bi bi-cart3"></i></a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <img class="rounded-circle shadow" src="<?= base_url('assets/user/') ?>img/profile/img-profile.png" width="30" height="30" alt="" />
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item" href="#">Profile</a></li>
                             <li><a class="dropdown-item" href="#">Staus Pesanan</a></li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Akhir Navbar -->
 <?php } ?>