<?php get_header(); ?>

<main class="main">
    <?php while (have_posts()):
        the_post(); ?>

        <article <?php post_class('article'); ?>>
            <div class="container article__container">

                <header class="article__header">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('large', [
                            'class' => 'article__banner',
                        ]);
                    } ?>

                    <h1 class="article__title"><?php the_title(); ?></h1>

                    <div class="article__meta">
                        <span class="article__date">
                            <?php zn_icon('calendar'); ?>

                            <time
                                class="article__date-text"
                                datetime="<?php echo esc_attr(
                                    get_the_date('c'),
                                ); ?>"
                            >
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                        </span>
                        <span class="article__author author">
                            <span class="author__icon icon">
                                <?php zn_icon('user'); ?>
                            </span>
                            <span class="article__author-name">
                                <?php the_author(); ?>
                            </span>
                        </span>
                    </div>
                </header>

                <section class="article__content text">
                    <?php the_content(); ?>
                </section>
            </div>
        </article>

    <?php
    endwhile; ?>

    <?php get_template_part('template-parts/sections/cta'); ?>
</main>

<?php get_footer();
