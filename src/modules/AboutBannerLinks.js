class AboutBannerLinks {
  selectors = {
    root: '.about-banner',
    card: '.about-banner__card',
    link: '.card__btn',

    targetSlider: '.about-mission__slider',
  };

  constructor(swipers) {
    this.root = document.querySelector(this.selectors.root);
    this.slider = document.querySelector(this.selectors.targetSlider);
    if (!this.root || !this.slider) return;

    this.swiper = swipers.find((swiper) => swiper.el === this.slider);

    const cards = [...this.root.querySelectorAll(this.selectors.card)];
    this.links = cards.map((card) => card.querySelector(this.selectors.link));

    this.bindEvents();
  }

  bindEvents() {
    this.links.forEach((link, index) => {
      link.addEventListener('click', () => this.swiper.slideTo(index, 700));
    });
  }
}

export default AboutBannerLinks;
