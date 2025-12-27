export default {
  plugins: {
    autoprefixer: { grid: true },
    pxtoRem: {
      rootValue: 16,
      unitPrecision: 5,
      propList: ['*'],
      selectorBlackList: [],
      replace: true,
      mediaQuery: true,
      minPixelValue: 0,
    },
  },
  syntax: 'postcss-scss',
  map: true,
};
