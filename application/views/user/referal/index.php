 <!-- BE -->
 <section class="py-5">
     <div class="container py-5">
         <div class="row">
             <div class="col">
                 <h2>Halo, Ini Kode Referal Kamu Ya : <?= $referal ?></h2>
                 <p class="fw-light text-secondary small">
                     Berikut customer yang menggunakan kode referal anda
                 </p>
             </div>
         </div>
         <div class="row mt-5 border" style="overflow-x: scroll">
             <div class="col">
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
 <!-- BE End -->