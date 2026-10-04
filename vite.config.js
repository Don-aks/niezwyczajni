import { fileURLToPath } from 'node:url';

import vitePugPlugin from 'vite-plugin-pug-transformer';
import { vitePluginWebp } from 'vite-plugin-to-webp';
import { ViteImageOptimizer } from 'vite-plugin-image-optimizer';
import VitePluginSvgSpritemap from '@spiriit/vite-plugin-svg-spritemap';

import optimizeSvgSources from './plugins/optimizeSvgSources';
import fixSpritemapDevPath from './plugins/fixSpritemapDevPath';
import getRollupPageInputs from './utilities/getRollupPageInputs';

const localhost = 'http://localhost:5173';
const isProd = process.env.NODE_ENV === 'production';

export default {
  base: isProd ? '/wp-content/themes/zwyczajnieniezwyczajni/dist/' : localhost,

  resolve: { alias: { '@': fileURLToPath(new URL('./src', import.meta.url)) } },

  css: {
    preprocessorOptions: {
      scss: {
        additionalData: "@use '@/styles/helpers' as *;",
      },
    },
    devSourcemap: true,
  },

  server: {
    origin: localhost,
    cors: true,
    host: true,
    port: 5173,
  },

  build: {
    manifest: true,
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: fileURLToPath(new URL('./src/main.js', import.meta.url)),
        ...getRollupPageInputs('./src/pages'),
      },
    },
  },

  plugins: [
    vitePugPlugin({ pugOptions: { basedir: './src' } }),

    VitePluginSvgSpritemap(['src/assets/icons/**/*.svg'], {
      prefix: '',
      svgo: false,
      styles: false,
      injectSvgOnDev: true,
    }),

    fixSpritemapDevPath(),

    vitePluginWebp({ cwd: ['src/assets/images'] }),
    ViteImageOptimizer({
      include: ['src/assets/images/**/*.webp'],
      webp: {
        effort: 6,
        quality: 80,
        lossless: true,
        alphaQuality: 80,
        nearLossless: true,
      },
    }),

    optimizeSvgSources(),
  ],
};
