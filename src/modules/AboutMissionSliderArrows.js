class AboutMissionSliderArrows {
  selectors = {
    root: '.about-mission__content',
    slider: '.about-mission__slider',

    prev: '.slider__btn--prev',
    next: '.slider__btn--next',

    activeSlide: '.about-mission__item.swiper-slide-active',
    slideContent: '.about-mission__item-content',
  };

  constructor(swipers) {
    this.root = document.querySelector(this.selectors.root);
    if (!this.root) return;

    this.slider = this.root.querySelector(this.selectors.slider);
    this.prev = this.root.querySelector(this.selectors.prev);
    this.next = this.root.querySelector(this.selectors.next);

    this.swiper = swipers.find((swiper) => swiper.el === this.slider);

    this.swiper.on('init', this.updateContentHeight);
    this.swiper.on('slideChange', this.updateContentHeight);
  }

  updateContentHeight = () => {
    const activeSlide = this.root.querySelector(this.selectors.activeSlide);
    const content = activeSlide.querySelector(this.selectors.slideContent);

    console.log(activeSlide, content);

    const contentHeight = content.offsetHeight;
    this.root.style.setProperty('--content-height', `${contentHeight / 2}px`);
  };
}

export default AboutMissionSliderArrows;
