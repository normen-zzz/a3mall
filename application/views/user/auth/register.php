<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/logo/atigamalllogo.png') ?>" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Icon Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet" />

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/style.css" />

    <!-- Swipper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <title>A3Mall | Register</title>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h1>DAFTAR</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 shadow p-5">
                <form method="POST" action="<?= base_url('user/Auth/create_user')  ?>">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" aria-label="Username" aria-describedby="basic-addon1" />
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" name="first_name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" />
                        <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" name="last_name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" />
                        <?= form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="number" name="phone" class="form-control" aria-label="Username" aria-describedby="basic-addon1" />
                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Konfirmasi password</label>
                        <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1" />
                        <?= form_error('password_confirm', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode Referal (Isi Jika Mempunyai Kode Referal)</label>
                        <input type="text" name="referal" class="form-control" aria-label="Referal" aria-describedby="basic-addon1" />
                        <?= form_error('referal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </form>
                <p class="pt-3 text-center">Atau</p>
                <div class="d-grid">
                    <a class="btn btn-danger" href="<?= base_url('user/Auth/google')  ?>"><i class="text-white bi-google"></i>+ Login Dengan Google</a>
                </div>
                <hr />
                <p>Sudah punya akun? | <a class="text-dark" href="<?= base_url('Login') ?>">Login disini</a></p>
            </div>
        </div>
    </div>
</body>

<script src="<?= base_url('assets/user/') ?>js/jquery-3.3.1.slim.min.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- My JS -->
<script src="<?= base_url('assets/user/') ?>js/script.js"></script>

</html>