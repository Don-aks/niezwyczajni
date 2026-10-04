<section class="about section">
    <div class="container about__container flex justify-between gap-30">
        <div class="about__content section__container">
            <header class="section__header about__header">
                <h2 class="section__title about__title">Kim Jesteśmy</h2>
                <h3 class="section__subtitle about__subtitle">
                    O naszej misji
                </h3>
            </header>
            <div class="about__text text">
                <p>
                    Chrześcijańska misja "Zwyczajnie niezwyczajni" z Radomia to
                    grupa ludzi, którzy doświadczyli Bożej łaski i miłości, a
                    teraz chcą przekazać ją dalej.
                </p>
                <strong>Nie jesteśmy ruchem - jesteśmy wspólnotą.</strong>
                <p>
                    Spotykamy się regularnie, modlimy się, studiujemy Pismo
                    Święte i angażujemy się w różne formy ewangelizacji.
                </p>
            </div>
            <footer class="section__footer">
                <?php zn_render_cta_button(); ?>

                <a
                    class="btn btn--secondary"
                    href="<?php echo esc_url(zn_page_url('about')); ?>"
                >
                    Dowiedz się więcej o nas
                </a>
            </footer>
        </div>
        <div class="about__image-wrapper">
            <div class="about__image-container">
                <div
                    class="about__image-inner relative"
                    data-animate-on-scroll
                >
                    <?php foreach (
                        [
                            'https://misja.org.pl/wp-content/uploads/2018/07/wspolnota.jpg',
                            'https://zarzadcy.com.pl/wp-uploads/wspolnota-mieszkaniowa-nmxe.jpg',
                            'https://www.poslanie.pl/upload/art_paragraph/591_img1_people-4050698_1280.jpg',
                        ]
                        as $image
                    ): ?>
                    <img
                        class="about__image absolute"
                        src="<?php echo esc_url($image); ?>"
                        alt=""
                        width="600"
                        height="400"
                        data-animate-item
                    />
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
