const debounce = (func, delay, ...params) => {
  let timer;
  return (event) => {
    if (timer) clearTimeout(timer);
    timer = setTimeout(() => func(...params), delay, event);
  };
};

export default debounce;
