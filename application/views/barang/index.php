<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <a href="<?= base_url('Barang/add') ?>"> <button class="btn btn-primary btn-block mt-3 mb-3">Tambah Data</button></a>
                <?php
                echo $this->session->flashdata('success');
                echo $this->session->flashdata('error');
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?></h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Gambar 1</th>
                                <th>Gambar 2</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $barang) {
                                ?>
                                    <tr>
                                        <td width="80px"><?= $barang->no  ?></td>
                                        <td><?= $barang->kode_barang ?></td>
                                        <td><?= ucfirst($barang->nama_barang) ?></td>
                                        <td><?= $barang->harga ?></td>
                                        <td><img width="40" height="40" src="<?php echo base_url('images/' . $barang->gambar1); ?>"></td>
                                        <td><img width="40" height="40" src="<?php echo base_url('images/' . $barang->gambar2); ?>"></td>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('barang/update/') . $barang->no ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('barang/delete/') . $barang->no ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>