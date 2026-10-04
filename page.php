<?php get_header(); ?>

<main class="main">
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
</main>

<?php get_footer();
