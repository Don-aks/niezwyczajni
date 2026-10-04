<?php

/*
Template Name: Blog
*/

get_header();

$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 12,
]);
?>

<main class="main">
    <section class="articles section">
        <div class="container section__container">
            <header class="articles__header section__header">
                <div class="articles__headings">
                    <h2 class="section__title section__title--border-top">
                        Najnowsze artykuły
                    </h2>
                    <h3 class="section__subtitle">
                        Poznaj nasze historie i refleksje
                    </h3>
                </div>

                <div class="articles__meta">
                    <button
                        class="articles__search-button"
                        type="button"
                    >
                        <?php zn_icon('search', 'articles__search-icon'); ?>
                    </button>

                    <?php get_search_form(); ?>
                </div>
            </header>

            <ul class="articles__content list-reset grid gap-30">
                <?php while ($query->have_posts()): ?>
                <li class="articles__article-item">
                    <?php zn_render_article_card('articles__article'); ?>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer(); ?>
