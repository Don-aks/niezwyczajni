import Swiper from 'swiper';

const initSwiperOnBreakpoint = (
  selector,
  swiperConfig,
  breakpoint,
  callback = () => {},
) => {
  let swiper;
  const mediaQuery = window.matchMedia(breakpoint);

  const checker = () => {
    if (!mediaQuery.matches) {
      if (swiper) {
        swiper.destroy(true, true);
        swiper = null;
      }
      return;
    }

    // Destroy the previous instance before creating a new one
    if (swiper) {
      swiper.destroy(true, true);
      swiper = null;
    }

    swiper = new Swiper(selector, swiperConfig);
    if (callback) {
      callback(swiper);
    }
  };

  mediaQuery.addEventListener('change', checker);
  checker();
};

export default initSwiperOnBreakpoint;
