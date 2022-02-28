<?php function limit_text($text, $limit)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '....';
    }
    return $text;
} ?>
<section class="bg-white mt-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="fw-bolder">Blog.</h1>
                <p class="text-secondary">Berita terbaru terkait ATIGAMALL.</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="pb-5" id="blog">
    <div class="container py-5">
        <div class="row pembungkus-blog pt-5">
            <?php foreach ($blog as $blog) {
            ?>
                <div class="col-lg-4 py-2">
                    <div class="bg-white bg-card shadow">
                        <img src="<?= base_url('assets/user/img/blog/' . $blog['photo_blog']) ?>" class="card-img-top" alt="..." />
                        <div class="card-body mx-3">
                            <h5 class="card-title"><?= $blog['title_blog'] ?></h5>
                            <p class="card-text"><?= limit_text($blog['content_blog'], 19) ?></p>
                            <a href="<?= base_url('Blog/detail/' . $blog['slug_blog']) ?>" class="btn btn-blog">See more <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
    </div>
</section>
<!-- Blog End -->