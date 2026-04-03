import debounce from '@/utilities/debounce';
import isPageScrolledToBottom from '@/utilities/isPageScrolledToBottom';

class ScrollAnimator {
  IOConfig;
  elements;

  #documentClassName = 'js-scroll-animation-init';
  #childSelector = '[data-animate-item]';
  #selector = '[data-animate-on-scroll]';
  #visibleClass = 'visible';
  #hiddenClass = 'hidden';

  #isFirstIntersection = true;
  #lastScrollY = window.scrollY;
  #onResizeDebounced;
  #observer;

  constructor(IOConfig = { rootMargin: '0px 0px -50%' }) {
    this.IOConfig = IOConfig;
    this.elements = [...document.querySelectorAll(this.#selector)];
    this.#initGroupSizes();

    this.#initObserver();
    this.#onResizeDebounced = debounce(this.#onResize, 200);
    window.addEventListener('resize', this.#onResizeDebounced);
    document.addEventListener('focusin', this.#onFocus);
  }

  // --- IntersectionObserver callback ---
  onIntersection = (entries) => {
    this.#updateScrollDirection();

    const scrolledToBottom = isPageScrolledToBottom();

    entries.forEach(({ target, isIntersecting, boundingClientRect }) => {
      const isFocusedInside = target.contains(document.activeElement);
      const shouldShow = isIntersecting || isFocusedInside || scrolledToBottom;

      if (shouldShow) {
        this.showElement(target);

        if (target.hasAttribute('data-animate-once')) {
          this.excludeElement(target);
        }

        this.#hideAfterAnimationIfNeeded(target);
        return;
      }

      // Hide only if the element is not above viewport
      if (boundingClientRect.bottom >= 0) {
        this.hideElement(target);
      }
    });

    requestAnimationFrame(() =>
      requestAnimationFrame(() => this.#handleFirstIntersection()),
    );
  };

  // --- Show / Hide ---
  showElement(element) {
    element.classList.add(this.#visibleClass);
    element.classList.remove(this.#hiddenClass);
  }

  hideElement(element) {
    element.classList.add(this.#hiddenClass);
    element.classList.remove(this.#visibleClass);
  }

  // --- Utilities ---
  #hideAfterAnimationIfNeeded(element) {
    const duration = Number(element.dataset.animateDuration);
    if (!Number.isFinite(duration) || duration <= 0) return;

    setTimeout(() => this.hideElement(element), duration);
  }

  #initGroupSizes() {
    this.elements.forEach((group) => {
      const childrenCount = group.querySelectorAll(this.#childSelector).length;
      if (!childrenCount) return;

      group.style.setProperty('--total', childrenCount);
    });
  }

  #updateScrollDirection() {
    const isScrollingUp = window.scrollY < this.#lastScrollY;
    document.documentElement.classList.toggle('scrolling-up', isScrollingUp);
    this.#lastScrollY = window.scrollY;
  }

  #handleFirstIntersection() {
    if (!this.#isFirstIntersection) return;

    document.documentElement.classList.remove(this.#documentClassName);
    this.#isFirstIntersection = false;
  }

  #initObserver() {
    this.#observer = new IntersectionObserver(
      this.onIntersection,
      this.IOConfig,
    );
    this.elements.forEach((el) => this.#observer.observe(el));
  }

  #onResize = () => {
    this.#observer.disconnect();
    this.#initObserver();
  };

  #onFocus = ({ target }) => {
    this.elements.forEach((element) => {
      const isFocusedInside = element.contains(target);
      if (!isFocusedInside) return;

      this.showElement(element);
    });
  };

  // --- Public API ---
  excludeElement(element) {
    this.#observer.unobserve(element);
    this.elements = this.elements.filter((el) => el !== element);
  }

  destroy() {
    this.#observer.disconnect();
    window.removeEventListener('resize', this.#onResizeDebounced);
    document.removeEventListener('focusin', this.#onFocus);
  }
}

export default ScrollAnimator;
