<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

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

    <title>Hello, world!</title>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h1>MASUK</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <form method="POST" action="<?= base_url('user/auth/login') ?>" class="needs-validation" novalidate="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="identity" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                    </div>
                    <div class="mb-3 form-check">
                        <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1" />
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Log In</button>
                    </div>
                </form>
                <p class="pt-3 text-center">or</p>
                <div class="d-grid">
                    <a href="<?= base_url('user/Auth/google') ?>" class="btn btn-danger" type="submit"><i class="text-white bi-google"></i>+ Continue with Google</a>
                </div>
                <hr />
                <a class="text-dark" href="<?= base_url('Register') ?>">Create a new account</a>
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