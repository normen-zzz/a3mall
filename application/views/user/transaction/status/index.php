 <!-- Status Pesanan -->
 <section class="bg-white my-5" id="status">
     <div class="container py-5">
         <div class="row">
             <div class="col-lg">
                 <ul class="nav nav-pills mb-5 mx-auto grid-status justify-content-between" id="pills-tab" role="tablist">
                     <li class="nav-item my-2 mx-auto" role="presentation">
                         <button class="nav-link px-5 text-dark active" id="status1-tab" data-bs-toggle="pill" data-bs-target="#status1" type="button" role="tab" aria-controls="status1" aria-selected="true">Belum Dibayar</button>
                     </li>
                     <li class="nav-item my-2 mx-auto" role="presentation">
                         <button class="nav-link px-5 text-dark" id="status2-tab" data-bs-toggle="pill" data-bs-target="#status2" type="button" role="tab" aria-controls="status2" aria-selected="false">Dikemas</button>
                     </li>
                     <li class="nav-item my-2 mx-auto" role="presentation">
                         <button class="nav-link px-5 text-dark" id="status3-tab" data-bs-toggle="pill" data-bs-target="#status3" type="button" role="tab" aria-controls="status3" aria-selected="false">Dikirim</button>
                     </li>
                     <li class="nav-item my-2 mx-auto" role="presentation">
                         <button class="nav-link px-5 text-dark" id="status4-tab" data-bs-toggle="pill" data-bs-target="#status4" type="button" role="tab" aria-controls="status4" aria-selected="false">Selesai</button>
                     </li>
                 </ul>
                 <div class="tab-content pt-5" id="pills-tabContent">
                     <div class="tab-pane fade show p-0 active" id="status1" role="tabpanel" aria-labelledby="status1-tab">
                         <?php foreach ($unpaid as $unpaid) { ?>
                             <div class="container">
                                 <div class="row border-bottom">
                                     <div class="col">
                                         <h5 class="text-end">Perlu dibayar : <?= $unpaid['kd_transaction'] ?></h5>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col my-auto">
                                         <h5 class="fw-bold">Produk (<?= $unpaid['total_quantity'] ?>)</h5>
                                     </div>
                                     <div class="col my-auto justify-content-end d-flex">
                                         <p class="my-auto">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= $unpaid['total_transaction'] ?></span></p>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col text-end">
                                         <form id="payment-form" method="post" action="<?= base_url() ?>user/Checkout/finish">
                                             <input type="hidden" name="result_type" id="result-type" value="">
                                             <input type="hidden" name="result_data" id="result-data" value="">
                                             <input type="number" id="jumlah_<?php echo $unpaid['id_detail_transaction']; ?>" value="<?= $unpaid['total_transaction'] ?>" hidden>
                                             <input type="text" id="nama_<?php echo $unpaid['id_detail_transaction']; ?>" value="<?= $unpaid['name_customers'] ?>" hidden>
                                             <input type="text" name="kd_transaction" id="kd_transaction_<?php echo $unpaid['id_detail_transaction']; ?>" value="<?= $unpaid['kd_transaction'] ?>" hidden>

                                         </form>
                                         <button type="button" data-id="<?php echo $unpaid['id_detail_transaction']; ?>" class="btn yellow-button px-5 py-2 midtrans">Bayar</button>
                                     </div>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                     <div class="tab-pane fade p-0" id="status2" role="tabpanel" aria-labelledby="status2-tab">
                         <?php foreach ($paid as $paid) { ?>
                             <div class="container">
                                 <div class="row border-bottom">
                                     <div class="col">
                                         <h5 class="text-end">Sedang Dikemas : <?= $paid['kd_transaction'] ?></h5>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col my-auto">
                                         <h5 class="fw-bold">Produk (<?= $paid['total_quantity'] ?>)</h5>
                                     </div>
                                     <div class="col my-auto justify-content-end d-flex">
                                         <p class="my-auto">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= $paid['total_transaction'] ?></span></p>
                                     </div>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                     <div class="tab-pane fade p-0" id="status3" role="tabpanel" aria-labelledby="status3-tab">
                         <?php foreach ($onprogress as $onprogress) { ?>
                             <div class="container">
                                 <div class="row border-bottom">
                                     <div class="col">
                                         <h5 class="text-end">Sedang Dikirim : <?= $onprogress['kd_transaction'] ?> </h5>
                                     </div>
                                 </div>
                                 <div class="row mb-3">
                                     <div class="col my-auto">
                                         <h5 class="fw-bold">Produk (<?= $onprogress['total_quantity'] ?>)</h5>
                                     </div>
                                     <div class="col my-auto justify-content-end d-flex">
                                         <p class="my-auto">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= $onprogress['total_transaction'] ?></span></p>
                                     </div>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                     <div class="tab-pane fade p-0" id="status4" role="tabpanel" aria-labelledby="status4-tab">
                         <?php foreach ($done as $done) { ?>
                             <div class="container">
                                 <div class="row border-bottom">
                                     <div class="col">
                                         <h5 class="text-end">Sudah Diterima : <?= $done['kd_transaction'] ?></h5>
                                     </div>
                                 </div>

                                 <div class="row mb-3">
                                     <div class="col my-auto">
                                         <h5 class="fw-bold">Produk (<?= $done['total_quantity'] ?>)</h5>
                                     </div>
                                     <div class="col my-auto justify-content-end d-flex">
                                         <p class="my-auto">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp. <?= $done['total_transaction'] ?></span></p>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col text-end">
                                         <button type="button" class="btn yellow-button px-5 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">Nilai</button>
                                     </div>
                                 </div>
                             </div>
                         <?php } ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Akhir Status Pesanan -->