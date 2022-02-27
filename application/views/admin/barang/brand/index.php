<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Brand</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title2 ?></h4>
                        </div>

                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahBrandModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah brand</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name Brand</th>
                                            <th>Describe</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($brand as $brand) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $brand['name_brand'] ?></td>
                                                <td><?= $brand['describe_brand'] ?></td>
                                                <td><?= $brand['created_brand'] ?></td>
                                                <td>
                                                    <a href="javascript:;" class="btn btn-primary mt-1 item-detail" data="<?php echo $brand['id_brand'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Barang/deleteBrand/' . $brand['id_brand']) ?>" class="btn btn-danger mt-1" onclick="return confirm('Anda Yakin Ingin Menghapus?')">hapus</a>

                                                </td>
                                            </tr>

                                        <?php $no++;
                                        } ?>
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahBrandModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/addBrand/') ?>" method="post">

                    <div class="form-group">
                        <label>Name Brand</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
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
</div>

<!-- modal ubah Brand  -->
<div class="modal fade" tabindex="-1" role="dialog" id="editBrandModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/editBrand/') ?>" method="post">
                    <input type="number" name="id" hidden>
                    <div class="form-group">
                        <label>Name Brand</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#showdata').on('click', '.item-detail', function() {
        var id_brand = $(this).attr('data');
        $('#editBrandModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Barang/getBrandAjax',
            data: {
                id_brand: id_brand,
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                $('input[name=name]').val(data.name_brand);
                $('input[name=id]').val(data.id_brand);
                $('textarea[name=describe]').val(data.describe_brand);
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