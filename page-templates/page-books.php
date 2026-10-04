<?php

/*
Template Name: Books
*/

get_header();

$books = zn_acf('books', zn_default_books());

$title = esc_html(zn_acf('books_title', 'Książki'));

$subtitle = esc_html(zn_acf('books_subtitle', 'Nasze publikacje'));
?>

<main class="main">
    <section class="books section">
        <div class="container books__container">
            <header class="section__header books__header">
                <h2 class="section__title books__title">
                    <?= $title ?>
                </h2>

                <h3 class="section__subtitle books__subtitle">
                    <?= $subtitle ?>
                </h3>
            </header>

            <div class="books__list flex flex-wrap gap-6">
                <?php foreach ($books as $book) {
                    zn_render_book_card($book);
                } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
