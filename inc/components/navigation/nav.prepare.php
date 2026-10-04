<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_prepare_nav(string $location = 'header'): array
{
    $locations = get_nav_menu_locations();

    if (empty($locations[$location])) {
        return [];
    }

    $menu = wp_get_nav_menu_object($locations[$location]);

    if (!$menu) {
        return [];
    }

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    if (!$menu_items) {
        return [];
    }

    $items_by_id = [];
    $items = [];

    foreach ($menu_items as $item) {
        $item->subpages = [];
        $items_by_id[$item->ID] = $item;

        if (zn_is_current_menu_item($item)) {
            $item->current = true;
        }
    }

    foreach ($items_by_id as $item) {
        if ($item->menu_item_parent) {
            $items_by_id[$item->menu_item_parent]->subpages[] = $item;
            continue;
        }

        $items[] = $item;
    }

    return $items;
}
