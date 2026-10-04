<?php
get_header(); ?>
<main class="main">
    <?php
    get_template_part('template-parts/sections/banner');
    get_template_part('template-parts/sections/about');
    get_template_part('template-parts/sections/events-preview');
    get_template_part('template-parts/sections/faq', null, ['page' => 'index']);
    get_template_part('template-parts/sections/videos-preview');
    get_template_part('template-parts/sections/meetings');
    get_template_part('template-parts/sections/cta');
    ?>
</main>
<?php get_footer();
