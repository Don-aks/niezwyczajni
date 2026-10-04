<?php $gallery = zn_default_gallery(); ?>
<section class="gallery-preview section section--centered">
    <div class="container section__container">
        <header class="section__header gallery-preview__header">
            <h2 class="section__title section__title--border-top">
                Zobacz nasze zdjęcia
            </h2>
            <h3 class="section__subtitle">Nasza galeria</h3>
        </header>
        <div class="gallery-preview__content slider relative">
            <div class="slider__navigation gallery-preview__slider-navigation">
                <button class="slider__btn slider__btn--prev">
                    <svg class="slider__btn-icon">
                        <use href="<?php echo esc_url(
                            zn_spritemap_url(),
                        ); ?>#arrow-right"></use>
                    </svg>
                    <span class="visually-hidden">Poprzednie zdjęcie</span>
                </button>
                <button class="slider__btn slider__btn--next">
                    <svg class="slider__btn-icon">
                        <use href="<?php echo esc_url(
                            zn_spritemap_url(),
                        ); ?>#arrow-right"></use>
                    </svg>
                    <span class="visually-hidden">Następne zdjęcie</span>
                </button>
            </div>

            <div
                class="gallery-preview__slider swiper"
                data-animate-on-scroll
                data-animate-once
                data-animate-duration="500"
            >
                <ul class="slider__wrapper swiper-wrapper list-reset">
                    <?php foreach ($gallery as $image): ?>
                    <li class="slider__slide swiper-slide">
                        <?php zn_render_image_wrapper($image); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <footer class="section__footer section__footer--centered">
            <?php zn_render_cta_button(); ?>
            <a
                class="btn btn--secondary btn--with-icon"
                href="<?php echo esc_url(zn_page_url('gallery')); ?>"
            >
                Zobacz całą galerię
                <span class="icon"><?php zn_icon('gallery'); ?></span>
            </a>
        </footer>
    </div>
</section>
