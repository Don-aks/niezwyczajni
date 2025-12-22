import breakpoints from '@/constants/breakpoints';

class StickyCta {
  selectors = {
    root: '.sticky-cta',
    link: '.sticky-cta__link',
    popover: '.sticky-cta__popover',
  };
  popoverClass = 'visible';

  constructor() {
    this.root = document.querySelector(this.selectors.root);
    if (!this.root) return;

    this.element = this.root.querySelector(this.selectors.link);
    this.popover = this.root.querySelector(this.selectors.popover);
    this.bindEvents();
  }

  bindEvents() {
    this.element.addEventListener('click', this.handleClick);
  }

  showPopover() {
    this.popover.classList.toggle(this.popoverClass);
  }

  handleClick = (event) => {
    if (window.innerWidth < breakpoints.tablet) return;

    event.preventDefault();
    this.showPopover();
  };
}

export default StickyCta;
