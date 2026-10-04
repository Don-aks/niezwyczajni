const fixSpritemapDevPath = () => ({
  name: 'fix-spritemap-dev-path',
  apply: 'serve',

  transform(code, id) {
    if (!id.includes('.scss') && !id.includes('.css')) return null;

    const fixedCode = code.replace(
      /\/__spritemap/g,
      'http://localhost:5173/__spritemap',
    );

    return { code: fixedCode };
  },
});

export default fixSpritemapDevPath;
