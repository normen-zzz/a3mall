 <!-- BE -->
 <section class="py-5 bg-light">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <a href="<?= base_url('Headbe') ?>" class="btn yellow-button px-5 py-2 mt-2">Kembali</a>
             </div>

         </div>
         <div class="row mt-5" style="overflow-x: scroll">
             <p>List Npwp yang butuh diverifikasi</p>
             <div class="col shadow bg-white">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Email BE</th>
                             <th>No NPWP</th>
                             <th>Photo</th>
                             <th>Status</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $no = 1;
                            foreach ($npwp as $npwp) { ?>
                             <tr>
                                 <th scope="row"><?= $no ?></th>
                                 <td><?= $npwp['email_npwp'] ?></td>
                                 <td><?= $npwp['npwp'] ?></td>
                                 <td><a href="#" class="pop"><img width="150px" src="<?= base_url('assets/user/img/referal/npwp/' . $npwp['photo_npwp']) ?>" alt=""></a></td>
                                 <td><?= $npwp['status'] ?></td>
                                 <td><a href="<?= base_url('user/Referal/accNpwp/' . $npwp['id_npwp']) ?>" class="btn btn-primary">Verifikasi</a></td>
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
     <!-- modal Image -->
     <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl">
             <div class="modal-content">
                 <div class="modal-body">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     <img src="" class="imagepreview" style="width: 95%;">
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <!-- BE End -->