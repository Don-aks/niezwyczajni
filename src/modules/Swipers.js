import Swiper from 'swiper';

import getDefaultSwiperConfig from '@/utilities/getDefaultSwiperConfig';
import SWIPER_CONFIGS from '@/constants/swiperConfigs';

class Swipers {
  elements = [];

  constructor() {
    SWIPER_CONFIGS.forEach((config) => {
      const {
        selector,
        options,
        useDefaultConfig = true,
        multiple = false,
      } = config;

      const elements = document.querySelectorAll(selector);
      if (elements.length === 0) return;

      const updatedOptions = Swipers.generateOptions(options, useDefaultConfig);

      if (multiple) {
        elements.forEach((el) => {
          this.createInstance(el, updatedOptions);
        });
        return;
      }

      this.createInstance(elements[0], updatedOptions);
    });
  }

  createInstance(element, options) {
    this.elements.push(new Swiper(element, options));
  }

  static generateOptions(options, useDefault) {
    return {
      ...(useDefault ? getDefaultSwiperConfig() : {}),
      ...options,
    };
  }
}

export default Swipers;
