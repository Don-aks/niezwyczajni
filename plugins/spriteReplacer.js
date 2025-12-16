const spriteReplacer = () => {
  const spriteRegex = /spritemap\.[a-f0-9]+\.svg$/;
  const absolutePathToSpritemapRegex = /\/assets\/spritemap\.[a-f0-9]+\.svg/g;
  const spriteInHtmlRegex = /"\/__spritemap#([^"]+)"/g;

  let spritemapFilename = null;

  return {
    name: 'sprite-replacer',
    apply: 'build',

    generateBundle(_, bundle) {
      const files = Object.keys(bundle);
      spritemapFilename = files.find((f) => spriteRegex.test(f)) || '';
    },

    transformIndexHtml(html) {
      return html
        .replace(spriteInHtmlRegex, `"./${spritemapFilename}#$1"`)
        .replace(absolutePathToSpritemapRegex, `./${spritemapFilename}`);
    },
  };
};

export default spriteReplacer;
