 <!-- BE -->
 <section class="py-5 bg-light">
     <div class="container">
         <div class="row mb-5 p-5 shadow bg-white">
             <div class="col">
                 <h2>Kode Referral : <?= $referal ?></h2>
             </div>

         </div>
         <div class="row justify-content-around">
             <div class="col-lg-5">
                 <a href="<?= base_url('Headbe/detailbe/income/' . $referal . '/' . $be->id) ?>" style="text-decoration: none">
                     <div class="shadow bg-white text-dark p-4">
                         <div class="card-body">
                             <h5 class="card-title border-bottom pb-2">Total Pendapatan Dari Order Customers</h5>
                             <h4 class="card-subtitle mb-2 text-muted pt-5">Rp. <?= number_format($sumincome->total_income, '0', ',', '.') ?></h4>
                             <p class="card-text text-warning"><?= $countincome ?> <span class="text-secondary small">Orders</span></p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="col-lg-5">
                 <a href="<?= base_url('Headbe/detailbe/incomeorder/' . $be->id) ?>" style="text-decoration: none">
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
             <p>List Customers yang menggunakan kode referral : <?= $referal ?></p>
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
                         <?php $no = 1;
                            foreach ($userreferal as $userreferal) {

                            ?>
                             <tr>
                                 <th scope="row"><?= $no ?></th>
                                 <td><?= $userreferal['first_name'] . ' ' . $userreferal['last_name'] ?></td>
                                 <td><?= $userreferal['email'] ?></td>
                                 <td><?php echo date('d-m-Y H:i:s', $userreferal['created_on']); ?></td>
                             </tr>
                         <?php $no++;
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
 <div class="modal fade" id="inputNpwp" tabindex="-1" aria-labelledby="inputNpwp" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" action="<?= base_url('user/Referal/addNpwp') ?>">
                     <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                     <div class="mb-3">
                         <label class="form-label">Input NPWP</label>
                         <input type="text" name="npwp" class="form-control" aria-describedby="emailHelp" />
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