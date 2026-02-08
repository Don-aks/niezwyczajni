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
      // eslint-disable-next-line no-param-reassign
      swiper.el.style.cursor = 'grab';

      // Prevent page scrolling when space is pressed
      swiper.el.addEventListener('keydown', (e) => {
        if (e.key === ' ' || e.key === 'Spacebar') {
          e.preventDefault();
        }
      });
    },
    touchStart(swiper, e) {
      const target = e?.target;
      // If clicked on an interactive element, don't change cursor
      if (
        target &&
        (target.tagName === 'A' ||
          target.tagName === 'BUTTON' ||
          target.hasAttribute('tabindex'))
      ) {
        return;
      }

      setCursorState(swiper.el, true);
    },
    touchEnd(swiper) {
      setCursorState(swiper.el, false);
    },
  },
});

export default getDefaultSwiperConfig;
