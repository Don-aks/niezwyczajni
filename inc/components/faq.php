<?php

if (!defined('ABSPATH')) {
    exit();
}

require_once __DIR__ . '/faq/faq-item.php';
require_once __DIR__ . '/faq/faq-button.php';

function zn_render_faq(array $items): void
{
    foreach ($items as $index => $item) {
        zn_render_faq_item($item, $index);
    }
}
