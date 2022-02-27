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
                            <h4><?= $title ?></h4>
                        </div>
                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahDetailCatalogueModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Detail Catalogue</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Describe</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($detailcatalogue as $catalogue) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $catalogue['name_detail_catalogue'] ?></td>
                                                <td><?= $catalogue['describe_detail_catalogue'] ?></td>
                                                <td><a href="#" class="pop"><img width="200" height="90" src="<?= base_url('assets/user/img/katalog/' . $catalogue['photo_detail_catalogue']) ?>"></a></td>
                                                <td><a href="javascript:;" class="btn btn-primary item-detail" data="<?php echo $catalogue['id_detail_catalogue'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Catalogue/deleteDetailCatalogue/' . $catalogue['id_detail_catalogue']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                                <lastmod></lastmod>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahDetailCatalogueModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Detail Catalogue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Catalogue/addDetailCatalogue') ?>" method="post" enctype='multipart/form-data'>
                    <input type="text" name="slug" value="<?= $slug ?>" hidden>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Describe</label>
                        <input type="text" name="describe" class="form-control">
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
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
<div class="modal fade" tabindex="-1" role="dialog" id="ubahDetailCatalogueModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Catalogue/editDetailCatalogue') ?>" method="post" enctype='multipart/form-data'>
                    <input type="number" name="id" hidden>
                    <input type="text" name="slug" value="<?= $slug ?>" hidden>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Describe</label>
                        <input type="text" name="describe" class="form-control">
                        <?= form_error('describe', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Photo (Isi Jika Ingin Mengubah)</label>
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
        var id_detail_catalogue = $(this).attr('data');
        $('#ubahDetailCatalogueModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Catalogue/getDetailCatalogue',
            data: {
                id_detail_catalogue: id_detail_catalogue
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=name]').val(data.name_detail_catalogue);
                $('input[name=describe]').val(data.describe_detail_catalogue);
                $('input[name=id]').val(data.id_detail_catalogue);
            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>