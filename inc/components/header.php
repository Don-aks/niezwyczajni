<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_header(?string $current = null): void
{
    $logo_url = esc_url(home_url('/'));
    $logo_img = esc_url(zn_asset('src/assets/images/logo.webp'));
    $logo_alt = esc_attr('Logotyp misji Zwyczajnie Niezwyczajni');

    echo <<<HTML
    <header class="header">
        <div class="header__container container flex justify-between items-center">
            <a class="logo" href="{$logo_url}">
                <img class="logo__img" src="{$logo_img}" alt="{$logo_alt}" width="83" height="55">
            </a>
    HTML;

    zn_render_nav();

    echo <<<HTML
        </div>
    </header>
    HTML;
}
