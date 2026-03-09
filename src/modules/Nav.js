function isClickedOutside(element, event) {
  const { top, bottom, left, right } = element.getBoundingClientRect();
  const { clientX, clientY } = event;

  const isInsideX = clientX >= left && clientX <= right;
  const isInsideY = clientY >= top && clientY <= bottom;
  return !(isInsideX && isInsideY);
}

class Nav {
  selectors = {
    root: '.nav',
    btn: '.nav__btn',
    menu: '.nav__menu',
    submenuBtn: '.nav__submenu-toggle',
  };

  activeClass = 'active';

  constructor() {
    this.root = document.querySelector(this.selectors.root);
    if (!this.root) return;

    this.menu = this.root.querySelector(this.selectors.menu);
    this.submenuButtons = this.root.querySelectorAll(this.selectors.submenuBtn);
    this.buttons = this.root.querySelectorAll(this.selectors.btn);

    this.#bindEvents();
  }

  toggleSubmenuPopup(button, submenu, desiredState = null) {
    const isBtnActive = button.classList.contains(this.activeClass);
    const isActive = desiredState ?? !isBtnActive;

    button.classList.toggle(this.activeClass, isActive);
    button.setAttribute('aria-expanded', isActive);
    submenu.setAttribute('aria-hidden', !isActive);
  }

  handleToggleSubmenuPopup = ({ target }) => {
    const button = target.closest(this.selectors.submenuBtn);
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
    this.toggleSubmenuPopup(button, submenu);
  };

  handleToggleMenu = ({ target }) => {
    const button = target.closest(this.selectors.btn);
    if (!button || !this.root.contains(button)) {
      this.menu.close();
      return;
    }

    const isOpen = this.menu.hasAttribute('open');
    if (isOpen) {
      this.menu.close();
      return;
    }

    this.menu.showModal();
    this.#observeClickOutsideMenu();
  };

  #observeClickOutsideMenu() {
    const controller = new AbortController();

    this.menu.addEventListener(
      'click',
      (event) => {
        if (isClickedOutside(this.menu, event)) {
          this.menu.close();
        }
      },
      { signal: controller.signal },
    );

    this.menu.addEventListener('close', () => {
      controller.abort();
    });
  }

  #closeOtherActiveSubmenus(excludeButton) {
    this.submenuButtons.forEach((btn) => {
      if (btn !== excludeButton && btn.classList.contains(this.activeClass)) {
        const submenu = btn.nextElementSibling;
        if (submenu) {
          this.toggleSubmenuPopup(btn, submenu, false);
        }
      }
    });
  }

  #bindEvents() {
    document.addEventListener('click', this.handleToggleSubmenuPopup);

    this.buttons.forEach((button) => {
      button.addEventListener('click', this.handleToggleMenu);
    });
  }
}

export default Nav;
