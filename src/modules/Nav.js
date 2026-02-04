class Nav {
  selectors = {
    root: '.nav',
    btn: '.nav__submenu-toggle',
  };

  constructor() {
    this.root = document.querySelector(this.selectors.root);
    if (!this.root) return;

    this.buttons = this.root.querySelectorAll(this.selectors.btn);
    document.addEventListener('click', this.handleToggleSubmenu);
  }

  static toggleSubmenu(button, submenu, desiredState = null) {
    const isActive = desiredState ?? !button.classList.contains('active');

    button.classList.toggle('active', isActive);
    button.setAttribute('aria-expanded', isActive);
    submenu.setAttribute('aria-hidden', !isActive);
  }

  handleToggleSubmenu = (event) => {
    const button = event.target.closest(this.selectors.btn);
    if (!button || !this.root.contains(button)) {
      this.#closeOtherActiveSubmenus();
      return;
    }

    const submenu = button.nextElementSibling;
    if (!submenu) {
      this.#closeOtherActiveSubmenus();
      return;
    }

    this.#closeOtherActiveSubmenus(button);
    Nav.toggleSubmenu(button, submenu);
  };

  #closeOtherActiveSubmenus(excludeButton) {
    this.buttons.forEach((btn) => {
      if (btn !== excludeButton && btn.classList.contains('active')) {
        const submenu = btn.nextElementSibling;
        if (submenu) {
          Nav.toggleSubmenu(btn, submenu, false);
        }
      }
    });
  }
}

export default Nav;
