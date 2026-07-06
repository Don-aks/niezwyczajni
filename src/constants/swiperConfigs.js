import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

import changeSlideOnFocus from '@/modules/Swipers/plugins/focusSlidePlugin';
import changeCursorToGrab from '@/modules/Swipers/plugins/grabCursorPlugin';

const PREV_BTN = '.slider__btn--prev';
const NEXT_BTN = '.slider__btn--next';
const defaultPlugins = [changeSlideOnFocus, changeCursorToGrab];

/**
 * @typedef {Object} SwiperConfig
 *
 * // DOM binding
 * @property {string} selector - CSS selector for the Swiper container.
 *
 * // Swiper core config
 * @property {Object} swiperOptions - Native Swiper API configuration object.
 *
 * // Extensions
 * @property {Array<Function>} [plugins] - Array of plugin functions to extend the Swiper instance.
 *
 * // Behaviour
 * @property {boolean} [keyboardControl=true] - Whether to enable keyboard control.
 * @property {boolean} [multiple=false] - Whether to apply config to all matched elements or only the first one.
 */

export default [
  {
    selector: '.about-mission__slider',
    swiperOptions: {
      slidesPerView: 1,
      loop: true,
      allowTouchMove: false,
      autoHeight: true,
      navigation: {
        prevEl: `.about-mission__slider-navigation ${PREV_BTN}`,
        nextEl: `.about-mission__slider-navigation ${NEXT_BTN}`,
      },
      modules: [Navigation],
    },
    plugins: [changeSlideOnFocus],
  },

  {
    selector: '.about-mission__slides',
    swiperOptions: {
      slidesPerView: 4.5,
      spaceBetween: 60,
      loop: true,
      centeredSlides: true,
      touchEventsTarget: 'container',
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      modules: [Autoplay],
    },
    multiple: true,
    plugins: defaultPlugins,
  },

  {
    selector: '.mission__slider',
    swiperOptions: {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      pagination: {
        el: '.mission__slider-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 5000,
      },
      modules: [Pagination, Autoplay, EffectFade],
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
      },
    },
    plugins: defaultPlugins,
  },

  {
    selector: '.gallery-preview__slider',
    swiperOptions: {
      slidesPerView: 2,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        prevEl: `.gallery-preview__slider-navigation ${PREV_BTN}`,
        nextEl: `.gallery-preview__slider-navigation ${NEXT_BTN}`,
      },
      modules: [Navigation, Autoplay],
    },
    plugins: defaultPlugins,
  },
];
