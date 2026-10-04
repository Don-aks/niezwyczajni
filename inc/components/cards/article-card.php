<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_article_card(string $class = ''): void
{
    $classes = ['article-card', 'articles-preview__card', 'flex', 'flex-col'];

    if ($class !== '') {
        $classes[] = $class;
    }

    $classes = esc_attr(implode(' ', $classes));

    $image_url = esc_url(
        get_the_post_thumbnail_url(get_the_ID(), 'medium_large'),
    );

    $image_alt = esc_attr(
        get_post_meta(
            get_post_thumbnail_id(),
            '_wp_attachment_image_alt',
            true,
        ) ?? '',
    );

    $image_width = 370;

    $date = esc_attr(get_the_date('Y-m-d'));
    $date_text = esc_html(get_the_date());

    $title = esc_html(get_the_title());
    $excerpt = wp_kses_post(get_the_excerpt());

    $link = esc_url(get_permalink());

    echo <<<HTML
    <article class="{$classes}">
    HTML;

    if (!empty($image_url)) {
        echo <<<HTML
        <img
            class="article-card__image articles-preview__image sepia-50"
            src="{$image_url}"
            alt="{$image_alt}"
            width="{$image_width}"
            height="200"
        >
        HTML;
    }

    echo <<<HTML
        <div class="article-card__image-wrapper">
            <time
                class="article-card__date"
                datetime="{$date}"
            >
                {$date_text}
            </time>
        </div>

        <div class="article-card__inner flex flex-col gap-15">
            <h3 class="article-card__title">
                {$title}
            </h3>

            <div class="article-card__text text">
                {$excerpt}
            </div>

            <a
                class="btn btn--secondary btn--fill-overlay article-card__link"
                href="{$link}"
            >
                Czytaj więcej
            </a>
        </div>
    </article>
    HTML;
}
