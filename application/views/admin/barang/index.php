<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang</h1>
        </div>

        <?php
        function limit_words($string, $word_limit)
        {
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
        } ?>

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
                        <div class="col mt-2">
                            <a href="<?= base_url('admin/Barang/brand') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Brand</a>
                        </div>
                        <div class="col mt-2">
                            <a href="<?= base_url('admin/Barang/category') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Category</a>
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
                                            <th>Brand</th>
                                            <th>Last Edited By</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Button Name</th>
                                            <th>Button Link</th>
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
                                                <td><?= limit_words($barang['describe_product'], 8) ?>.... </td>
                                                <td><?= $barang['name_category'] ?></td>
                                                <td><?= $barang['name_brand'] ?></td>
                                                <td><?= $barang['username'] ?></td>
                                                <td>
                                                    <?php if ($barang['status_product'] == 'active') {
                                                        echo '<div class="badge badge-success">Active</div>';
                                                    } else {
                                                        echo '<div class="badge badge-secondary">Not Active</div>';
                                                    } ?>

                                                </td>
                                                <td><?= $barang['created_product'] ?></td>
                                                <td><?= $barang['subbutton_name'] ?></td>
                                                <td><?= $barang['subbutton_link'] ?></td>
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
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
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
                        <textarea class="form-control" name="describe" id="editor1"></textarea>
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <?php foreach ($category as $category) { ?>
                                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                            <?php } ?>
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
                        <select name="brand" class="form-control">
                            <?php foreach ($brand as $brand) { ?>
                                <option value="<?= $brand['id_brand'] ?>"><?= $brand['name_brand'] ?></option>
                            <?php } ?>
                        </select>
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
                    <div class="form-group">
                        <label>Sub Button Name</label>
                        <input type="text" name="subbutton_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sub Button Link</label>
                        <input type="text" name="subbutton_link" class="form-control">
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
                <h5 class="modal-title">Ubah Barang</h5>
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
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
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
                        <textarea class="form-control" id="editor2" name="describe"></textarea>
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control" required>
                            <?php foreach ($category1 as $category) { ?>
                                <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                                <option value="2">Sofa</option>
                            <?php } ?>
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
                        <select name="brand" class="form-control" required>
                            <?php foreach ($brand1 as $brand1) { ?>
                                <option value="<?= $brand1['id_brand'] ?>"><?= $brand1['name_brand'] ?></option>
                            <?php } ?>
                        </select>
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
                    <div class="form-group">
                        <label>Sub Button Name</label>
                        <input type="text" name="subbutton_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Sub Button Link</label>
                        <input type="text" name="subbutton_link" class="form-control">
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
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=code]').val(data.kd_product);
                $('input[name=name]').val(data.name_product);
                CKEDITOR.instances['editor2'].setData(data.describe_product);
                $('select[name=category]').val(data.category_product);
                $('input[name=price]').val(data.price_product);
                $('input[name=beforeprice]').val(data.beforeprice_product);
                $('select[name=brand]').val(data.brand_product);
                $('select[name=status]').val(data.status_product);
                $('input[name=date]').val(data.date_arrived);
                $('input[name=subbutton_name]').val(data.subbutton_name);
                $('input[name=subbutton_link]').val(data.subbutton_link);

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