<?php function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '....';
    }
    return $text;
} ?>
<!-- Detail Blog -->
<section class="py-5" id="detail_blog">
    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <p><?= strftime("%A %d %h %Y", strtotime($detailblog['created_blog'])) ?></p>
                <h1><?= $detailblog['title_blog'] ?></h1>
            </div>
        </div>
        <div class="row py-5">
            <div class="col">
                <img class="img-fluid" src="<?= base_url('assets/user/img/blog/' .  $detailblog['photo_blog']) ?>" alt="" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $detailblog['content_blog'] ?>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col">
                <h2>Berita baru lainnya</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto consequatur dignissimos laborum placeat autem rerum possimus explicabo ex error nemo. Fugiat obcaecati deleniti ab magnam architecto laudantium veniam, voluptates
                    perspiciatis!
                </p>
            </div>
        </div>
        <div class="row pembungkus-blog pt-5">
            <?php foreach ($sejenis as $sejenis) { ?>
                <div class="col-lg-4 py-2">
                    <div class="bg-white bg-card shadow">
                        <img src="<?= base_url('assets/user/img/blog/' . $sejenis['photo_blog']) ?>" class="card-img-top" alt="..." />
                        <div class="card-body mx-3">
                            <h5 class="card-title"><?= $sejenis['title_blog'] ?></h5>
                            <p class="card-text"><?= limit_text($sejenis['content_blog'], 19) ?></p>
                            <a href="<?= base_url('Blog/detail/' . $sejenis['slug_blog']) ?>" class="btn btn-blog">See more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Detail Blog End -->