<?php

if (!defined('ABSPATH')) {
    exit();
}

define('ZN_DIST_DIR', get_template_directory() . '/dist');
define('ZN_DIST_URI', get_template_directory_uri() . '/dist');

function zn_manifest(): array
{
    static $manifest = null;

    if ($manifest !== null) {
        return $manifest;
    }

    $path = ZN_DIST_DIR . '/.vite/manifest.json';

    if (!file_exists($path)) {
        return $manifest = [];
    }

    $manifest = json_decode(file_get_contents($path), true);

    if (!is_array($manifest)) {
        $manifest = [];
    }

    return $manifest;
}

function zn_manifest_asset(string $entry, string $key = 'file'): ?string
{
    $manifest = zn_manifest();

    if (empty($manifest[$entry][$key])) {
        return null;
    }

    return ZN_DIST_URI . '/' . ltrim($manifest[$entry][$key], '/');
}
