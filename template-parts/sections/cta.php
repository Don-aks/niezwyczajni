<section class="cta section">
    <div
        class="cta__container container flex justify-between items-center gap-30"
    >
        <div class="cta__content">
            <header class="cta__header section__header">
                <h2 class="section__title">
                    <?php echo esc_html(
                        zn_acf('cta_title', 'Dołącz do nas'),
                    ); ?>
                </h2>
                <h3 class="section__subtitle">
                    <?php echo esc_html(
                        zn_acf('cta_subtitle', 'Chcesz być częścią tej misji?'),
                    ); ?>
                </h3>
                <div class="section__text">
                    <?php echo wp_kses_post(
                        zn_acf(
                            'cta_text',
                            '<p>Spotykamy się regularnie, modlimy się, rozmawiamy i pomagamy sobie nawzajem.</p>',
                        ),
                    ); ?>
                </div>
            </header>
            <footer class="section__footer">
                <?php zn_render_cta_button('cta__link'); ?>

                <?php zn_render_contact_button([
                    'classNames' => 'cta__btn',
                    'hasIcon' => false,
                ]); ?>
            </footer>
        </div>
        <img
            class="cta__image"
            src="https://as1.ftcdn.net/jpg/02/11/29/06/1000_F_211290641_8wvpbJKta9wIs1jcnwQXjF1dXehA1QM0.jpg"
            alt=""
            width="550"
            height="400"
        />
    </div>
</section>
