import isScrolledToElement from './isScrolledToElement';

const forceReflow = (el) => el.offsetHeight;

const addClassesOnScroll = (
  el,
  hiddenClass,
  {
    visibleClass = null,
    isFirstCall = false,
    offsetY = window.innerHeight / 2,
  },
) => {
  if (isFirstCall) {
    el.style.transition = 'none';
    forceReflow(el);
  }

  if (visibleClass && el.classList.contains(visibleClass)) {
    el.classList.remove(visibleClass);
    forceReflow(el);
  }

  const isVisible = isScrolledToElement(el, offsetY);

  visibleClass && el.classList.toggle(visibleClass, isVisible);
  hiddenClass && el.classList.toggle(hiddenClass, !isVisible);

  if (isFirstCall) {
    requestAnimationFrame(() => {
      el.style.transition = '';
    });
  }
};

export default addClassesOnScroll;
