import Swiper from 'swiper';
import { Keyboard } from 'swiper/modules';

import SWIPER_CONFIGS from '@/constants/swiperConfigs';

const hasKeyboardModule = (options) => options.modules?.includes(Keyboard);

class Swipers {
  instances = [];

  constructor() {
    SWIPER_CONFIGS.forEach(this.#processConfig);
  }

  createInstance(element, { swiperOptions, config = {} }) {
    const instance = new Swiper(element, swiperOptions);
    this.instances.push(instance);

    if (config.plugins) {
      config.plugins.forEach((plugin) => plugin(instance));
    }
  }

  #processConfig = ({ selector, options, ...config }) => {
    const elements = document.querySelectorAll(selector);
    if (elements.length === 0) return;

    const keyboardControl = config.keyboardControl ?? true;
    const swiperOptions = Swipers.generateOptions(options, keyboardControl);

    if (config.multiple) {
      elements.forEach((el) => {
        this.createInstance(el, { swiperOptions, config });
      });
      return;
    }

    this.createInstance(elements[0], { swiperOptions, config });
  };

  static generateOptions(incomingOptions, keyboardControl) {
    const options = { ...incomingOptions };

    if (keyboardControl) {
      if (!hasKeyboardModule(options)) {
        if (!Array.isArray(options.modules)) {
          options.modules = [];
        }

        options.modules.push(Keyboard);
      }

      if (!options.keyboard) {
        options.keyboard = { enabled: true, pageUpDown: true };
      }
    }

    return options;
  }
}

export default Swipers;
