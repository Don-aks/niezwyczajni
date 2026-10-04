<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_video(array $video, string $class = ''): void
{
    $youtube_id = esc_attr($video['youtubeId'] ?? '');

    $quality = !empty($video['isHD']) ? 'maxresdefault' : 'hqdefault';

    $title = esc_html($video['title'] ?? '');

    $wrapper_title = 'Odtwórz wideo';

    if (empty($video['hasTitle']) && !empty($title)) {
        $wrapper_title = 'Odtwórz wideo pt. ' . $title;
    }

    $wrapper_title = esc_attr($wrapper_title);

    $classes = esc_attr('video flex flex-col gap-15 ' . $class);

    $animation = '';

    if (!empty($video['hasAnimation'])) {
        $animation = 'data-animate-on-scroll';
    }

    $duration = '';

    if (!empty($video['duration'])) {
        $duration = sprintf(
            '<span class="video__duration"><span class="visually-hidden">Czas trwania wideo: </span><span aria-hidden="true">%s</span></span>',
            esc_html($video['duration']),
        );
    }

    $label = '';

    if (!empty($video['label'])) {
        $label = sprintf(
            '<span class="video__label"><span class="visually-hidden">Etykieta wideo:</span>%s</span>',
            esc_html($video['label']),
        );
    }

    $video_title = '';

    if (($video['isShowTitle'] ?? true) || ($video['hasTitle'] ?? true)) {
        $video_title = sprintf(
            '<h3 class="video__title" aria-hidden="true">%s</h3>',
            $title,
        );
    }

    $thumbnail = esc_attr(
        "https://img.youtube.com/vi/{$youtube_id}/{$quality}.jpg",
    );

    $icon = zn_get_icon('video-circle', 'video__icon');

    echo <<<HTML
    <div class="{$classes}" data-youtube-id="{$youtube_id}" title="{$wrapper_title}">
        <button
            class="video__btn relative"
            type="button"
            style="background-image:url('{$thumbnail}')"
            {$animation}
        >
            <span class="visually-hidden">
                Odtwórz wideo pod tytułem {$title}
            </span>

            {$icon}

            {$duration}

            {$label}
        </button>

        {$video_title}
    </div>
    HTML;
}
