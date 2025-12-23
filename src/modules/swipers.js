import Swiper from 'swiper';

import getDefaultSwiperConfig from '@/utilities/getDefaultSwiperConfig';
import SWIPER_CONFIGS from '@/constants/swiperConfigs';

class Swipers {
  elements = [];

  constructor() {
    SWIPER_CONFIGS.forEach(({ selector, options }) => {
      const element = document.querySelector(selector);
      if (!element) return;

      this.elements.push(
        new Swiper(element, { ...getDefaultSwiperConfig(), ...options }),
      );
    });
  }
}

export default Swipers;
