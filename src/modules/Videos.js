class Videos {
  selectors = {
    root: '.video',
    button: '.video__btn',
  };

  constructor() {
    document.addEventListener('click', this.onClick);
  }

  static getIframe(videoId, width) {
    const height = Math.round((width * 9) / 16);

    return `
      <iframe
        width="${width}"
        height="${height}"
        src="https://www.youtube.com/embed/${videoId}?autoplay=1"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
      </iframe>
    `;
  }

  onClick = (event) => {
    const button = event.target.closest(this.selectors.button);
    if (!button) return;

    const video = button.closest(this.selectors.root);
    const videoId = video?.dataset.youtubeId;
    if (!videoId) throw new Error('Video ID is missing');

    const width = button.offsetWidth || 360;

    button.remove();
    video.insertAdjacentHTML('afterbegin', Videos.getIframe(videoId, width));
  };
}

export default Videos;
