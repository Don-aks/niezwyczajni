<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_card(
    array $card,
    string $class = '',
    string $tag = 'li',
): void {
    $allowed_tags = ['li', 'div', 'section', 'article'];

    if (!in_array($tag, $allowed_tags, true)) {
        $tag = 'div';
    }

    $classes = ['card', 'responsive', $class];

    if (!empty($card['isClickable'])) {
        $classes[] = 'clickable';
    }

    $classes = esc_attr(implode(' ', $classes));

    $title = esc_html($card['title'] ?? '');

    $text = '';

    if (!empty($card['text'])) {
        $text = sprintf(
            '<div class="card__text text">%s</div>',
            wp_kses_post($card['text']),
        );
    }

    $image = '';

    if (!empty($card['imageSrc'])) {
        $image = sprintf(
            <<<HTML
            <img
                class="card__image"
                src="%s"
                alt="%s"
                width="370"
                height="267"
            >
            HTML
            ,
            esc_url($card['imageSrc']),
            esc_attr($card['imageAlt'] ?? ''),
        );
    }

    $icon = '';

    if (!empty($card['iconId'])) {
        $icon = sprintf(
            '<span class="card__icon transition-colors">%s</span>',
            zn_get_icon($card['iconId']),
        );
    }

    $button = '';

    if (!empty($card['btnText']) && !empty($card['href'])) {
        $button_target = '';

        if (!empty($card['isOpenInNewTab'])) {
            $button_target = ' target="_blank" rel="noopener noreferrer"';
        }

        $button_icon = '';

        if (!empty($card['btnIcon'])) {
            $button_icon = sprintf(
                '<span class="icon">%s</span>',
                zn_get_icon($card['btnIcon']),
            );
        }

        $button = sprintf(
            <<<HTML
            <a class="btn btn--primary card__btn" href="%s"%s>
                %s%s
            </a>
            HTML
            ,
            esc_url($card['href']),
            $button_target,
            esc_html($card['btnText']),
            $button_icon,
        );
    }

    echo <<<HTML
    <{$tag} class="{$classes}" data-animate-on-scroll>
        <article class="card__wrapper">
            {$image}

            <div class="card__inner">
                {$icon}

                <h4 class="card__title">
                    {$title}
                </h4>

                {$text}

                {$button}
            </div>
        </article>
    </{$tag}>
    HTML;
}
