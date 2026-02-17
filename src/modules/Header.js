class Header {
  stateClasses = {
    scrolled: 'scrolled',
  };

  #lastScrollY = 0;
  #scrollOffset = 33;

  constructor() {
    this.element = document.querySelector('.header');
    if (!this.element) return;
    this.handleScroll();
    window.addEventListener('scroll', this.handleScroll);
  }

  handleScroll = () => {
    const isScrolled = window.scrollY > 0;
    this.element.classList.toggle(this.stateClasses.scrolled, isScrolled);

    if (window.scrollY - this.#lastScrollY > this.#scrollOffset) {
      this.element.classList.add('hidden');
    } else if (this.#lastScrollY - window.scrollY > 0) {
      this.element.classList.remove('hidden');
    }

    this.#lastScrollY = window.scrollY;
  };
}

export default Header;
