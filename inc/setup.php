<?php

if (!defined('ABSPATH')) {
    exit();
}

define('ZN_THEME_VERSION', '1.0.0');

function zn_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'header' => __('Menu nagłówka', 'zwyczajnieniezwyczajni'),
        'footer' => __('Menu stopki', 'zwyczajnieniezwyczajni'),
    ]);
}

add_action('after_setup_theme', 'zn_setup');
