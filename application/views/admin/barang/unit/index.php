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
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>id_unit</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Last Edited By</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($unit as $unit) { ?>
                                        <tr>
                                            <td><?= $unit['id_unit'] ?></td>
                                            <td><?= $unit['name_unit'] ?></td>
                                            <td><?= $unit['price_unit'] ?></td>
                                            <td><?= $unit['username'] ?></td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
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