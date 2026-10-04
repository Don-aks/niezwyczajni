<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_acf(string $key, $fallback = '')
{
    if (function_exists('get_field')) {
        $value = get_field($key);

        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }

    return $fallback;
}

function zn_is_current_menu_item(WP_Post $item): bool
{
    $current_url = untrailingslashit(home_url($_SERVER['REQUEST_URI']));
    $item_url = untrailingslashit($item->url);

    return $current_url === $item_url;
}
