document.addEventListener('DOMContentLoaded', () => {
  const mainImage = document.querySelector('[data-main-product-image]');
  document.querySelectorAll('.pdp-thumb').forEach((thumb) => thumb.addEventListener('click', () => {
    document.querySelectorAll('.pdp-thumb').forEach((item) => item.classList.remove('is-active'));
    thumb.classList.add('is-active');
    if (mainImage) mainImage.className = `product-crop angle-${thumb.dataset.angle}`;
  }));

  const quantity = document.querySelector('[data-quantity]');
  document.querySelector('[data-qty-minus]')?.addEventListener('click', () => { quantity.value = Math.max(1, Number(quantity.value) - 1); quantity.textContent = quantity.value; });
  document.querySelector('[data-qty-plus]')?.addEventListener('click', () => { quantity.value = Number(quantity.value) + 1; quantity.textContent = quantity.value; });

  document.querySelector('[data-read-more]')?.addEventListener('click', (event) => {
    const more = document.querySelector('.pdp-more');
    more.hidden = !more.hidden;
    event.currentTarget.textContent = more.hidden ? 'Read More' : 'Read Less';
  });
});
