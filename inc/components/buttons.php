<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_cta_button(string $class = ''): void
{
    printf(
        '<a class="btn btn--primary %s" href="%s">Przyjdź na spotkanie</a>',
        esc_attr($class),
        esc_url(home_url('/#meetings')),
    );
}

function zn_render_contact_button(array $props = []): void
{
    $classes = ['btn', 'btn--' . ($props['variant'] ?? 'secondary')];
    $icon = '';

    if ($props['hasIcon'] ?? true) {
        $classes[] = 'btn--with-icon';
        $icon = sprintf('<span class="icon">%s</span>', zn_get_icon('phone'));
    }

    if (!empty($props['classNames'])) {
        $classes[] = $props['classNames'];
    }

    $classes = esc_attr(implode(' ', $classes));

    echo <<<HTML
    <button
        class="{$classes}"
        type="button"
        data-show-contact-info
    >
        Skontaktuj się z nami
        {$icon}
    </button>
    HTML;
}
