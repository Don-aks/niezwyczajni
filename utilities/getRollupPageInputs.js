import { readdirSync, statSync } from 'node:fs';
import path from 'node:path';

const getRollupPageInputs = (pagesPath) => {
  const dirPath = path.resolve(process.cwd(), pagesPath);
  const entries = readdirSync(dirPath, { withFileTypes: true });

  return entries.reduce((acc, entry) => {
    if (!entry.isDirectory()) return acc;

    const pageName = entry.name;

    const jsFilePath = path.join(dirPath, pageName, `${pageName}.js`);

    // check if the directory contains a js file
    try {
      if (statSync(jsFilePath).isFile()) {
        acc[pageName] = jsFilePath;
      }
    } catch (e) {
      // ignore if the file does not exist
    }

    return acc;
  }, {});
};

export default getRollupPageInputs;
