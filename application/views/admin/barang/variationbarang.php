<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Variation Barang</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title2 ?></h4>
                        </div>

                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahVariationModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Variation</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Length (Cm)</th>
                                            <th>Width (Cm)</th>
                                            <th>Weight (G)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($variation as $variation) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $variation['name_variation'] ?></td>
                                                <td><?= number_format($variation['price_variation'], '0', ',', '.')  ?></td>
                                                <td><?= $variation['length_variation'] ?></td>
                                                <td><?= $variation['width_variation'] ?></td>
                                                <td><?= $variation['weight_variation'] ?></td>
                                                <td>

                                                    <a href="javascript:;" class="btn btn-primary mt-1 item-detail" data="<?php echo $variation['id_variation'] ?>">Ubah</a>
                                                    <!-- <a href="<?= base_url('admin/Barang/photoBarang/' . $variation['id_variation']) ?>" class="btn btn-warning mt-1">Photo</a> -->
                                                    <a href="<?= base_url('admin/Barang/deleteVariationBarang/' . $variation['kd_product'] . '/' . $variation['id_variation']) ?>" class="btn btn-danger mt-1" onclick="return confirm('Anda Yakin Ingin Menghapus?')">hapus</a>
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahVariationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/Barang/addVariation') ?>" method="post">
                    <input type="text" name="code" value="<?= $this->uri->segment(4) ?>" hidden>
                    <div class="form-group">
                        <label>Name Variation</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Price Variation</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Width (Cm)</label>
                        <input type="number" name="width" class="form-control">
                        <?= form_error('width', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Length (Cm)</label>
                        <input type="number" name="length" class="form-control">
                        <?= form_error('length', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Weight (G)</label>
                        <input type="number" name="weight" class="form-control">
                        <?= form_error('weight', '<small class="text-danger">', '</small>'); ?>
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
<div class="modal fade" tabindex="-1" role="dialog" id="editVariationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/editVariation/' . $this->uri->segment(4)) ?>" method="post">
                    <input type="text" name="id" hidden>
                    <input type="text" name="code" hidden>
                    <div class="form-group">
                        <label>Name (Width x Length)</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Price Variation</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Width (Cm)</label>
                        <input type="number" name="width" class="form-control">
                        <?= form_error('width', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Length (Cm)</label>
                        <input type="number" name="length" class="form-control">
                        <?= form_error('length', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Weight (G)</label>
                        <input type="number" name="weight" class="form-control">
                        <?= form_error('weight', '<small class="text-danger">', '</small>'); ?>
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
        var id_variation = $(this).attr('data');
        $('#editVariationModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Barang/getVariation',
            data: {
                id_variation: id_variation,
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=id]').val(data.id_variation);
                $('input[name=name]').val(data.name_variation);
                $('input[name=code]').val(data.kd_product);
                $('input[name=length]').val(data.length_variation);
                $('input[name=width]').val(data.width_variation);
                $('input[name=weight]').val(data.weight_variation);
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