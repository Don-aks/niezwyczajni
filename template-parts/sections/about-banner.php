<?php
$cards = [
    [
        'title' => 'Na ulicach Radomia',
        'text' =>
            'Zatrzymujemy się, rozmawiamy i słuchamy. Dzielimy się Ewangelią i nadzieją z każdym, kto jej potrzebuje.',
        'iconId' => 'city',
        'btnText' => 'Dowiedz się więcej',
        'href' => '#about-mission',
        'isClickable' => true,
    ],
    [
        'title' => 'Za murami więzień',
        'text' =>
            'Przynosimy światło i nowy początek tam, gdzie świat często nie widzi już żadnej szansy.',
        'iconId' => 'prison',
        'btnText' => 'Dowiedz się więcej',
        'href' => '#about-mission',
        'isClickable' => true,
    ],
    [
        'title' => 'Żywe Słowo Boże',
        'text' =>
            'Biblia to żywe Słowo, które prowadzi i uzdrawia. Pokazuje drogę do wolności i nowego życia.',
        'iconId' => 'bible',
        'btnText' => 'Dowiedz się więcej',
        'href' => '#about-mission',
        'isClickable' => true,
    ],
]; ?>

<section class="about-banner section">
    <div class="about-banner__container container flex flex-col">
        <div
            class="about-banner__hero flex justify-between items-center gap-30"
        >
            <div
                class="about-banner__content section__content flex flex-col gap-30"
            >
                <h1 class="about-banner__title">
                    Chrześcijańska misja "Zwyczajnie niezwyczajni"
                </h1>
                <div class="about-banner__text text">
                    <p>
                        Wierzymy, że nikt nie jest stracony.
                        Że każdy człowiek może doświadczyć miłości
                        Boga, która naprawdę zmienia życie.
                    </p>
                </div>
                <div class="about-banner__buttons flex gap-15">
                    <?php zn_render_cta_button(); ?>
                    <?php zn_render_contact_button(['hasIcon' => false]); ?>
                </div>
            </div>

            <div class="about-banner__image-wrapper relative">
                <?php foreach (
                    [
                        'https://misja.org.pl/wp-content/uploads/2018/07/wspolnota.jpg',
                        'https://zarzadcy.com.pl/wp-uploads/wspolnota-mieszkaniowa-nmxe.jpg',
                        'https://www.poslanie.pl/upload/art_paragraph/591_img1_people-4050698_1280.jpg',
                    ]
                    as $image
                ): ?>
                <img
                    class="about-banner__image absolute"
                    src="<?= esc_url($image) ?>"
                    alt=""
                    width="600"
                    height="400"
                />
                <?php endforeach; ?>
            </div>
        </div>
        <ul
            class="section__cards-container about-banner__cards-container list-reset relative js-animation-card-container"
        >
            <?php foreach ($cards as $card) {
                zn_render_card($card, 'about-banner__card section__card');
            } ?>
        </ul>
    </div>
</section>
