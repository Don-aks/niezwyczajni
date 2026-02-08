const selectors = `
  a[href],
  input:not([disabled]),
  select:not([disabled]),
  textarea:not([disabled]),
  button:not([disabled]),
  [tabindex]:not([tabindex="-1"])
`;

const isElementInteractive = (element) => {
  if (!element) return false;
  return element.closest(selectors) !== null;
};

export default isElementInteractive;
