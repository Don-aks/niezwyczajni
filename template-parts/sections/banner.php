<section
    class="banner relative bg-back"
    style="
        --image-url: url('https://res.cloudinary.com/aenetworks/image/upload/c_fill,ar_2,w_3840,h_1920,g_auto/dpr_auto/f_auto/q_auto:eco/v1/christianity-gettyimages-121153575?_a=BAVAZGID0');
        --brightness: 0.5;
        --position: center;
    "
>
    <div class="container banner__container relative">
        <svg
            class="banner__cross absolute"
            viewBox="9 0 41 140"
        >
            <path d="M40,1H60V40H90V60H60V139H40V60H10V40H40Z"></path>
        </svg>
        <div class="banner__content">
            <h1 class="banner__title"><?php echo esc_html(
                zn_acf(
                    'banner_title',
                    'Zwyczajnie Niezwyczajni - Chrześcijańska Misja Niosąca Nadzieję w Radomiu',
                ),
            ); ?></h1>
            <div class="banner__lead text">
                <?php echo wp_kses_post(
                    zn_acf(
                        'banner_lead',
                        '<p>Głosimy Ewangelię Jezusa Chrystusa i dzielimy się świadectwem przemienionego życia.</p>',
                    ),
                ); ?>
            </div>
            <div class="banner__buttons flex">
                <?php zn_render_cta_button(
                    'banner__btn banner__btn--primary',
                ); ?>

                <a
                    class="banner__btn banner__btn--secondary"
                    href="<?php echo esc_url(zn_page_url('about')); ?>"
                >
                    Dowiedz się więcej o nas
                </a>
            </div>
            <p class="banner__note">Otwarte dla każdego - Bez zobowiązań</p>
        </div>
    </div>
</section>
