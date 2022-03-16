 <!-- BE -->
 <section class="py-5">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <h2>Halo, Ini Kode Referral Kamu Ya : <?= $referal ?></h2>
                 <p class="fw-light text-secondary small">
                     Jika Anda belum mempunyai npwp maka setiap penghasilan dari Referral anda dikenakan pajak sebesar 3%, jika anda sudah mempunyai npwp maka pajak yang dikenakan sebesar 2,5%
                 </p>
             </div>
             <?php if ($npwp == FALSE) { ?>
                 <div class="col-lg-4">
                     <h2>Input NPWP</h2>
                     <button type="button" class="btn yellow-button px-5 py-2 mt-2" data-bs-toggle="modal" data-bs-target="#inputNpwp">Input NPWP</button>
                 </div>
                 <?php } else {
                    if ($npwp->status == 'deactive') { ?>
                     <div class="col-lg-4">
                         <h2>NPWP Anda : </h2>
                         <p><?= $npwp->npwp ?></p>
                         <p>Npwp anda sedang di verifikasi oleh tim atigamall</p>
                     </div>

                 <?php } else { ?>
                     <div class="col-lg-4">
                         <h2>NPWP Anda : </h2>
                         <p><?= $npwp->npwp ?></p>
                         <p>Npwp anda sudah diverifikasi oleh tim atigamall</p>
                     </div>
             <?php }
                } ?>
         </div>
         <a href="<?= base_url('Referral/income/' . $referal) ?>" class="btn yellow-button px-5 py-2 mt-2">Pemasukan Referral</a>
         <div class="row mt-5 border" style="overflow-x: scroll">

             <div class="col">
                 <p>Berikut Customer yang tergabung dengan Referral anda</p>
                 <table class="table">
                     <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Nama</th>
                             <th scope="col">Tanggal Daftar</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($userreferal as $userreferal) {
                                $epoch = $userreferal['created_on'];
                                $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
                                $tanggal = $dt->format('d-m-Y H:i:s'); // output = 2017-01-01 00:00:00
                            ?>
                             <tr>
                                 <th scope="row"><?= $no; ?></th>
                                 <td><?= $userreferal['first_name'] . ' ' . $userreferal['last_name'] ?></td>
                                 <td><?= $tanggal; ?></td>
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