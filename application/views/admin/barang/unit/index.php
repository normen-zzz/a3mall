<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Unit</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title . ' (' . $this->uri->segment(4) . ')' ?></h4>
                        </div>
                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahUnitModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Barang</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>id_unit</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Photo</th>
                                            <th>Last Edited By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php foreach ($unit as $unit) { ?>
                                            <tr>
                                                <td><?= $unit['id_unit'] ?></td>
                                                <td><?= $unit['name_unit'] ?></td>
                                                <td><?= $unit['price_unit'] ?></td>
                                                <td><a href="#" class="pop"><img width="200" height="90" src="<?= base_url('assets/images/unitproduk/' . $unit['photo_unit']) ?>"></a></td>
                                                <td><?= $unit['username'] ?></td>
                                                <td><a href="javascript:;" class="btn btn-primary item-detail" data="<?php echo $unit['id_unit'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Barang/deleteUnit/' . $unit['id_unit']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
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

<!-- modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahUnitModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/addUnit/' . $this->uri->segment(4)) ?>" method="post" enctype='multipart/form-data'>
                    <input type="text" name="code" class="form-control" hidden value="<?= $this->uri->segment(4) ?>">

                    <div class="form-group">
                        <label>Name Unit</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
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

<!-- modal Ubah -->
<div class="modal fade" tabindex="-1" role="dialog" id="ubahUnitModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Barang/editUnit/' . $this->uri->segment(4)) ?>" method="post" enctype='multipart/form-data'>
                    <input type="text" name="code" class="form-control" hidden value="<?= $this->uri->segment(4) ?>">

                    <input type="text" name="ganti_gambar" hidden>
                    <input type="number" name="id" hidden>

                    <div class="form-group">
                        <label>Name Unit</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" id="tanpa-rupiah" name="price" class="form-control">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Photo <p style="color:red">(kosongkan jika tidak ingin mengubah photo)</p></label>
                        <input type="file" name="photo" class="form-control">
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

<!-- modal Image -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 95%;">
            </div>
        </div>
    </div>
</div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#showdata').on('click', '.item-detail', function() {
        var id_unit = $(this).attr('data');
        $('#ubahUnitModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Barang/getUnit',
            data: {
                id_unit: id_unit
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=name]').val(data.name_unit);
                $('input[name=price]').val(data.price_unit);
                $('input[name=ganti_gambar]').val(data.photo_unit);
                $('input[name=id]').val(data.id_unit);
            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>