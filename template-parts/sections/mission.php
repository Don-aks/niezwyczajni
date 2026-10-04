<?php
$images = [
    [
        'src' =>
            'https://iccscampus.org/wp-content/uploads/2017/11/Serving-God-in-prison.jpg',
        'caption' => 'Ewangelizacja w więzieniu',
    ],
    [
        'src' =>
            'https://wp.cruxnow.com/wp-content/uploads/2021/06/street-evangelization.png',
        'caption' => 'Ewangelizacja uliczna',
    ],
    [
        'src' =>
            'https://www.evangelism.today/wp-content/uploads/2023/03/preaching_1-1080x675.jpg',
        'caption' => 'Praca z młodzieżą',
    ],
]; ?>

<section class="mission section">
    <div class="container section__container">
        <header class="section__header">
            <h2 class="section__title mission__title">Nasza wizja</h2>
            <h3 class="section__subtitle mission__subtitle">Jaki nasz cel?</h3>
        </header>

        <div class="mission__content flex justify-between items-center">
            <div class="mission__about flex flex-col gap-30">
                <div class="mission__slider swiper">
                    <ul class="swiper-wrapper list-reset">
                    <?php foreach ($images as $image): ?>
                        <li class="swiper-slide">
                            <figure class="mission__image-wrapper flex flex-col gap-15">
                                <img
                                    class="mission__image"
                                    src="<?= esc_attr($image['src']) ?>"
                                    alt="<?= esc_attr(
                                        $image['alt'] ?? $image['caption'],
                                    ) ?>"
                                    width="600"
                                    height="370"
                                />
                                <figcaption class="mission__image-caption">
                                    <?= $image['caption'] ?>
                                </figcaption>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>

                <div class="mission__moto flex flex-col gap-7">
                    <h2 class="mission__moto-title">Nasza misja</h2>
                    <p class="mission__moto-description">
                        Głoszenie Dobrej Nowiny oraz niesienie nadziei wszystkim
                        tym, którzy ją utracili.
                    </p>
                </div>
            </div>

            <div class="mission__info section__content flex flex-col gap-30">
                <p class="mission__text">
                    Wierzymy, że
                    <strong>Pan Jezus kocha każdego człowieka</strong>
                    i pragnie prawdziwej wolności.
                </p>
                <blockquote class="mission__quote">
                    <p>
                        Tak bowiem Bóg umiłował świat, że Syna swego
                        Jednorodzonego dał.
                    </p>
                    <p>
                        <a
                            href="https://www.bible.com/pl/bible/138/JHN.3.16-17"
                        >
                            Ewangelia Jana 3,16-17
                        </a>
                    </p>
                </blockquote>
                <ul
                    class="mission__cards list-reset flex gap-7 js-animation-card-container"
                >
                    <?php foreach (
                        [
                            ['title' => 'Wiara', 'iconId' => 'cross'],
                            ['title' => 'Miłość', 'iconId' => 'heart'],
                            ['title' => 'Nadzieja', 'iconId' => 'dove'],
                        ]
                        as $card
                    ) {
                        zn_render_card($card, 'mission__card');
                    } ?>
                </ul>
                <div class="mission__slider-pagination slider-pagination flex"></div>
                <footer class="mission__footer section__footer">
                    <?php
                    zn_render_cta_button();
                    zn_render_contact_button();
                    ?>
                </footer>
            </div>
        </div>
    </div>
</section>
