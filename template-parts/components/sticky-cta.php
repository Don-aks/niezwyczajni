<div class="sticky-cta">
    <button
        class="sticky-cta__link inline-grid place-items-center"
        type="button"
        title="Wyświetl dane kontaktowe"
    >
        <span class="visually-hidden sticky-cta__description">
            Wyświetl dane kontaktowe
        </span>
        <?php zn_icon('phone', 'sticky-cta__icon transition-colors'); ?>
    </button>

    <div class="sticky-cta__popover"><?php zn_render_contact_info(); ?></div>
</div>
