<?php
/*
Template Name: Events
*/
get_header();

$events = zn_default_events();
?>

<main class="main">
    <section class="section events">
        <div class="container section__container">
            <header class="events__header section__header">
                <div class="events__headings">
                    <h2 class="section__title section__title--border-top">
                        Nadchodzące wydarzenia
                    </h2>
                    <h3 class="section__subtitle">
                        Dołącz do naszych spotkań i inicjatyw
                    </h3>
                </div>
            </header>

            <ul class="events__content list-reset grid js-infinity-scroll">
                <?php foreach ($events as $event): ?>
                <li class="events__event-item">
                    <?php zn_render_event_card($event); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer();
