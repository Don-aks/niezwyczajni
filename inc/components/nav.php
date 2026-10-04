<?php

if (!defined('ABSPATH')) {
    exit();
}

require_once __DIR__ . '/navigation/nav.prepare.php';
require_once __DIR__ . '/navigation/nav.view.php';

function zn_render_nav(?string $location = 'header', array $props = []): void
{
    $items = zn_prepare_nav($location);

    $class_names = $props['classNames'] ?? 'header__nav';
    $is_top = $props['isTop'] ?? true;

    $classes = ['nav', $class_names];

    if ($is_top) {
        $classes[] = 'nav--top';
    }
    ?>

    <nav class="<?= esc_attr(implode(' ', $classes)) ?>">
        <?php zn_render_nav_list($items); ?>

        <button
            class="nav__btn grid place-items-center"
            type="button"
        >
            <span class="visually-hidden">
                Otwórz menu
            </span>

            <span class="nav__btn-bar"></span>
        </button>

        <?php if ($is_top): ?>
            <dialog id="menu" class="nav__menu">
                <div class="nav__menu-buttons relative">
                    <button
                        class="nav__btn nav__btn--active nav__menu-btn absolute grid place-items-center"
                        type="button"
                    >
                        <span class="visually-hidden">
                            Zamknij menu
                        </span>

                        <span class="nav__btn-bar"></span>
                    </button>

                    <button
                        class="nav__back absolute grid place-items-center"
                        type="button"
                    >
                        <span class="visually-hidden">
                            Wróć do poprzedniego menu
                        </span>

                        <?= zn_get_icon('arrow-back', 'nav__back-icon') ?>
                    </button>
                </div>

                <?php zn_render_nav_list($items); ?>
            </dialog>
        <?php endif; ?>
    </nav>

    <?php
}
