import Swiper from 'swiper';
import { Keyboard } from 'swiper/modules';

import SWIPER_CONFIGS from '@/constants/swiperConfigs';

const hasKeyboardModule = (options) => options.modules?.includes(Keyboard);

const addKeyboardModule = (options) => {
  if (options.modules) {
    options.modules.push(Keyboard);
    return;
  }

  options.modules = [Keyboard];
};

const addKeyboardOptions = (options) => {
  options.keyboard = { enabled: true, pageUpDown: true };
};

class Swipers {
  #instances = new WeakMap();

  constructor() {
    SWIPER_CONFIGS.forEach(this.processConfig);
  }

  createInstance(element, { swiperOptions, config = {} }) {
    const instance = new Swiper(element, swiperOptions);
    this.#instances.set(element, instance);

    if (config.plugins) {
      config.plugins.forEach((plugin) => plugin(instance));
    }
  }

  processConfig = ({ selector, swiperOptions: baseOptions, ...config }) => {
    const elements = document.querySelectorAll(selector);
    if (elements.length === 0) return;

    const keyboardControl = config.keyboardControl ?? true;
    const swiperOptions = Swipers.generateOptions(baseOptions, keyboardControl);

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
      if (!hasKeyboardModule(options)) addKeyboardModule(options);
      if (!options.keyboard) addKeyboardOptions(options);
    }

    return options;
  }
}

export default Swipers;
