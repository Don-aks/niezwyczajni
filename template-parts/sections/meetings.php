<?php $meetings = zn_acf('meetings', zn_default_meetings()); ?>
<section
    id="meetings"
    class="meetings section section--on-dark section--centered section--extended bg-back"
    style="
        --image-url: url('https://campusministry.georgetown.edu/wp-content/uploads/sites/500/2024/02/53131181838_9beee9620b_k.jpg');
        --brightness: 0.35;
    "
>
    <div class="container section__container">
        <header class="section__header">
            <h2 class="section__title">Gdzie można nas znaleźć</h2>
            <h3 class="section__subtitle">Nasze Spotkania</h3>
            <div class="section__text text">
                <p>
                    Regularnie spotykamy się, by modlić się, studiować Pismo
                    Święte i budować relacje wsparcia.
                </p>
            </div>
        </header>
        <ul
            class="section__cards-container meetings__list list-reset js-animation-card-container"
        >
            <?php foreach ($meetings as $meeting) {
                zn_render_card($meeting, 'section__card');
            } ?>
        </ul>
        <footer
            class="section__footer section__footer--centered meetings__footer"
        >
            <?php zn_render_contact_button([
                'variant' => 'primary',
                'hasIcon' => false,
                'isSecondary' => false,
            ]); ?>

            <a
                class="btn btn--secondary btn--with-icon btn--white"
                href="#faq"
            >
                Najczęściej zadawane pytania
                <span class="icon"><?php zn_icon('question'); ?></span>
            </a>
        </footer>
    </div>
</section>
