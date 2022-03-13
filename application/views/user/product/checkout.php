<!-- Breadcrumb -->
<!-- <section id="breadcrumb" class="bg-white py-5">
    <div class="container">
        <div class="row">
            <divc class="col">
                <p class="text-secondary fw-light">Home / <span class="yellow-text">Keranjang</span></p>
            </divc>
        </div>
    </div>
</section> -->
<!-- Akhir Breadcrumb -->

<!-- Alamat -->
<section class="bg-white p-5 mt-5" id="alamat">
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Wildan</p>
                <p>0851572763</p>
                <p>Komplek Setneg, Blok g No.10, RT.3/RW.6, Kel Pondok Kacang Barat, Pondok Aren (Blok G-10) KOTA TANGERANG SELATAN - PONDOK AREN BANTEN ID 15226</p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Alamat -->

<!-- Keranjang -->
<section id="keranjang" class="bg-white py-5 my-5">
    <div class="container">
        <div class="row mb-5 keranjang-grid">
            <div class="col-md-2">
                <div class="img text-center">
                    <img src="<?= base_url('assets/user/') ?>img/produk/Rectangle 47.jpg" alt="" />
                </div>
            </div>
            <div class="col-md my-auto">
                <div class="row">
                    <div class="col-md py-1">
                        <p>Louis Vuitton</p>

                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="fw-light text-secondary my-auto">Variasi: Pola biru</p>
                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="my-auto">Rp. 999.999</p>
                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="yellow-text my-auto">Rp. 999.999</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5 keranjang-grid">
            <div class="col-md-2">
                <div class="img text-center">
                    <img src="<?= base_url('assets/user/') ?>img/produk/Rectangle 47.jpg" alt="" />
                </div>
            </div>
            <div class="col-md my-auto">
                <div class="row">
                    <div class="col-md py-1">
                        <p>Louis Vuitton</p>
                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="fw-light text-secondary my-auto">Variasi: Pola biru</p>
                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="my-auto">Rp. 999.999</p>
                    </div>
                    <div class="col-md py-1 text-center isi-keranjang my-auto">
                        <p class="yellow-text my-auto">Rp. 999.999</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Keranjang -->

<!-- Check -->
<section class="bg-white py-5" id="check">
    <div class="container">
        <div class="row">
            <div class="col my-auto">
                <h5 class="fw-bold">Produk (3)</h5>
            </div>
            <div class="col my-auto justify-content-end d-flex">
                <p class="my-auto me-5">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp.9999.9999</span></p>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Check -->

<!-- Checkout -->
<section class="bg-white" id="checkout">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-lg">
                <ul class="nav nav-pills mb-5 mx-auto justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item my-2" role="presentation">
                        <button class="nav-link text-dark active" id="desk1-tab" data-bs-toggle="pill" data-bs-target="#desk1" type="button" role="tab" aria-controls="desk1" aria-selected="true">Pembayaran Website</button>
                    </li>
                    <li class="nav-item my-2" role="presentation">
                        <button class="nav-link text-dark" id="desk2-tab" data-bs-toggle="pill" data-bs-target="#desk2" type="button" role="tab" aria-controls="desk2" aria-selected="false">Pembayaran Manual</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show p-0 active" id="desk1" role="tabpanel" aria-labelledby="desk1-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1>PEMBAYARAN LEWAT MITRANS</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade p-0" id="desk2" role="tabpanel" aria-labelledby="desk2-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 border-end">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="<?= base_url('assets/user/') ?>img/checkout/BCA.png" height="50" alt="" />
                                        </div>
                                        <div class="col">
                                            <p>Bank Central Asia</p>
                                            <p>22206 1234</p>
                                            <p>Tesla Inc.</p>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-lg-3">
                                            <img src="<?= base_url('assets/user/') ?>img/checkout/mandiri.png" height="50" alt="" />
                                        </div>
                                        <div class="col">
                                            <p>Mandiri</p>
                                            <p>22206 1234</p>
                                            <p>Tesla Inc.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg pt-4">
                                    <form>
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Transfer Proof</label>
                                            <input class="form-control" type="file" id="formFile" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank Origin</label>
                                            <input type="text" class="form-control border-0 bg-light" placeholder="Please type here.." />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sender Name</label>
                                            <input type="text" class="form-control border-0 bg-light" placeholder="Please type here.." />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Akhir Checkout -->