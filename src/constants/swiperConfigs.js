import { Navigation, Pagination, Autoplay } from 'swiper/modules';

const prevBtn = '.slider__btn--prev';
const nextBtn = '.slider__btn--next';

export default [
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
      modules: [Pagination, Autoplay],
    },
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
  },
];
