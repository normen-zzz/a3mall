 <!-- BE -->
 <section class="py-5 bg-light">
     <div class="container">
         <div class="row">
             <!-- <div class="col-lg-3">
                 <button type="button" class="btn yellow-button px-5 py-2 mt-2" data-bs-toggle="modal" data-bs-target="#inputNpwp">Buat Akun BE</button>
             </div> -->
             <div class="col">
                 <div>
                     <div id="showlink">
                         <a href="javascript:;" data-id="<?= $linkform->id_link ?>" class="btn yellow-button px-5 py-2 mt-2 links">Generate Link Form Referral</a>
                     </div>
                     <br>
                     <input type="text" name="links" id="links" value="<?= base_url('FormReferral/' . $linkform->links) ?>" class="form-control  bg-light" readonly />

                 </div>
                 <button class="btn yellow-button px-1 py-2 mt-2" onclick="copy()">Copy Link</button>
             </div>
             <div class="row mt-5" style="overflow-x: scroll">
                 <p>List Business Executive</p>
                 <div class="col shadow bg-white">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Nama</th>
                                 <th>Email</th>
                                 <th>Total Pendapatan</th>
                                 <th>Tanggal Daftar</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php $no = 1;
                                foreach ($be as $be) {
                                    $referalbe = $this->referal->getReferalEmail($be['email'])->row();
                                    $sumincome = $this->referal->getSumIncomeReferal($referalbe->code_referal)->row();
                                    $sumorder = $this->referal->getSumIncomeOrderReferal($be['email'])->row() ?>
                                 <tr>
                                     <th scope="row"><?= $no ?></th>
                                     <td><a style="text-decoration: none; color:black" href="<?= base_url('Headbe/detailbe/' . $be['id']) ?>"> <?= $be['first_name'] . ' ' . $be['last_name'] ?></a></td>
                                     <td><a style="text-decoration: none; color:black" href="<?= base_url('Headbe/detailbe/' . $be['id']) ?>"><?= $be['email'] ?></a></td>
                                     <td>Rp. <?= number_format($sumincome->total_income + $sumorder->total_income, '0', ',', '.')   ?></td>
                                     <td><?php echo date('d-m-Y H:i:s', $be['created_on']); ?></td>
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