import isScrolledToBottom from './_isScrolledToBottom';

const getCumulativeTransformMatrix = (element) => {
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
};

const getRectIgnoringTransform = (element) => {
  const rect = element.getBoundingClientRect();
  const matrix = getCumulativeTransformMatrix(element);
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
};

const isScrolledToElementIgnoringTransform = (
  element,
  offset = window.innerHeight / 2,
) => {
  const rect = getRectIgnoringTransform(element);
  return rect.top < window.innerHeight - offset || isScrolledToBottom();
};

export default isScrolledToElementIgnoringTransform;
