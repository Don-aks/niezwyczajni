class Header {
  stateClasses = {
    scrolled: 'scrolled',
  };

  constructor() {
    this.element = document.querySelector('.header');
    if (!this.element) return;

    this.handleScroll();
    this.bindEvents();
  }

  bindEvents() {
    window.addEventListener('scroll', this.handleScroll);
  }

  handleScroll = () => {
    const isScrolled = window.scrollY > 0;
    this.element.classList.toggle(this.stateClasses.scrolled, isScrolled);
  };
}

export default Header;
