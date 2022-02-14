<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title ?></h4>
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
                                            <th>Order Id</th>
                                            <th>Kode Transaksi</th>
                                            <th>Jumlah</th>
                                            <th>Tipe Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>bank</th>
                                            <th>Va Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($midtrans as $midtrans) {
                                            $no++ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $midtrans['order_id'] ?></td>
                                                <td><?= $midtrans['kd_transaction'] ?></td>
                                                <td><?= number_format($midtrans['gross_amount']) ?></td>
                                                <td><?= $midtrans['payment_type'] ?></td>
                                                <td><?= $midtrans['transaction_time'] ?></td>
                                                <td><?= $midtrans['bank'] ?></td>
                                                <td><?= $midtrans['va_number'] ?></td>
                                                <td><?= $midtrans['status_code'] ?></td>
                                                <td>
                                                    <!-- <a href="<?= base_url('admin/Transaksi/updateTransaction/' . $transaksi->kd_transaction) ?>" class="btn btn-success mt-1" onclick="return confirm('Anda Yakin Ingin Konfirmasi?')"><i class="fa fa-check"></i> Konfirmasi</a>
                                                    <a href="" class="btn btn-danger mt-1" onclick="return confirm('Anda Yakin Ingin Menghapus?')"><i class="fa fa-times"></i> Hapus</a> -->
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