import Parallax from 'parallax-js';
import REDUCE_MEDIA from '@/constants/motionRecudeMedia';

const parallaxEls = document.querySelectorAll('.js-parallax');
const isMotionReduce = window.matchMedia(REDUCE_MEDIA).matches;

const setParallaxEffect = () => {
  if (isMotionReduce || !parallaxEls.length) return;

  parallaxEls.forEach((el) => {
    new Parallax(el);
  });
};

export default setParallaxEffect;
