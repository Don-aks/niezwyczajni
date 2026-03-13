function calculateColRow({ cols, count, index }) {
  const row = Math.floor(index / cols);
  const itemsInRow = Math.min(cols, count - row * cols);

  // offset for centering, like justify-content: center
  const offset = (cols - itemsInRow) / 2;

  const col = (index % cols) + offset;

  return { col, row };
}

function applyAnimation({ count, index, colsCount }) {
  const cols = colsCount;
  const rows = Math.ceil(count / cols);

  const { col, row } = calculateColRow({ cols, count, index });

  const centerX = (cols - 1) / 2;

  let x = 0;
  let y = 0;

  const lastRow = rows - 1;
  if (col < centerX) x = -1;
  else if (col > centerX) x = 1;
  else if (row === 0) y = -1;
  else if (row === lastRow) y = 1;

  return { x, y };
}

export default applyAnimation;
