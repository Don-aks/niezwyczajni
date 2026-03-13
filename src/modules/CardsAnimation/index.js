import breakpoints from '@/constants/breakpoints';
import applyAnimation from './applyAnimation';

function setTranslateValue(val) {
  return val === 0 ? '0' : `calc(${val} * var(--anim-translate))`;
}

class CardsAnimation {
  cardSelector = '.card';
  containerSelector = '.js-animation-card-container';

  #breakpoints = {};

  constructor() {
    this.containers = document.querySelectorAll(this.containerSelector);

    this.#initBreakpoints();
    this.#applyCardAnimations();
  }

  setupCardAnimation = (container) => {
    const cards = [...container.querySelectorAll(this.cardSelector)];
    const count = cards.length;

    cards.forEach((card, index) => {
      const colsCount = 3;

      const { x, y } = applyAnimation({ count, index, colsCount });
      card.style.setProperty('--translate-x', setTranslateValue(x));
      card.style.setProperty('--translate-y', setTranslateValue(y));
    });
  };

  #initBreakpoints() {
    Object.entries(breakpoints).forEach(([name, size]) => {
      this.#breakpoints[name] = window.matchMedia(`(max-width: ${size - 1}px)`);
      this.#breakpoints[name].addEventListener(
        'change',
        this.#applyCardAnimations,
      );
    });
  }

  #applyCardAnimations = () => {
    this.containers.forEach(this.setupCardAnimation);
  };
}

export default CardsAnimation;
