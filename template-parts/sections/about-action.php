<section
    class="about-action section section--on-dark section--centered section--extended bg-back"
    style="
        --image-url: url('https://zacheusz.wroclaw.pl/wp-content/uploads/2021/07/Zdj%C4%99cie-Wspolnoty-Rabka.jpeg');
        --brightness: 0.3;
        padding-top: 180px;
    "
>
    <div class="container section__container about-action__container">
        <header class="section__header">
            <h2 class="section__title">Poznaj naszą misję ewangelizacyjną</h2>
            <h3 class="section__subtitle">
                Jak działamy w Radomiu i okolicach
            </h3>
        </header>

        <div
            class="about-action__content flex justify-between items-center gap-30"
        >
            <div class="about-action__slogan">
                <div class="about-action__quote-wrapper relative">
                    <div class="about-action__quote relative">
                        <blockquote>
                            <p>
                                Idźcie na cały świat i głoście Ewangelię
                                wszelkiemu stworzeniu!
                            </p>
                            <p>
                                <a
                                    href="https://www.bible.com/pl/bible/138/MRK.16.15"
                                >
                                    Ewangelia Marka 16, 15
                                </a>
                            </p>
                        </blockquote>
                    </div>
                </div>
                <small class="about-action__slogan-note">
                    Ten nakaz misyjny Pana Jezusa jest fundamentem naszego
                    działania
                </small>
            </div>

            <div class="about-action__info flex flex-col gap-15">
                <ul class="about-action__list list-reset flex flex-col gap-15">
                    <li class="about-action__item flex flex-col gap-7">
                        <div class="about-action__icon icon">
                            <?php zn_icon('bible'); ?>
                        </div>
                        <h4 class="about-action__item-title">Nasza wiara</h4>
                        <p class="about-action__item-text">
                            Każdy człowiek zasługuje na szansę usłyszenia Dobrej
                            Nowiny.
                        </p>
                    </li>

                    <li class="about-action__item flex flex-col gap-7">
                        <div class="about-action__icon icon">
                            <?php zn_icon('city'); ?>
                        </div>
                        <h4 class="about-action__item-title">
                            Nasze działanie
                        </h4>
                        <p class="about-action__item-text">
                            Angażujemy się w różnorodne działania
                            ewangelizacyjne w regionie.
                        </p>
                    </li>
                </ul>

                <small class="about-action__info-note relative">
                    Uwolnieni, aby wyzwalać innych
                </small>
            </div>
        </div>

        <footer class="section__footer section__footer--centered">
            <?php zn_render_cta_button(); ?>

            <?php zn_render_contact_button([
                'classNames' => 'btn--white',
            ]); ?>
        </footer>
    </div>
</section>
