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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($variation as $variation) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $variation['name_variation'] ?></td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahVariationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/Barang/addVariation') ?>" method="post">
                    <input type="text" name="code" value="<?= $this->uri->segment(4) ?>">
                    <div class="form-group">
                        <label>Name Variation</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
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
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/editVariation/' . $this->uri->segment(4)) ?>" method="post">
                    <input type="text" name="id" hidden>
                    <input type="text" name="code" hidden>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
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