<?php

$page = $args['page'] ?? zn_page_key();
$items = zn_default_faq($page);

$more_questions_url = esc_url(zn_page_url('about') . '#faq');
?>

<section id="faq" class="faq section">
    <div class="container faq__container relative flex">
        <?php zn_icon('question', 'faq__decor-icon relative'); ?>

        <div class="faq__inner section__container">
            <header class="faq__header section__header">
                <h2 class="section__title">Najczęściej zadawane pytania</h2>
                <h3 class="section__subtitle">
                    Masz pytania? Mamy odpowiedzi!
                </h3>
            </header>

            <div class="faq__content section__content">
                <?php zn_render_faq($items); ?>
            </div>

            <footer class="section__footer">
                <?php zn_render_cta_button(); ?>

                <?php if ($page === 'index'): ?>
                    <a
                        class="btn btn--secondary btn--with-icon faq__btn faq__btn--secondary"
                        href="<?php echo esc_url(
                            zn_page_url('about') . '#faq',
                        ); ?>"
                    >
                        Zobacz więcej pytań
                        <span class="icon"><?php zn_icon('question'); ?></span>
                    </a>
                <?php endif; ?>
            </footer>
        </div>
    </div>
</section>
