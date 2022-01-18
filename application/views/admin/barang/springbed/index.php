<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Spring Bed</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Describe</th>
                                            <th>Category</th>
                                            <th>Last Edited By</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($barang as $barang) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $barang['kd_product'] ?></td>
                                                <td><?= $barang['name_product'] ?></td>
                                                <td><?= $barang['price_product'] ?></td>
                                                <td><?= $barang['describe_product'] ?></td>
                                                <td><?= $barang['name_category'] ?></td>
                                                <td><?= $barang['username'] ?></td>
                                                <td>
                                                    <?php if ($barang['status_product'] == 'active') {
                                                        echo '<div class="badge badge-success">Active</div>';
                                                    } else {
                                                        echo '<div class="badge badge-secondary">Not Active</div>';
                                                    } ?>

                                                </td>
                                                <td><?= $barang['created_product'] ?></td>
                                                <td><a href="<?= base_url('admin/Barang/unitProduct/' . $barang['kd_product']) ?>" class="btn btn-secondary">Unit</a></td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
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