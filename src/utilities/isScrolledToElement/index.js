import isScrolledToBottom from './_isScrolledToBottom';

export const isScrolledToElement = (
  element,
  offset = window.innerHeight / 2,
) => {
  const viewportThreshold = window.innerHeight - offset;
  const { top } = element.getBoundingClientRect();

  return top < viewportThreshold || isScrolledToBottom();
};
