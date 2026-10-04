<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_nav_list(array $items): void
{
    $html = '';

    foreach ($items as $item) {
        if (!empty($item->subpages)) {
            $html .= zn_render_nav_group($item);
            continue;
        }

        $html .= zn_render_nav_item($item);
    }

    echo <<<HTML
    <ul class="nav__list list-reset flex items-center gap-30">
        {$html}
    </ul>
    HTML;
}

function zn_render_nav_item(WP_Post $item): string
{
    $item_classes = ['nav__item'];
    $link_classes = ['nav__link'];

    $marker = '';
    $tabindex = '';

    if (!empty($item->current)) {
        $link_classes[] = 'current';
        $tabindex = 'tabindex="-1"';

        $icon = zn_get_icon('cross');

        $marker = <<<HTML
        <span class="nav__marker absolute transition-colors">
            {$icon}
        </span>
        HTML;
    }

    $item_classes = esc_attr(implode(' ', $item_classes));
    $link_classes = esc_attr(implode(' ', $link_classes));

    $url = esc_url($item->url);
    $label = esc_html($item->title);

    return <<<HTML
    <li class="{$item_classes}">
        {$marker}

        <a
            class="{$link_classes}"
            href="{$url}"
            {$tabindex}
        >
            {$label}
        </a>
    </li>
    HTML;
}

function zn_render_nav_group(WP_Post $item): string
{
    $subpages = '';

    foreach ($item->subpages as $subpage) {
        $marker = '';

        if ($subpage->is_current) {
            $marker = sprintf(
                '<span class="nav__marker absolute transition-colors">%s</span>',
                zn_get_icon('cross'),
            );
        }

        $submenu_item_classes = ['nav__submenu-item'];

        $link_classes = ['nav__link', 'nav__submenu-link'];

        if ($subpage->current) {
            $link_classes[] = 'current';
        }

        $submenu_item_classes = esc_attr(implode(' ', $submenu_item_classes));
        $link_classes = esc_attr(implode(' ', $link_classes));

        $url = esc_url($subpage->url);
        $label = esc_html($subpage->title);

        $subpages .= <<<HTML
            <li class="{$submenu_item_classes}">
                <a class="{$link_classes}" href="{$url}">
                    {$label}
                </a>
                {$marker}
            </li>
        HTML;
    }

    $label = esc_html($item->title);

    return <<<HTML
    <li class="nav__item">
        <div class="nav__submenu-wrapper relative">
            <button class="nav__link nav__submenu-toggle" type="button">
                {$label}
            </button>

            <ul class="nav__submenu list-reset">
                {$subpages}
            </ul>
        </div>
    </li>
    HTML;
}
