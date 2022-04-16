<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Form</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Terkonfirmasi</h4>
                        </div>
                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahCatalogueModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Catalogue</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat KTP</th>
                                            <th>Alamat Domisili</th>
                                            <th>No telp</th>
                                            <th>Email</th>
                                            <th>Photo Diri</th>
                                            <th>Photo Ktp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($formreferal as $formreferal) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $formreferal['name'] ?></td>
                                                <td><?= $formreferal['place_birth'] ?></td>
                                                <td><?= date("l, d F Y", strtotime($formreferal['date_birth']));   ?></td>
                                                <td><?= $formreferal['address_ktp'] ?></td>
                                                <td><?= $formreferal['address_domisili'] ?></td>
                                                <td><?= $formreferal['number'] ?></td>
                                                <td><?= $formreferal['email'] ?></td>
                                                <td><a href="#" class="pop"><img width="200" height="90" src="<?= base_url('assets/user/img/be/' . $formreferal['photo_person']) ?>"></a></td>
                                                <td><a href="#" class="pop"><img width="200" height="90" src="<?= base_url('assets/user/img/be/ktp/' . $formreferal['photo_ktp']) ?>"></a></td>
                                                <td><a href="<?= base_url('admin/Referral/updateFormReferral/' . $formreferal['id_formreferal']) ?>" class="btn btn-primary" onclick="return confirm('Anda Yakin Ingin Mengkonfirmasi?')">Konfirmasi</a></td>
                                                <td></td>


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