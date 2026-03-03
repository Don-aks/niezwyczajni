const isScrolledToBottom = () => {
  const scrollBottom = Math.floor(window.scrollY + window.innerHeight);
  return scrollBottom === document.body.scrollHeight;
};

export default isScrolledToBottom;
