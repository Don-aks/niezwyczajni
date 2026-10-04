<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_contact_info(): void
{
    $social_count = 4;

    echo <<<HTML
    <div class="contact-info flex flex-col gap-15">
        <div class="text">
            <p>
                <strong>Grzegorz Gzik</strong>
                <br>
                <a href="tel:+48737524539">tel. 737 524 539</a>
                <br>
                <a href="mailto:gzikg@onet.pl">gzikg@onet.pl</a>
            </p>
        </div>

        <div class="contact-info__soc1als flex">
    HTML;

    for ($i = 0; $i < $social_count; $i++) {
        zn_render_social_link();
    }

    echo <<<HTML
        </div>
    </div>
    HTML;
}
