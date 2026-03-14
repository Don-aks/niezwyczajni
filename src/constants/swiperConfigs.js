import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

import changeSlideOnFocus from '@/modules/Swipers/plugins/focusSlidePlugin';
import changeCursorToGrab from '@/modules/Swipers/plugins/grabCursorPlugin';

const prevBtn = '.slider__btn--prev';
const nextBtn = '.slider__btn--next';
const defaultPlugins = [changeSlideOnFocus, changeCursorToGrab];

export default [
  {
    selector: '.about-mission__slider',
    options: {
      slidesPerView: 1,
      loop: true,
      allowTouchMove: false,
      autoHeight: true,
      navigation: {
        prevEl: `.about-mission__slider-navigation ${prevBtn}`,
        nextEl: `.about-mission__slider-navigation ${nextBtn}`,
      },
      modules: [Navigation],
    },
    plugins: [changeSlideOnFocus],
  },

  {
    selector: '.about-mission__slides',
    options: {
      slidesPerView: 4.5,
      spaceBetween: 60,
      loop: true,
      centeredSlides: true,
      touchEventsTarget: 'container',
      autoplay: {
        delay: 3000,
      },
      modules: [Autoplay],
    },
    multiple: true,
    plugins: defaultPlugins,
  },

  {
    selector: '.mission__slider',
    options: {
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
    options: {
      slidesPerView: 2,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        prevEl: `.gallery-preview__slider-navigation ${prevBtn}`,
        nextEl: `.gallery-preview__slider-navigation ${nextBtn}`,
      },
      modules: [Navigation, Autoplay],
    },
    plugins: defaultPlugins,
  },
];
