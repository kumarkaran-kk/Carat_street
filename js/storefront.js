document.addEventListener('DOMContentLoaded',()=>{
  const toggle=document.querySelector('[data-filter-toggle]');
  const drawer=document.querySelector('[data-filter-drawer]');
  toggle?.addEventListener('click',()=>{drawer.hidden=!drawer.hidden;toggle.querySelector('span').textContent=drawer.hidden?'+':'−'});
  drawer?.querySelectorAll('[data-sort]').forEach(button=>button.addEventListener('click',()=>{
    const grid=document.querySelector('[data-catalog-grid]');
    const cards=[...grid.querySelectorAll('.catalog-card')];
    if(button.dataset.sort!=='featured')cards.sort((a,b)=>button.dataset.sort==='low'?a.dataset.price-b.dataset.price:b.dataset.price-a.dataset.price);
    cards.forEach(card=>grid.append(card));
  }));
});
