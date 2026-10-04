<?php $videos = zn_acf('videos', zn_default_videos()); ?>

<section class="videos-preview section">
    <div class="container section__container">
        <header class="section__header">
            <h2 class="section__title">Zobacz nasze filmy</h2>
            <h3 class="section__subtitle">Inspirujące historie i przesłania</h3>
        </header>

        <div class="videos-preview__content grid">
            <?php foreach ($videos as $video) {
                zn_render_video($video + ['hasAnimation' => true]);
            } ?>
        </div>

        <footer class="section__footer section__footer--centered">
            <?php zn_render_cta_button(); ?>
            <a
                class="btn btn--secondary btn--with-icon videos-preview__link"
                href="<?php echo esc_url(zn_page_url('videos')); ?>"
            >
                Zobacz wszystkie filmy
                <span class="icon"><?php zn_icon('video-circle'); ?></span>
            </a>
        </footer>
    </div>
</section>
