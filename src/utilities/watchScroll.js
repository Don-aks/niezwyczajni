import debounce from './debounce';

// Provides to func a boolean indicating whether this is the initial load
const watchScroll = (func) => {
  window.addEventListener('load', () => func(true));
  window.addEventListener('scroll', debounce(func, 50, false));
  window.addEventListener('resize', () => debounce(func, 100, false));
};

export default watchScroll;
