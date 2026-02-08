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

      // Prevent page scrolling when space is pressed
      swiper.el.addEventListener('keydown', (e) => {
        if (e.key === ' ' || e.key === 'Spacebar') {
          e.preventDefault();
        }
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
