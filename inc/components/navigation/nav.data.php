<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_nav_items(): array
{
    return [
        'index' => 'Główna',
        'about' => 'O nas',
        'events' => 'Wydarzenia',
        'content' => [
            'name' => 'Materiały',
            'subpages' => [
                'blog' => 'Artykuły',
                'books' => 'Książki',
                'testimonies' => 'Świadectwa',
            ],
        ],
        'media' => [
            'name' => 'Media',
            'subpages' => [
                'gallery' => 'Galeria',
                'videos' => 'Filmy',
            ],
        ],
    ];
}
