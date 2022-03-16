<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pajak Referal</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title2 ?></h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Be</th>
                                            <th>Email Be</th>
                                            <th>Kode Referal</th>
                                            <th>Asal Transaksi (Kode)</th>
                                            <th>Besar Pajak</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($pajak as $pajak) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pajak['nama_be'] ?></td>
                                                <td><?= $pajak['email_be'] ?></td>
                                                <td><?= $pajak['code_referal'] ?></td>
                                                <td><?= $pajak['kd_transaction'] ?></td>
                                                <td>Rp. <?= number_format($pajak['amount_tax'], '0', ',', '.')  ?></td>
                                                <td><?= $pajak['date_tax'] ?></td>
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
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
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
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
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
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
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