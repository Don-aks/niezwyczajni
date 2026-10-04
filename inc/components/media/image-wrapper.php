<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_image_wrapper(array $image, string $class = ''): void
{
    $src = esc_url($image['src'] ?? ($image['url'] ?? ''));
    $alt = esc_attr($image['alt'] ?? ($image['caption'] ?? ''));
    $width = (int) ($image['width'] ?? 600);
    $height = (int) ($image['height'] ?? 400);

    $classes = esc_attr('image-wrapper ' . $class);

    $attributes = '';

    if (!empty($image['caption'])) {
        $attributes = 'tabindex="0"';
    }

    $is_animated =
        !empty($image['is_animated']) &&
        $image['caption'] &&
        !$image['is_swiper_slide'];

    if ($is_animated) {
        $attributes .= <<<HTML
        data-animate-on-scroll
        data-animate-once
        data-animate-duration="500"
        HTML;
    }

    $caption = '';

    if (!empty($image['caption'])) {
        $caption = sprintf(
            '<figcaption class="image-wrapper__caption">%s</figcaption>',
            esc_html($image['caption']),
        );
    }

    echo <<<HTML
    <figure class="{$classes}"{$attributes}>
        <img
            class="image-wrapper__image"
            src="{$src}"
            alt="{$alt}"
            width="{$width}"
            height="{$height}"
        >

        {$caption}
    </figure>
    HTML;
}
