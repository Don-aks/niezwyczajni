<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_book_card(array $book): void
{
    $image = $book['image'] ?? '';

    if (is_array($image)) {
        $image_url = $image['url'] ?? '';
        $image_alt = $image['alt'] ?? '';
    } else {
        $image_url = $image;
        $image_alt = $book['title'] ?? '';
    }

    if (!$image_url) {
        $image_url = 'https://via.placeholder.com/300x400';
    }

    if (!$image_alt) {
        $image_alt = $book['title'] ?? '';
    }

    $image_url = esc_url($image_url);
    $image_alt = esc_attr($image_alt);

    $title = esc_html($book['title'] ?? '');
    $description = esc_html($book['description'] ?? '');

    $link = $book['link'] ?? '';

    if (is_array($link)) {
        $link = $link['url'] ?? '';
    }

    $link = esc_url($link);

    echo <<<HTML
    <div class="book-card flex flex-col gap-4">
        <img
            class="book-card__image"
            src="{$image_url}"
            alt="{$image_alt}"
            width="300"
            height="400"
        >

        <h4 class="book-card__title">
            {$title}
        </h4>

        <p class="book-card__description">
            {$description}
        </p>

        <a
            class="btn btn--primary"
            href="{$link}"
            target="_blank"
            rel="noopener"
        >
            Zobacz więcej
        </a>
    </div>
    HTML;
}
