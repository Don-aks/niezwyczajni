<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_render_social_link(): void
{
    printf(
        '<a class="contact-info__soc1al icon inline-grid place-items-center transition-colors"
            href="%s"
            aria-label="%s"
            target="_blank"
            rel="noopener">
            %s
        </a>',
        esc_url('https://www.facebook.com/profile.php?id=61581355841275'),
        esc_attr('Facebook'),
        zn_get_icon('facebook'),
    );
}
