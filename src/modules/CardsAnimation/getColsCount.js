import breakpoints from '@/constants/breakpoints';

function getColsCount(width) {
  if (width < breakpoints.tablet) return 1;
  if (width < breakpoints.desktop) return 2;
  return 3;
}

export default getColsCount;
