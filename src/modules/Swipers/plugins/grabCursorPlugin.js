import isElementInteractive from '@/utilities/isElementInteractive';

function setCursorState(swiperEl, isGrabbing) {
  if (!swiperEl) return;
  const cursor = isGrabbing ? 'grabbing' : 'grab';

  swiperEl.style.cursor = cursor;
  document.documentElement.style.cursor = isGrabbing ? 'grabbing' : '';
  swiperEl.style.pointerEvents = isGrabbing ? 'none' : '';
}

function changeCursorToGrab(swiper) {
  swiper.el.style.cursor = 'grab';

  swiper.on('touchStart', ({ target }) => {
    if (isElementInteractive(target)) return;
    setCursorState(swiper.el, true);
  });

  swiper.on('touchEnd', () => {
    setCursorState(swiper.el, false);
  });
}

export default changeCursorToGrab;
