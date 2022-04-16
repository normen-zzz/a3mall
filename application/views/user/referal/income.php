 <!-- BE -->
 <section class="py-5">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <h2>Halo, ini halaman total pendapatan dari Customers</h2>
             </div>
         </div>

         <div class="row">
             <div class="col">
                 <button onclick="history.back()" class="btn yellow-button px-5 py-2 mt-2">Kembali</button>
             </div>
         </div>

         <div class="row mt-5 border" style="overflow-x: scroll">
             <div class="col">
                 <p>Berikut pemasukan anda dari kode referral : <?= $referal ?></p>
                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Asal Transaksi (Kode Transaksi)</th>
                             <th scope="col">Email</th>
                             <th scope="col">Hasil</th>
                             <th scope="col">Total Hasil</th>
                             <th scope="col">Tanggal</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($income as $income) {
                                $CI = &get_instance();
                                $CI->load->model('Transaksi_model');
                                $detailtransaction = $CI->Transaksi_model->getDetailTransactionWhereCode($income['kd_transaction']);
                            ?>
                             <tr>
                                 <th scope="row"><?= $no; ?></th>
                                 <td><?= $income['kd_transaction'] ?></td>
                                 <td><?= $detailtransaction->email_users ?></td>
                                 <td>Rp. <?= number_format($income['income'], '0', ',', '.')   ?></td>
                                 <td>Rp. <?= number_format($income['total_income'], '0', ',', '.')   ?></td>
                                 <td><?= date("l, d F Y", strtotime($income['date_income']));   ?></td>
                             </tr>
                         <?php $no++;
                            } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </section>
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