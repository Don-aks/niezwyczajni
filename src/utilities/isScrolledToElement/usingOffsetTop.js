import isScrolledToBottom from './_isScrolledToBottom';

export const isScrolledToElementUsingOffsetTop = (
  element,
  offset = window.innerHeight / 2,
) => {
  const { offsetTop } = element;
  const scrollY = window.scrollY + offset;

  return offsetTop < scrollY || isScrolledToBottom();
};
