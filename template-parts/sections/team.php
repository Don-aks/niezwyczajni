<?php $members = [
    [
        'name' => 'Anna Kowalska',
        'role' => 'Koordynator Projektu',
        'imageUrl' =>
            'https://pbs.twimg.com/profile_images/1921620909065920512/M1Pp4NIs_400x400.jpg',
    ],
    [
        'name' => 'Jan Nowak',
        'role' => 'Specjalista ds. Marketingu',
        'imageUrl' =>
            'https://ocdn.eu/images/pulscms/M2I7MDA_/5cf09b3523cbc2e7576c0c1f81acd63a.jpeg',
    ],
    [
        'name' => 'Ewa Wiśniewska',
        'role' => 'Projektant Graficzny',
        'imageUrl' => 'https://fwcdn.pl/ppo/04/55/455/477780_1.3.jpg',
    ],
]; ?>
<section class="section team">
    <div class="container section__container">
        <header class="section__header">
            <h2 class="section__title">Nasz Zespół</h2>
            <h3 class="section__subtitle">
                Ludzi, którzy tworzą naszą wspólnotę
            </h3>
        </header>
        <div class="team__members section__cards-container">
            <?php foreach ($members as $member): ?>
            <div
                class="member flex flex-col gap-15"
                data-animate-on-scroll
            >
                <div class="member__image-wrapper relative">
                    <img
                        class="member__image"
                        src="<?php echo esc_url($member['imageUrl']); ?>"
                        alt="<?php echo esc_attr(
                            'Zdjęcie ' . $member['name'],
                        ); ?>"
                        width="370"
                        height="370"
                    />
                </div>
                <div class="member__info flex flex-col gap-7 text-center">
                    <h3 class="member__name">
                        <?php echo esc_html($member['name']); ?>
                    </h3>
                    <h4 class="member__role">
                        <?php echo esc_html($member['role']); ?>
                    </h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <footer class="section__footer section__footer--centered">
            <?php
            zn_render_cta_button();
            zn_render_contact_button();
            ?>
        </footer>
    </div>
</section>
