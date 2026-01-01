class isScrolledToElement {
  constructor(element, offset = window.innerHeight / 2) {
    this.element = element;
    this.offset = offset;
  }

  check() {
    const viewportThreshold = window.innerHeight - this.offset;
    const { top } = this.element.getBoundingClientRect();
    return top < viewportThreshold || this.#isScrolledToBottom();
  }

  checkUsingOffsetTop() {
    const { offsetTop } = this.element;
    const scrollY = window.scrollY + this.offset;
    return offsetTop < scrollY || this.#isScrolledToBottom();
  }

  checkIgnoringTransform() {
    const rect = this.#getRectIgnoringTransform(this.element);
    const isScrolled = rect.top < window.innerHeight - this.offset;
    return isScrolled || this.#isScrolledToBottom();
  }

  #getCumulativeTransformMatrix(element) {
    let node = element;
    let cumulative = new DOMMatrix();

    while (node && node.nodeType === 1) {
      const { transform } = window.getComputedStyle(node);
      if (transform && transform !== 'none') {
        try {
          cumulative = new DOMMatrix(transform).multiply(cumulative);
        } catch {
          // Ignoring erroneous matrices
        }
      }
      node = node.parentElement;
    }

    return cumulative;
  }

  #getRectIgnoringTransform(element) {
    const rect = element.getBoundingClientRect();
    const matrix = this.#getCumulativeTransformMatrix(element);
    if (matrix.isIdentity) return rect;

    let inv;
    try {
      inv = matrix.inverse();
    } catch {
      return rect;
    }

    const points = [
      new DOMPoint(rect.left, rect.top),
      new DOMPoint(rect.right, rect.top),
      new DOMPoint(rect.right, rect.bottom),
      new DOMPoint(rect.left, rect.bottom),
    ].map((p) => p.matrixTransform(inv));

    const xs = points.map((p) => p.x);
    const ys = points.map((p) => p.y);

    return {
      left: Math.min(...xs),
      right: Math.max(...xs),
      top: Math.min(...ys),
      bottom: Math.max(...ys),
      width: Math.max(...xs) - Math.min(...xs),
      height: Math.max(...ys) - Math.min(...ys),
    };
  }

  #isScrolledToBottom() {
    const scrollBottom = Math.floor(window.scrollY + window.innerHeight);
    return scrollBottom === document.body.scrollHeight;
  }
}

export default isScrolledToElement;
