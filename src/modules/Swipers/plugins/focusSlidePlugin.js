function changeSlideOnFocus(swiper) {
  swiper.el.addEventListener('focusin', ({ target }) => {
    swiper.slides.forEach((slide) => {
      const isFocusedInside = slide.contains(target);
      const isActiveSlide = swiper.slides[swiper.activeIndex] === slide;

      if (!isFocusedInside || isActiveSlide) return;
      swiper.slideTo(swiper.slides.indexOf(slide));
    });
  });
}

export default changeSlideOnFocus;
