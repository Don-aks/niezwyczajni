<?php

if (!defined('ABSPATH')) {
    exit();
}

define('ZN_VITE_DEV_SERVER', 'http://localhost:5173');

function zn_is_vite_development(): bool
{
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        return false;
    }

    static $is_dev = null;

    if ($is_dev !== null) {
        return $is_dev;
    }

    $parts = parse_url(ZN_VITE_DEV_SERVER);
    $host = $parts['host'] ?? 'localhost';
    $port = $parts['port'] ?? 5173;

    $connection = @fsockopen($host, (int) $port, $errno, $errstr, 0.2);

    if (is_resource($connection)) {
        fclose($connection);
        $is_dev = true;
    } else {
        $is_dev = false;
    }

    return $is_dev;
}

function zn_enqueue_entry(string $entry): void
{
    if (zn_is_vite_development()) {
        $id = 'zn-dev-' . sanitize_key($entry);

        wp_enqueue_script_module(
            $id,
            ZN_VITE_DEV_SERVER . '/' . ltrim($entry, '/'),
            ['vite-client'],
        );

        return;
    }

    $manifest = zn_manifest();
    $asset = $manifest[$entry] ?? null;

    if (empty($asset['file'])) {
        return;
    }

    $handle = 'zn-' . sanitize_key($entry);

    foreach ($asset['css'] ?? [] as $index => $css) {
        wp_enqueue_style(
            "{$handle}-{$index}",
            ZN_DIST_URI . '/' . ltrim($css, '/'),
            [],
            '',
        );
    }

    wp_enqueue_script(
        $handle,
        ZN_DIST_URI . '/' . ltrim($asset['file'], '/'),
        [],
        '',
        true,
    );
}

function zn_enqueue_assets(): void
{
    if (zn_is_vite_development()) {
        wp_enqueue_script_module(
            'vite-client',
            ZN_VITE_DEV_SERVER . '/@vite/client',
        );
    }

    zn_enqueue_entry('src/main.js');

    $page_key = zn_page_key();
    zn_enqueue_entry("src/pages/{$page_key}/{$page_key}.js");
}

function zn_asset(string $path): string
{
    return esc_url(get_template_directory_uri() . '/' . ltrim($path, '/'));
}

add_action('wp_enqueue_scripts', 'zn_enqueue_assets');
