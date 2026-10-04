<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_spritemap_url(): string
{
    $manifest = zn_manifest();
    $file = $manifest['spritemap.svg']['file'] ?? 'assets/spritemap.svg';

    return ZN_DIST_URI . '/' . ltrim($file, '/');
}

function zn_icon(string $id, string $class = ''): void
{
    printf(
        '<svg%s><use href="%s#%s"></use></svg>',
        $class ? ' class="' . esc_attr($class) . '"' : '',
        esc_url(zn_spritemap_url()),
        esc_attr($id),
    );
}

function zn_get_icon(string $id, string $class = ''): string
{
    ob_start();
    zn_icon($id, $class);
    return (string) ob_get_clean();
}
