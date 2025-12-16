import isScrolledToElement from './isScrolledToElement';

const addClassesOnScroll = (
  element,
  visibleClass,
  hiddenClass = null,
  isFirstCall = false,
  offsetY = window.innerHeight / 2,
) => {
  if (isFirstCall) {
    element.style.transition = 'none';
    element.offsetHeight; // forced reflow
  }

  if (element.classList.contains(visibleClass)) {
    element.classList.remove(visibleClass);
    element.offsetHeight; // forced reflow
  }

  const isScrolled = isScrolledToElement(element, offsetY);
  element.classList.toggle(visibleClass, isScrolled);

  if (hiddenClass) {
    element.classList.toggle(hiddenClass, !isScrolled);
  }

  if (isFirstCall) {
    // Restore transition after DOM is loaded
    requestAnimationFrame(() => {
      element.style.transition = '';
    });
  }
};

export default addClassesOnScroll;
