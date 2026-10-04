<?php
get_header(); ?>

<main class="main">
    <section class="section-404">
        <div
            class="container section-404__container flex flex-col items-center"
        >
            <video
                class="section-404__video"
                src="<?php echo zn_asset('src/assets/videos/404.webm'); ?>"
                playsinline
                autoplay
                muted
                loop
            ></video>

            <h1 class="section__title">404 - Strona nie znaleziona</h1>
            <p class="section-404__text">
                Przepraszamy, ale strona, której szukasz, nie istnieje lub
                została przeniesiona.
            </p>

            <a
                class="btn btn--primary"
                href="<?php echo esc_url(home_url('/')); ?>"
            >
                Powrót na stronę główną
            </a>
        </div>
    </section>
</main>

<?php get_footer();
