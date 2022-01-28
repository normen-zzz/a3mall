<!-- Profile -->
<!-- Jika Bukan Akun Google -->
<?php if ($this->session->userdata('email')) { ?>
    <section class="py-5 bg-light" id="profile">
        <div class="container py-5">
            <div class="row bg-white p-5 shadow">
                <div class="col-lg-2 me-5 bg-danger mb-3">
                    <img src="./assets/img/profile/img-profile.png" class="card-img-top" alt="..." />
                </div>
                <div class="col-lg">
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">username</p>
                        </div>
                        <div class="col">
                            <p>Nama Lengkap</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">No Telp</p>
                        </div>
                        <div class="col">
                            <p>0878126317</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">Email</p>
                        </div>
                        <div class="col">admin@admin.com</div>
                    </div>
                    <button type="button" class="btn px-5 yellow-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="py-5 bg-light" id="profile">
        <div class="container py-5">
            <div class="row bg-white p-5 shadow">
                <div class="col-lg-2 me-5 bg-danger mb-3">
                    <img src="<?= base_url('assets/user/img/profile/' . $usergoogle['photo']) ?>" class="card-img-top" alt="..." />
                </div>
                <div class="col-lg" id="showdata">
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">Nama Depan</p>
                        </div>
                        <div class="col">
                            <p><?= $usergoogle['first_name'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">Nama Belakang</p>
                        </div>
                        <div class="col">
                            <p><?= $usergoogle['last_name'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">No Telp</p>
                        </div>
                        <div class="col">
                            <p><?= $usergoogle['phone'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <p class="fw-light text-secondary">Email</p>
                        </div>
                        <div class="col"><?= $usergoogle['email'] ?></div>
                    </div>
                    <button type="button" id="ubah" class="btn px-5 yellow-button item-detail" data-email="<?= $usergoogle['email'] ?>" data-first_name="<?= $usergoogle['first_name'] ?>" data-last_name="<?= $usergoogle['last_name'] ?>" data-phone="<?= $usergoogle['phone'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<!-- ./Profile -->

<!-- Modal edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('user/Profile/ubahProfile') ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" name="first_name" class="form-control" />
                        <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" name="last_name" class="form-control" />
                        <?= form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="number" name="phone" class="form-control" />
                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal edit -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#ubah').click(function() {
        var email = $(this).data("email");
        var first_name = $(this).data("first_name");
        var last_name = $(this).data("last_name");
        var phone = $(this).data("phone");
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>user/Profile/getProfile',
            data: {
                email: email,
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=first_name]').val(data.first_name);
                $('input[name=last_name]').val(data.last_name);
                $('input[name=phone]').val(data.phone);
                $('input[name=email]').val(data.email);
            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>