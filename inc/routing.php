<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_page_key(): string
{
    if (is_front_page()) {
        return 'index';
    }
    if (is_404()) {
        return '404';
    }

    if (is_single()) {
        return get_post_type() === 'post' ? 'article' : get_post_type();
    }

    if (
        is_post_type_archive('event') ||
        is_page_template('page-templates/page-events.php')
    ) {
        return 'events';
    }

    if (
        is_home() ||
        is_archive() ||
        is_page_template('page-templates/page-blog.php')
    ) {
        return 'blog';
    }

    $slug = get_post_field('post_name', get_queried_object_id());

    return $slug ?: 'index';
}

function zn_page_url(string $slug): string
{
    if ($slug === 'index') {
        return home_url('/');
    }

    $page = get_page_by_path($slug);

    return $page ? get_permalink($page) : home_url('/' . $slug . '/');
}
