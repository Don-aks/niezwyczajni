import breakpoints from '@/constants/breakpoints';

class StickyCta {
  selectors = {
    root: '.sticky-cta',
    link: '.sticky-cta__link',
    popover: '.sticky-cta__popover',
    description: '.sticky-cta__description',
    showPopoverElements: '[data-show-contact-info]',
  };
  popoverClass = 'visible';
  desktopDescription = 'Zobacz dane kontaktowe';

  constructor() {
    this.root = document.querySelector(this.selectors.root);
    if (!this.root) return;

    this.element = this.root.querySelector(this.selectors.link);
    this.popover = this.root.querySelector(this.selectors.popover);
    this.description = this.element.querySelector(this.selectors.description);
    this.showPopoverElements = document.querySelectorAll(
      this.selectors.showPopoverElements,
    );

    this.setDescriptionText();
    this.bindEvents();
  }

  setDescriptionText() {
    if (window.innerWidth > breakpoints.tablet) {
      this.description.textContent = this.desktopDescription;
      this.element.setAttribute('title', this.desktopDescription);
    }
  }

  bindEvents() {
    this.element.addEventListener('click', this.#handleClick);
    this.showPopoverElements.forEach((el) => {
      el.addEventListener('click', this.#handleClick);
    });
  }

  showPopover() {
    this.popover.classList.add(this.popoverClass);

    this.element.setAttribute('aria-expanded', 'true');
    this.popover.setAttribute('aria-hidden', 'false');

    document.addEventListener('click', this.#handleOutsideClick);
  }

  hidePopover() {
    this.popover.classList.remove(this.popoverClass);

    this.element.setAttribute('aria-expanded', 'false');
    this.popover.setAttribute('aria-hidden', 'true');

    document.removeEventListener('click', this.#handleOutsideClick);
  }

  #handleClick = (event) => {
    if (window.innerWidth <= breakpoints.tablet) return;
    event.preventDefault();

    const isVisible = this.popover.classList.contains(this.popoverClass);
    if (isVisible) {
      this.hidePopover();
    } else {
      this.showPopover();
    }
  };

  #handleOutsideClick = (event) => {
    if (event.target.closest(this.selectors.showPopoverElements)) {
      return;
    }

    if (!this.root.contains(event.target)) {
      this.hidePopover();
    }
  };
}

export default StickyCta;
