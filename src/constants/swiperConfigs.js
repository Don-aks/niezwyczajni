import { Navigation, Pagination, Autoplay } from 'swiper/modules';

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
];
