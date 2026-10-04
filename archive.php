<?php
get_header(); ?>

<main class="main">
    <section class="articles section">
        <div class="container section__container">
            <header class="articles__header section__header">
                <div class="articles__headings">
                    <h1 class="section__title section__title--border-top">
                        <?php the_archive_title(); ?>
                    </h1>

                    <?php the_archive_description(
                        '<div class="section__subtitle">',
                        '</div>',
                    ); ?>
                </div>
            </header>

            <?php if (have_posts()): ?>
                <ul class="articles__content list-reset grid gap-30">
                    <?php while (have_posts()):
                        the_post(); ?>

                    <li class="articles__article-item"><?php zn_render_article_card(
                        [
                            'imageUrl' =>
                                get_the_post_thumbnail_url(
                                    get_the_ID(),
                                    'medium_large',
                                ) ?:
                                'https://via.placeholder.com/370x200',
                            'imageAlt' => get_the_title(),
                            'date' => get_the_date('Y-m-d'),
                            'dateText' => get_the_date(),
                            'title' => get_the_title(),
                            'excerpt' => get_the_excerpt(),
                            'link' => get_permalink(),
                        ],
                        'articles__article',
                    ); ?></li>

                    <?php
                    endwhile; ?>
                </ul>
            <?php the_posts_pagination(); ?> <?php endif; ?>

        </div>
    </section>
</main>

<?php get_footer();
