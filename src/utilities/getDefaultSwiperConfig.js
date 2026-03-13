import isElementInteractive from './isElementInteractive';

const setCursorState = (swiperEl, isGrabbing) => {
  if (!swiperEl) return;
  const cursor = isGrabbing ? 'grabbing' : 'grab';

  swiperEl.style.cursor = cursor;
  document.body.style.cursor = isGrabbing ? 'grabbing' : '';
  swiperEl.style.pointerEvents = isGrabbing ? 'none' : '';
};

const getDefaultSwiperConfig = () => ({
  keyboard: { enabled: true, pageUpDown: true },
  on: {
    init(swiper) {
      swiper.el.style.cursor = 'grab';

      swiper.el.addEventListener('focusin', ({ target }) => {
        swiper.slides.forEach((slide) => {
          const isFocusedInside = slide.contains(target);
          const isActiveSlide = swiper.slides[swiper.activeIndex] === slide;

          if (!isFocusedInside || isActiveSlide) return;
          swiper.slideTo(swiper.slides.indexOf(slide));
        });
      });
    },

    touchStart(swiper, { target }) {
      if (isElementInteractive(target)) return;
      setCursorState(swiper.el, true);
    },

    touchEnd(swiper) {
      setCursorState(swiper.el, false);
    },
  },
});

export default getDefaultSwiperConfig;
