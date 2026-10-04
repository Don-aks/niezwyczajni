<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_faq_button(array $button): void
{
    $classes = ['btn', 'faq__answer-btn'];

    if (!empty($button['classes'])) {
        $classes[] = $button['classes'];
    }

    $classes = esc_attr(implode(' ', $classes));

    $label = esc_html($button['label'] ?? 'Skontaktuj się z nami');

    if (($button['type'] ?? '') === 'link') {
        $href = esc_url($button['href'] ?? '');

        echo <<<HTML
        <a
            class="{$classes}"
            href="{$href}"
        >
            {$label}
        </a>
        HTML;

        return;
    }

    echo <<<HTML
    <button
        class="{$classes}"
        type="button"
        data-show-contact-info
    >
        {$label}
    </button>
    HTML;
}
