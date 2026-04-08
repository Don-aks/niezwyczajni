class Header {
  selector = '.header';
  stateClasses = {
    scrolled: 'scrolled',
    hidden: 'hidden',
  };

  scrollOffset = 33;
  #lastScrollY = 0;

  constructor() {
    this.element = document.querySelector(this.selector);
    if (!this.element) return;

    this.handleScroll();
    window.addEventListener('scroll', this.handleScroll);
  }

  handleScroll = () => {
    const isScrolled = window.scrollY > 0;
    this.element.classList.toggle(this.stateClasses.scrolled, isScrolled);

    const scrollDelta = window.scrollY - this.#lastScrollY;

    if (scrollDelta > this.scrollOffset) {
      this.element.classList.add(this.stateClasses.hidden);
    } else if (scrollDelta < -this.scrollOffset || !isScrolled) {
      this.element.classList.remove(this.stateClasses.hidden);
    }

    this.#lastScrollY = window.scrollY;
  };
}

export default Header;
