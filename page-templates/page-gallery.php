<?php

/*
Template Name: Gallery
*/

get_header();

$images = zn_acf('gallery_images', zn_default_gallery());

$title = esc_html(zn_acf('gallery_title', 'Galeria'));

$subtitle = esc_html(zn_acf('gallery_subtitle', 'Zobacz nasze zdjęcia'));
?>

<main class="main">
    <section class="gallery section">
        <div class="container gallery__container">
            <header class="section__header gallery__header">
                <h2 class="section__title gallery__title">
                    <?= $title ?>
                </h2>

                <h3 class="section__subtitle gallery__subtitle">
                    <?= $subtitle ?>
                </h3>
            </header>

            <div
                class="gallery__images section__cards-container js-animation-card-container flex flex-wrap gap-6"
            >
                <?php foreach ($images as $image) {
                    zn_render_image_wrapper($image, 'section__card');
                } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
