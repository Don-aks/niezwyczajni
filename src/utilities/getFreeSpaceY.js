const getFreeSpaceY = (element) => {
  const containerHeight = element.clientHeight;
  const children = Array.from(element.children);

  const totalChildrenHeight = children.reduce((sum, el) => {
    const style = getComputedStyle(el);
    const marginTop = parseFloat(style.marginTop);
    const marginBottom = parseFloat(style.marginBottom);
    return sum + el.offsetHeight + marginTop + marginBottom;
  }, 0);

  const freeSpace = containerHeight - totalChildrenHeight;
  return freeSpace > 0 ? freeSpace : 0;
};

export default getFreeSpaceY;
