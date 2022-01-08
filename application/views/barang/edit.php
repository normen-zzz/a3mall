<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-primary mt-3">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('barang/update/' . $data->no) ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" value="<?= $data->no; ?>" name="no" class="form-control" id="exampleInputEmail1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <input type="kode_barang" value="<?= $data->kode_barang; ?>" name="kode_barang" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="nama_barang" value="<?= $data->nama_barang; ?>" name="nama_barang" class="form-control" id="exampleInputEmail1" placeholder="Enter Nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Barang</label>
                        <input type="harga" name="harga" value="<?= $data->harga; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
                    </div>

                    <div class="form-group">
                        <label for="gambar1">Gambar Lama 1</label>
                        <div class="col-sm-10">
                            <input type="gambarlama1" name="gambarlama1" value="<?= $data->gambar1; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
                        </div>
                        <label for="photo">Upload Gambar Baru 1</label>
                        <div class="col-sm-10">
                            <input type="file" id="gambar1" name="gambar1" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gambar1">Gambar Lama 2</label>
                        <div class="col-sm-10">
                            <input type="gambarlama2" name="gambarlama2" value="<?= $data->gambar2; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Harga">
                        </div>
                        <label for="photo">Upload Gambar Baru 2</label>
                        <div class="col-sm-10">
                            <input type="file" id="gambar2" name="gambar2" class="form-control">
                        </div>
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