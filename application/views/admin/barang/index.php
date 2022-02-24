<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title2 ?></h4>
                        </div>

                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahBarangModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Barang</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Before Price</th>
                                            <th>Describe</th>
                                            <th>Category</th>
                                            <th>Last Edited By</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php foreach ($barang as $barang) { ?>
                                            <tr>
                                                <td><?= $barang['kd_product'] ?></td>
                                                <td><?= $barang['name_product'] ?></td>
                                                <td><?= number_format($barang['price_product'], '0', ',', '.') ?></td>
                                                <td><?= number_format($barang['beforeprice_product'], '0', ',', '.') ?></td>
                                                <td><?= $barang['describe_product'] ?></td>
                                                <td><?= $barang['name_category'] ?></td>
                                                <td><?= $barang['username'] ?></td>
                                                <td>
                                                    <?php if ($barang['status_product'] == 'active') {
                                                        echo '<div class="badge badge-success">Active</div>';
                                                    } else {
                                                        echo '<div class="badge badge-secondary">Not Active</div>';
                                                    } ?>

                                                </td>
                                                <td><?= $barang['created_product'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/Barang/variationBarang/' . $barang['kd_product']) ?>" class="btn btn-secondary mt-1">Variation</a>
                                                    <a href="<?= base_url('admin/Barang/unitProduct/' . $barang['kd_product']) ?>" class="btn btn-secondary mt-1">Unit</a>
                                                    <a href="javascript:;" class="btn btn-primary mt-1 item-detail" data="<?php echo $barang['kd_product'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Barang/photoBarang/' . $barang['kd_product']) ?>" class="btn btn-warning mt-1">Photo</a>
                                                    <a href="<?= base_url('admin/Barang/deleteBarang/' . $barang['kd_product']) ?>" class="btn btn-danger mt-1" onclick="return confirm('Anda Yakin Ingin Menghapus?')">hapus</a>

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

<!-- modal tambah barang -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahBarangModal">
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
                <form action="<?= base_url('admin/Barang/addBarang/' . $url) ?>" method="post">
                    <input type="text" name="jenis" value="<?php if ($this->uri->segment(3) == 'addBarang') {
                                                                echo $this->uri->segment(4);
                                                            } else {
                                                                echo $this->uri->segment(3);
                                                            } ?>" hidden>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control">
                        <?= form_error('code', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Describe</label>
                        <textarea class="form-control" name="describe"></textarea>
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="1">Spring Bed</option>
                            <option value="2">Sofa</option>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Before Price</label>
                        <input type="text" id="tanpa-rupiah" name="beforeprice" class="form-control">
                        <?= form_error('beforeprice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control">
                        <?= form_error('brand', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="Deactive">Deactive</option>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Arrived</label>
                        <input type="date" name="date" class="form-control">
                        <?= form_error('date', '<small class="text-danger">', '</small>'); ?>
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

<!-- modal ubah barang  -->
<div class="modal fade" tabindex="-1" role="dialog" id="editBarangModal">
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
                if ($url == 'editBarang') {
                    $url = $this->uri->segment(4);
                }
                ?>
                <form action="<?= base_url('admin/Barang/editBarang/' . $url) ?>" method="post">
                    <input type="text" name="jenis" value="<?php if ($this->uri->segment(3) == 'editBarang') {
                                                                echo $this->uri->segment(4);
                                                            } else {
                                                                echo $this->uri->segment(3);
                                                            } ?>" hidden>
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" readonly>
                        <?= form_error('code', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Describe</label>
                        <textarea class="form-control" name="describe"></textarea>
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="1">Spring Bed</option>
                            <option value="2">Sofa</option>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Before Price</label>
                        <input type="text" id="tanpa-rupiah" name="beforeprice" class="form-control">
                        <?= form_error('beforeprice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control">
                        <?= form_error('brand', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="deactive">Deactive</option>
                        </select>
                        <?= form_error('category', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Arrived</label>
                        <input type="date" name="date" class="form-control">
                        <?= form_error('date', '<small class="text-danger">', '</small>'); ?>
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
        var kd_product = $(this).attr('data');
        $('#editBarangModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Barang/getBarang',
            data: {
                kd_product: kd_product,
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=code]').val(data.kd_product);
                $('input[name=name]').val(data.name_product);
                $('textarea[name=describe]').val(data.describe_product);
                $('select[name=category]').val(data.category_product);
                $('input[name=price]').val(data.price_product);
                $('input[name=beforeprice]').val(data.beforeprice_product);
                $('input[name=brand]').val(data.brand_product);
                $('select[name=status]').val(data.status_product);
                $('input[name=date]').val(data.date_arrived);

            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>


<script>
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
</script>