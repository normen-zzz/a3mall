 <!-- BE -->
 <section class="py-5 bg-light">
     <div class="container">
         <div class="row mb-5 p-5 shadow bg-white">
             <div class="col-lg-6">
                 <?php if (isset($referal->code_referal)) { ?>
                     <h2>Kode Referral Anda : <?= $referal->code_referal ?></h2>
                 <?php } else { ?>
                     <button type="submit" data-bs-toggle="modal" data-bs-target="#inputCodeReferal" class="btn yellow-button shadow">Buat Kode Referral</button>
                 <?php } ?>
             </div>
         </div>
         <div class="row">
             <div class="col-xl-3 col-lg-6 mb-4">
                 <div class="bg-white rounded-lg p-5 shadow">
                     <h2 class="h6 font-weight-bold text-center mb-2">Omset Per-Bulan <?= date('F, Y'); ?></h2>
                     <div>
                         <h2 class="h6 font-weight-bold text-center mb-4">(Customer Order)</h2>
                     </div>


                     <!-- Progress bar 1 -->
                     <div class="row">
                         <div class="col text-center">
                             <canvas width="170" height="150" id="canvas-preview1"></canvas>
                             <div id="preview-textfield1"></div>
                         </div>
                     </div>

                     <!-- END -->

                     <!-- Demo info -->
                     <!-- <div class="row text-center mt-4">
                         <div class="col-6 border-right">
                             <div class="h4 font-weight-bold mb-0">28%</div>
                             <span class="small text-gray">Last week</span>
                         </div>
                         <div class="col-6">
                             <div class="h4 font-weight-bold mb-0">60%</div>
                             <span class="small text-gray">Last month</span>
                         </div>
                     </div> -->
                     <!-- END -->
                 </div>
             </div>

             <div class="col-xl-3 col-lg-6 mb-4">
                 <div class="bg-white rounded-lg p-5 shadow">
                     <h2 class="h6 font-weight-bold text-center mb-2">Omset Per-Bulan <?= date('F, Y'); ?></h2>
                     <div>
                         <h2 class="h6 font-weight-bold text-center mb-4">(BE Order)</h2>
                     </div>

                     <!-- Progress bar 2 -->
                     <div class="row">
                         <div class="col text-center">
                             <canvas width="170" height="150" id="canvas-preview2"></canvas>
                             <div id="preview-textfield2"></div>
                         </div>
                     </div>

                     <!-- END -->

                     <!-- Demo info-->
                     <!-- <div class="row text-center mt-4">
                         <div class="col-6 border-right">
                             <div class="h4 font-weight-bold mb-0">28%</div>
                             <span class="small text-gray">Last week</span>
                         </div>
                         <div class="col-6">
                             <div class="h4 font-weight-bold mb-0">60%</div>
                             <span class="small text-gray">Last month</span>
                         </div>
                     </div> -->
                     <!-- END -->
                 </div>
             </div>

             <div class="col-xl-3 col-lg-6 mb-4">
                 <div class="bg-white rounded-lg p-5 shadow">
                     <h2 class="h6 font-weight-bold text-center mb-2">Omset Per-Tahun <?= date('Y'); ?></h2>
                     <div>
                         <h2 class="h6 font-weight-bold text-center mb-4">(Customer Order)</h2>
                     </div>

                     <!-- Progress bar 3 -->
                     <div class="row">
                         <div class="col text-center">
                             <canvas width="170" height="150" id="canvas-preview3"></canvas>
                             <div id="preview-textfield3"></div>
                         </div>
                     </div>

                     <!-- END -->

                     <!-- Demo info -->
                     <!-- <div class="row text-center mt-4">
                         <div class="col-6 border-right">
                             <div class="h4 font-weight-bold mb-0">28%</div>
                             <span class="small text-gray">Last week</span>
                         </div>
                         <div class="col-6">
                             <div class="h4 font-weight-bold mb-0">60%</div>
                             <span class="small text-gray">Last month</span>
                         </div>
                     </div> -->
                     <!-- END -->
                 </div>
             </div>

             <div class="col-xl-3 col-lg-6 mb-4">
                 <div class="bg-white rounded-lg p-5 shadow">
                     <h2 class="h6 font-weight-bold text-center mb-2">Omset Per-Tahun <?= date('Y'); ?></h2>
                     <div>
                         <h2 class="h6 font-weight-bold text-center mb-4">(BE Order)</h2>
                     </div>

                     <!-- Progress bar 4 -->
                     <div class="row">
                         <div class="col text-center">
                             <canvas width="170" height="150" id="canvas-preview4"></canvas>
                             <div id="preview-textfield4"></div>
                         </div>
                     </div>

                     <!-- END -->

                     <!-- Demo info -->
                     <!-- <div class="row text-center mt-4">
                         <div class="col-6 border-right">
                             <div class="h4 font-weight-bold mb-0">28%</div>
                             <span class="small text-gray">Last week</span>
                         </div>
                         <div class="col-6">
                             <div class="h4 font-weight-bold mb-0">60%</div>
                             <span class="small text-gray">Last month</span>
                         </div>
                     </div> -->
                     <!-- END -->
                 </div>
             </div>
         </div>
         <div class="row justify-content-around">
             <?php if (isset($referal->code_referal)) { ?>
                 <div class="col-lg-5">
                     <a href="<?= base_url('Referral/income/' . $referal->code_referal) ?>" style="text-decoration: none">
                         <div class="shadow bg-white text-dark p-4">
                             <div class="card-body">
                                 <h5 class="card-title border-bottom pb-2">Total Pendapatan Dari Order Customersx</h5>
                                 <h4 class="card-subtitle mb-2 text-muted pt-5">Rp. <?= number_format($sumincome->total_income, '0', ',', '.') ?></h4>
                                 <p class="card-text text-warning"><?= $countincome ?> <span class="text-secondary small">Orders</span></p>
                             </div>
                         </div>
                     </a>
                 </div>
             <?php } ?>
             <div class="col-lg-5">
                 <a href="<?= base_url('Referral/incomeorder') ?>" style="text-decoration: none">
                     <div class="shadow text-dark bg-white p-4">
                         <div class="card-body">
                             <h5 class="card-title border-bottom pb-2">Total Pendapatan Dari Order Referral</h5>
                             <h4 class="card-subtitle mb-2 text-muted pt-5">Rp. <?= number_format($sumorder->total_income, '0', ',', '.') ?></h4>
                             <p class="card-text text-warning"><?= $countincomeorder ?> <span class="text-secondary small">Orders</span></p>
                         </div>
                     </div>
                 </a>
             </div>
         </div>
         <div class="row mt-5" style="overflow-x: scroll">
             <p>List Customers yang menggunakan kode referral anda :</p>
             <div class="col shadow bg-white">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Nama</th>
                             <th>Email</th>
                             <th>Tanggal Daftar</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php if (isset($referal->code_referal)) {
                                $no = 1;
                                foreach ($userreferal as $userreferal) { ?>
                                 <tr>
                                     <th scope="row"><?= $no ?></th>
                                     <td><?= $userreferal['first_name'] . ' ' . $userreferal['last_name'] ?></td>
                                     <td><?= $userreferal['email'] ?></td>
                                     <td><?php echo date('d-m-Y H:i:s', $userreferal['created_on']); ?></td>
                                 </tr>
                         <?php $no++;
                                }
                            } ?>
                     </tbody>
                 </table>
             </div>
             <!-- <div class="col shadow bg-white">
                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nama</th>
                             <th scope="col">Tanggal Daftar</th>
                             <th scope="col">Keterangan</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <th scope="row">1</th>
                             <td>Asep</td>
                             <td>13 Januari 2022</td>
                             <td>Active</td>
                         </tr>
                     </tbody>
                 </table>
             </div> -->
         </div>
     </div>
 </section>
 <!-- BE End -->
 <!-- Modal NPWP -->
 <!-- <div class="modal fade" id="inputNpwp" tabindex="-1" aria-labelledby="inputNpwp" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" action="<?= base_url('user/Referal/addNpwp') ?>" enctype="multipart/form-data">
                     <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                     <div class="mb-3">
                         <label class="form-label">Input NPWP</label>
                         <input type="text" name="npwp" class="form-control" aria-describedby="emailHelp" required />
                     </div>

                     <div class="mb-3">
                         <label class="form-label">Input NPWP</label>
                         <input type="file" name="photo" class="form-control" aria-describedby="emailHelp" required />
                     </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save changes</button>
             </div>
             </form>
         </div>
     </div>
 </div> -->

 <!-- Modal Code Referal -->
 <div class="modal fade" id="inputCodeReferal" tabindex="-1" aria-labelledby="inputCodeReferral" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <h3>Kode hanya bisa dibuat sekali dan tidak bisa diubah, mohon diperhatikan baik baik</h3>
                 <form method="post" action="<?= base_url('user/Referal/addCodeReferal/' . $referal->id_referal) ?>" enctype="multipart/form-data">
                     <div class="mb-3">
                         <label class="form-label">Input Kode referral (terdiri dari huruf dan angka, tidak boleh mengandung simbol seperti , - . dll)</label>
                         <input type="text" name="code" value="<?php echo set_value('code'); ?>" class="form-control" placeholder="Cth : Angga2344" required />
                         <?= form_error('code', '<small class="text-danger">', '</small>'); ?>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save changes</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!-- BE End -->