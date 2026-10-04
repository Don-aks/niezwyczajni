<?php
$articles = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
]); ?>

<section class="articles-preview section relative">
    <?php zn_icon('cross', 'articles-preview__decor'); ?>

    <div class="container section__container articles-preview__container">
        <header class="section__header">
            <h2 class="section__title">Nasz blog</h2>
            <h3 class="section__subtitle">Najnowsze artykuły z życia misji</h3>
        </header>
        <div class="articles-preview__content section__cards-container">
            <?php if ($articles->have_posts()) {
                while ($articles->have_posts()) {
                    $articles->the_post();
                    zn_render_article_card('section__card');
                }

                wp_reset_postdata();
            } ?>
        </div>
        <footer class="section__footer section__footer--centered">
            <?php zn_render_cta_button(); ?>
            <a
                class="btn btn--secondary btn--with-icon"
                href="<?php echo esc_url(zn_page_url('blog')); ?>"
            >
                Zobacz wszystkie artykuły
                <span class="icon"><?php zn_icon('article'); ?></span>
            </a>
        </footer>
    </div>
</section>
