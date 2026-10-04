<?php
get_header(); ?>

<main class="main">
    <?php if (have_posts()): ?>
        <section class="section">
            <div class="container section__container">
                <?php while (have_posts()):
                    the_post(); ?>

                    <article <?php post_class('text'); ?>>
                        <h1 class="section__title"><?php the_title(); ?></h1>

                        <?php the_content(); ?>
                    </article>

                <?php
                endwhile; ?>
            </div>
        </section>
    <?php else: ?>
        <?php get_template_part('template-parts/sections/banner'); ?>
    <?php endif; ?>
</main>

<?php get_footer();
