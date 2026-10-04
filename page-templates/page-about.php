<?php
/*
Template Name: About
*/
get_header(); ?>

<main class="main">
    <?php
    get_template_part('template-parts/sections/about-banner');
    get_template_part('template-parts/sections/about-action');
    get_template_part('template-parts/sections/about-mission');
    get_template_part('template-parts/sections/gallery-preview');
    get_template_part('template-parts/sections/mission');
    get_template_part('template-parts/sections/team');
    get_template_part('template-parts/sections/articles-preview');
    get_template_part('template-parts/sections/faq', null, ['page' => 'about']);
    get_template_part('template-parts/sections/cta');
    ?>
</main>

<?php get_footer();
