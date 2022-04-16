<!-- BE -->
<section>
    <div class="container-fluid bg-white">
        <div class="row justify-content-center">
            <div class="col-lg-7 p-5 border">
                <h2 class="text-center pb-5">FORM Data Diri Business Executive</h2>
                <h4><?= $this->session->flashdata('message') ?></h4>
                <form method="POST" action="<?= base_url('user/Referal/addFormReferal') ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Panjang</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control border-0 bg-light" placeholder="Please type here.." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="place_birth" value="<?php echo set_value('place_birth'); ?>" class="form-control border-0 bg-light" placeholder="Please type here.." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" id="date" value="<?php echo set_value('date_birth'); ?>" onclick="this.type='date'" onblur="this.type='text'" placeholder="Cth : 22/03/1998" class="form-control border-0 bg-light" name="date_birth" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat (Sesuai Ktp)</label>
                        <input type="text" name="address_ktp" value="<?php echo set_value('address_ktp'); ?>" class="form-control border-0 bg-light" placeholder="Please type here.." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Saat Ini (Isi Jika alamat sekarang tidak sesuai ktp)</label>
                        <input type="text" name="address_domisili" value="<?php echo set_value('address_domisili'); ?>" class="form-control border-0 bg-light" placeholder="Please type here.." />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telp / WA</label>
                        <input type="number" name="number" value="<?php echo set_value('number'); ?>" class="form-control border-0 bg-light" placeholder="Please type here.." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" value="<?= $email ?>" class="form-control border-0 bg-light" placeholder="Please type here.." disabled />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Diri</label>
                        <input class="form-control" type="file" value="<?php echo set_value('photo_person'); ?>" name="photo_person" id="formFile" required />
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Ktp</label>
                        <input class="form-control" type="file" value="<?php echo set_value('photo_ktp'); ?>" name="photo_ktp" id="formFile" required />
                    </div>
                    <div class="text-center pt-4">
                        <button type="submit" onclick="confirm('Apakah Anda yakin Semua data sudah benar?')" class="btn yellow-button px-5 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- BE End -->