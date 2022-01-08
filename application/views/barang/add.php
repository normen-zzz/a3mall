<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-primary mt-3">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger m-3">
                    <?php echo validation_errors(); ?>
                </div>
            <?php
            } ?>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="<?= base_url('barang/add') ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <input type="kode_barang" name="kode_barang" class="form-control" id="exampleInputEmail1" placeholder="Enter kode">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="nama_barang" name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Barang</label>
                        <input type="harga" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar 1</label>
                        <input type="file" name="gambar1" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar 2</label>
                        <input type="file" name="gambar2" class="form-control" id="exampleInputEmail1">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>