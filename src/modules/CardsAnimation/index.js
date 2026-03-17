import debounce from '@/utilities/debounce';

import applyAnimation from './applyAnimation';
import getColsCount from './getColsCount';

function setTranslateValue(val) {
  return val === 0 ? '0' : `calc(${val} * var(--anim-translate))`;
}

class CardsAnimation {
  currentColsCount = 0;

  cardSelector = '.card';
  containerSelector = '.js-animation-card-container';

  constructor() {
    this.containers = document.querySelectorAll(this.containerSelector);

    window.addEventListener('resize', debounce(this.#applyCardAnimations, 150));
    this.#applyCardAnimations();
  }

  setupCardAnimation = (container) => {
    const cards = [...container.querySelectorAll(this.cardSelector)];
    const count = cards.length;
    const colsCount = getColsCount(window.innerWidth);

    cards.forEach((card, index) => {
      const { x, y } = applyAnimation({ count, index, colsCount });

      card.style.setProperty('--translate-x', setTranslateValue(x));
      card.style.setProperty('--translate-y', setTranslateValue(y));
    });
  };

  #applyCardAnimations = () => {
    this.containers.forEach(this.setupCardAnimation);
  };
}

export default CardsAnimation;
