<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Administrator</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title ?></h4>
                        </div>
                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahAdminModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Admin</button>
                        </div>
                        <div class="col mt-2">
                            <a href="<?= base_url('admin/Administrator/group') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Group</a>
                        </div>
                        <div class="col">
                            <!-- <button data-toggle="modal" data-target="#tambahPhotoBarangModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Photo</button> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="showdata">
                                        <?php $no = 0;
                                        foreach ($admin as $admin) {
                                            $no++ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $admin['username'] ?></td>
                                                <td><?= $admin['email'] ?></td>
                                                <td><?= $admin['first_name'] ?></td>
                                                <td><?= $admin['last_name'] ?></td>
                                                <td><?= $admin['phone'] ?></td>
                                                <td><?= $admin['name'] ?></td>
                                                <td>
                                                    <a href="javascript:;" class="btn btn-primary mt-1 item-detail" data="<?php echo $admin['email'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Barang/deleteAdmin/' . urlencode($admin['email'])) ?>" class="btn btn-danger mt-1" onclick="return confirm('Anda Yakin Ingin Menghapus?')">hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<!-- modal ubah Admin  -->
<div class="modal fade" tabindex="-1" role="dialog" id="editAdminModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $url = $this->uri->segment(3);
                if ($url == 'editBarang') {
                    $url = $this->uri->segment(4);
                }
                ?>
                <form action="<?= base_url('admin/Administrator/editAdmin') ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="ganti_gambar" hidden>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" readonly>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>password (Isi Jika Ingin Mengubah Password)</label>
                        <input type="text" name="password" class="form-control">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Group</label>
                        <select name="group" class="form-control" id="group" required>
                            <?php foreach ($group as $group) { ?>
                                <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                        <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                        <?= form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Photo (Isi Jika Ingin Mengubah Photo)</label>
                        <input type="file" name="photo" class="form-control">
                        <?= form_error('photo', '<small class="text-danger">', '</small>'); ?>
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal tambah barang -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahAdminModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $url = $this->uri->segment(3);
                if ($url == 'addBarang') {
                    $url = $this->uri->segment(4);
                }
                ?>
                <form action="<?= base_url('admin/Administrator/addAdmin') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="text" name="password" class="form-control" required>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Group</label>
                        <select name="group" class="form-control" required>
                            <?php foreach ($group as $group) { ?>
                                <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                        <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                        <?= form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control" required>
                        <?= form_error('photo', '<small class="text-danger">', '</small>'); ?>
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#showdata').on('click', '.item-detail', function() {
        var email = $(this).attr('data');
        $('#editAdminModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Administrator/getAdmin',
            data: {
                email: email,
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=username]').val(data.username);
                $('input[name=email]').val(data.email);
                $('input[name=first_name]').val(data.first_name);
                $('input[name=last_name]').val(data.last_name);
                $('input[name=phone]').val(data.phone);
                $('input[name=ganti_gambar]').val(data.photo);
                $(`select[name=group] option[value=${data.group}]`).attr('selected', true);
                // $('select[name=status]').val(data.status_product);
            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>

<!-- <div class="modal fade" tabindex="-1" role="dialog" id="tambahPhotoBarangModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/Barang/addPhotoBarang/' . $this->uri->segment('4')) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Describe</label>
                        <textarea class="form-control" name="describe"></textarea>
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>


            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div> -->

<!-- modal Image -->
<!-- <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 95%;">
            </div>
        </div>
    </div>
</div> -->



<!-- <script>
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script> -->