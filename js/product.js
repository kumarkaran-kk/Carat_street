document.addEventListener('DOMContentLoaded', () => {
  const stage = document.querySelector('.pdp-main-image');
  const mainImage = document.querySelector('[data-main-product-image]');
  const caption = document.querySelector('.pdp-image-caption');
  const thumbs = [...document.querySelectorAll('.pdp-thumb')];

  thumbs.forEach((thumb) => thumb.addEventListener('click', () => {
    thumbs.forEach((item) => item.classList.remove('is-active'));
    thumb.classList.add('is-active');
    if (!mainImage) return;

    mainImage.src = thumb.dataset.image;
    mainImage.dataset.view = thumb.dataset.view;
    mainImage.alt = thumb.getAttribute('aria-label') || '';
    if (caption) {
      const captions = {editorial: 'Styled view', report: 'Jewellery report', product: 'Product view'};
      caption.textContent = captions[thumb.dataset.view] || 'Product view';
    }
  }));

  document.querySelector('.pdp-fullscreen')?.addEventListener('click', () => {
    if (document.fullscreenElement) document.exitFullscreen?.();
    else stage?.requestFullscreen?.();
  });

  const revealItems = [...document.querySelectorAll('.pdp-reveal')];
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.body.classList.add('pdp-motion-ready');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    }, {threshold: .08, rootMargin: '0px 0px -7%'});
    revealItems.forEach((item) => observer.observe(item));
  }
});
