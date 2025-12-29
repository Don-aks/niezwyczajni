class Videos {
  selector = '.video';
  hiddenClass = 'hidden';

  constructor() {
    this.elements = document.querySelectorAll(this.selector);
    this.bindEvents();
  }

  bindEvents() {
    this.elements.forEach((element) => {
      element.addEventListener('click', this.onClick);
    });
  }

  getIframeHtml(videoId, width, height) {
    return `
      <iframe
        width="${width}"
        height="${height}"
        src="https://www.youtube.com/embed/${videoId}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    `;
  }

  onClick = (event) => {
    const element = event.target.closest(this.selector);
    if (!element) return;

    const videoId = element.dataset.youtubeId;
    if (!videoId) throw new Error('`data-youtube-id` is missing');

    const elWidth = Math.round(parseInt(getComputedStyle(element).width));
    const width = elWidth ?? 360;
    const height = Math.round((width * 9) / 16);

    element.innerHTML = this.getIframeHtml(videoId, width, height);
  };
}

export default Videos;
