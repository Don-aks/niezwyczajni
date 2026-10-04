<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_event_card(array $event, string $class = ''): void
{
    $classes = ['event-card', 'flex', 'flex-col'];

    if (!empty($event['isHappened'])) {
        $classes[] = 'happened';
    }

    if (!empty($class)) {
        $classes[] = $class;
    }

    $classes = esc_attr(implode(' ', $classes));

    $image_src = $event['imageSrc'] ?? 'https://via.placeholder.com/370x200';
    $image_alt = $event['imageAlt'] ?? '';
    $image_width = (int) ($event['imageWidth'] ?? 370);

    $date = esc_attr($event['date'] ?? '');
    $date_text = esc_html($event['dateText'] ?? ($event['date'] ?? ''));

    $title = esc_html($event['title'] ?? '');

    $location = '';

    if (!empty($event['location'])) {
        $location_url = esc_url($event['locationUrl'] ?? '');

        $location = sprintf(
            <<<HTML
            <a
                class="event-card__location flex gap-7"
                href="%s"
                target="_blank"
                rel="noopener noreferrer"
            >
                %s%s
            </a>
            HTML
            ,
            $location_url,
            zn_get_icon('location-pin'),
            esc_html($event['location']),
        );
    }

    $description = '';

    if (!empty($event['description'])) {
        $description = sprintf(
            '<p class="event-card__description text">%s</p>',
            esc_html($event['description']),
        );
    }

    $link = '';

    if (!empty($event['link'])) {
        $link = sprintf(
            <<<HTML
            <a
                class="event-card__link btn btn--secondary btn--fill-overlay"
                href="%s"
            >
                Czytaj więcej
            </a>
            HTML
            ,
            esc_url($event['link']),
        );
    }

    echo <<<HTML
    <div class="{$classes}">
        <div class="event-card__image-wrapper">
            <img
                class="event-card__image sepia-50"
                src="{$image_src}"
                alt="{$image_alt}"
                width="{$image_width}"
                height="200"
            >

            <time
                class="event-card__date"
                datetime="{$date}"
            >
                {$date_text}
            </time>
        </div>

        <div class="event-card__inner flex flex-col gap-15">
            <h3 class="event-card__title">
                {$title}
            </h3>

            {$location}

            {$description}

            {$link}
        </div>
    </div>
    HTML;
}
