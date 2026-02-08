import Swiper from 'swiper';
import { Keyboard } from 'swiper/modules';

import getDefaultSwiperConfig from '@/utilities/getDefaultSwiperConfig';
import SWIPER_CONFIGS from '@/constants/swiperConfigs';

const hasModuleKeyboard = (options) =>
  Array.isArray(options.modules) && options.modules.includes(Keyboard);

class Swipers {
  instances = [];

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
    this.instances.push(new Swiper(element, options));
  }

  static generateOptions(options, useDefault) {
    if (useDefault && !hasModuleKeyboard(options)) {
      options.modules.push(Keyboard);
    }

    return {
      ...(useDefault ? getDefaultSwiperConfig() : {}),
      ...options,
    };
  }
}

export default Swipers;
