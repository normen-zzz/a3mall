<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Blog</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $title . ' (' . $this->uri->segment(4) . ')' ?></h4>
                        </div>
                        <div class="col">
                            <button data-toggle="modal" data-target="#tambahBlogModal" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Blog</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table text-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Content</th>
                                            <th>Writer</th>
                                            <th>See</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        <?php $no = 1;
                                        foreach ($blog as $blog) { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $blog['title_blog'] ?></td>
                                                <td><?= $blog['slug_blog'] ?></td>
                                                <td><?= $blog['content_blog'] ?></td>
                                                <td><?= $blog['writer_blog'] ?></td>
                                                <td><?= $blog['see_blog'] ?></td>
                                                <td><a href="#" class="pop"><img width="200" height="90" src="<?= base_url('assets/user/img/blog/' . $blog['photo_blog']) ?>"></a></td>
                                                <td><a href="javascript:;" class="btn btn-primary item-detail" data="<?php echo $blog['id_blog'] ?>">Ubah</a>
                                                    <a href="<?= base_url('admin/Blog/deleteBlog/' . $blog['id_blog']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                                <lastmod></lastmod>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- modal Tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahBlogModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Blog/addBlog') ?>" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="editor1" name="content" class="form-control"></textarea>
                        <?= form_error('content', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Writer</label>
                        <input type="text" name="writer" class="form-control">
                        <?= form_error('writer', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Ubah -->
<div class="modal fade" tabindex="-1" role="dialog" id="ubahBlogModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/Blog/editBlog') ?>" method="post" enctype='multipart/form-data'>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <input type="number" name="id" hidden>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                        <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="editor2" name="content" class="form-control"></textarea>
                        <?= form_error('content', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Writer</label>
                        <input type="text" name="writer" class="form-control">
                        <?= form_error('writer', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Photo (Isi Jika Ingin mengubah blog)</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Image -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 95%;">
            </div>
        </div>
    </div>
</div>

<script>
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#showdata').on('click', '.item-detail', function() {
        var id_blog = $(this).attr('data');
        $('#ubahBlogModal').modal('show');
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>admin/Blog/getBlog',
            data: {
                id_blog: id_blog
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                $('input[name=title]').val(data.title_blog);
                CKEDITOR.instances['editor2'].setData(data.content_blog);
                $('input[name=writer]').val(data.writer_blog);
                $('input[name=id]').val(data.id_blog);
            },
            error: function() {
                alert('Could not displaying data');
            }
        });
    });
</script>