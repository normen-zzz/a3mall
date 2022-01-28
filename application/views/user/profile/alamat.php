<?php if ($alamat == '') { ?>
    <!-- Belum ada alamat -->
    <section class="my-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col">
                    <h2>Alamat Saya</h2>
                </div>
            </div>
            <div class="row bg-white p-5 shadow">
                <div class="col text-center">
                    <button type="button" class="btn yellow-button px-5 py-3" data-bs-toggle="modal" data-bs-target="#exampleModal1">Buat Alamat</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Belum ada alamat -->
<?php } else { ?>

    <!-- Profile -->
    <section class="py-5 bg-light" id="profile">
        <div class="container py-5">
            <div class="row pb-3">
                <div class="col">
                    <h2>Alamat Saya</h2>
                </div>
            </div>
            <?php foreach ($alamat as $alamat) { ?>
                <div class="row bg-white p-5 shadow">
                    <div class="col">
                        <p><?= $alamat['nama_alamat'] ?></p>
                        <p><?= $alamat['telp_alamat'] ?></p>
                        <p><?= $alamat['detail_alamat'] ?> <?= $alamat['nama_kelurahan'] ?> - <?= $alamat['nama_kecamatan'] ?>, <?= $alamat['nama_kabupaten'] ?>, <?= $alamat['nama_provinsi'] ?> ID <?= $alamat['pos_alamat'] ?></p>
                    </div>
                    <div class="col-2 text-end mb-auto">
                        <button type="button" class="btn" style="text-decoration: underline" data-bs-toggle="modal" data-bs-target="#exampleModal1">ubah</button>
                        <a href="<?= base_url('user/Profile/deleteAlamat/' . $alamat['id_alamat']) ?>" class="btn" onclick="return confirm('Apakah Yakin ingin Menghapus Alamat?')" style="text-decoration: underline">hapus</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- ./Profile -->
<?php } ?>


<!-- Modal  -->
<!-- Modal edit -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Alamat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="POST" action="<?= base_url('user/Profile/addAlamat') ?>" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="validationCustom01" required />
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">No Telepon</label>
                        <input type="number" name="phone" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Provinsi</label>
                        <select class="form-select" name="provinsi" id="provinsi" required>
                            <option selected disabled value="">Choose...</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Kabupaten</label>
                        <select class="form-select" name="kabupaten" id="kabupaten" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Kecamatan</label>
                        <select class="form-select" name="kecamatan" id="kecamatan" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Kelurahan</label>
                        <select class="form-select" name="kelurahan" id="kelurahan" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Kode Pos</label>
                        <input type="text" name="pos" class="form-control" id="validationCustom05" required />
                        <div class="invalid-feedback">Please provide a valid zip.</div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"> Detail Alamat </label>
                            <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal edit -->

<!-- Modal Hapus -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Hapus -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
    var render = createwidgetlokasi("provinsi", "kabupaten", "kecamatan", "kelurahan");
</script>