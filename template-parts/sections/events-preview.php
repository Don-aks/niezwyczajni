<?php $events = array_slice(zn_default_events(), 0, 3); ?>

<section class="section events-preview relative">
    <?php zn_icon('cross', 'events-preview__decor'); ?>

    <div class="container section__container events-preview__container">
        <header class="section__header events-preview__header">
            <h2 class="section__title">Wydarzenia i aktualności</h2>
            <h3 class="section__subtitle">
                Bądź na bieżąco z naszymi inicjatywami
            </h3>
        </header>
        <div class="events-preview__content section__cards-container">
            <?php foreach ($events as $event) {
                zn_render_event_card(
                    $event,
                    'events-preview__card section__card',
                );
            } ?>
        </div>
        <footer
            class="section__footer section__footer--centered events-preview__footer"
        >
            <?php zn_render_cta_button(); ?>

            <a
                class="btn btn--secondary btn--with-icon"
                href="<?php echo esc_url(zn_page_url('events')); ?>"
            >
                Zobacz wszystkie wydarzenia
                <span class="icon"><?php zn_icon('event'); ?></span>
            </a>
        </footer>
    </div>
</section>
