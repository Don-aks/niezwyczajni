<footer class="footer">
    <div class="footer__container container">
        <h2 class="title footer__title">Kontakt</h2>
        <address class="footer__contacts flex">
            <?php zn_render_contact_info(); ?>
            <?php zn_render_contact_info(); ?>
            <?php zn_render_contact_info(); ?>
        </address>
    </div>
    <p class="footer__copy">
        <small class="footer__copy-text">
            Chwała Panu Bogu! (coś jeszcze?)
            <br>
            &copy; <?php echo esc_html(date('Y')); ?>
            Zwyczajnie Niezwyczajni. Wszelkie prawa zastrzeżone (?).
        </small>
    </p>
</footer>
