const menuButton = document.querySelector('.menu-toggle');
const menuPanel = document.querySelector('.menu-panel');

const closeMenu = () => {
  menuPanel?.classList.remove('is-open');
  menuButton?.classList.remove('is-open');
  menuButton?.setAttribute('aria-expanded', 'false');
  menuPanel?.setAttribute('aria-hidden', 'true');
  document.body.classList.remove('menu-visible');
};

menuButton?.addEventListener('click', () => {
  const open = !menuPanel?.classList.contains('is-open');
  menuPanel?.classList.toggle('is-open', open);
  menuButton.classList.toggle('is-open', open);
  menuButton.setAttribute('aria-expanded', String(open));
  menuPanel?.setAttribute('aria-hidden', String(!open));
  document.body.classList.toggle('menu-visible', open);
});

menuPanel?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
document.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') closeMenu();
});
document.querySelector('[data-open-search]')?.addEventListener('click', () => {
  window.location.href = 'search.php';
});

const siteHeader = document.querySelector('.site-header');
const updateStickyHeader = () => siteHeader?.classList.toggle('is-scrolled', window.scrollY > 8);
updateStickyHeader();
window.addEventListener('scroll', updateStickyHeader, {passive: true});

const heroSlides=[...document.querySelectorAll('.hero-slide')];
let heroIndex=0;
if(heroSlides.length>1){
  setInterval(()=>{
    const previous=heroIndex;
    heroIndex=(heroIndex+1)%heroSlides.length;
    heroSlides[previous].classList.remove('active');
    heroSlides[previous].classList.add('past');
    heroSlides[heroIndex].classList.remove('past');
    heroSlides[heroIndex].classList.add('active');
    setTimeout(()=>heroSlides[previous].classList.remove('past'),1100);
  },4500);
}

const fitHomeCanvas=()=>{
  const isHome=document.body.classList.contains('home-page');
  const shouldFit=isHome&&window.innerWidth>1024&&window.innerWidth<1900;
  const canvasScale=shouldFit?window.innerWidth/1900:1;
  const responsiveStylesheet=document.querySelector('link[href*="css/responsive.css"]');
  const sharedFooter=isHome?document.querySelector('body > footer'):null;
  document.body.classList.toggle('desktop-fitted',shouldFit);
  document.body.style.zoom=shouldFit?String(canvasScale):'';
  document.body.style.setProperty('--cave-full-height',shouldFit?`${window.innerHeight/canvasScale}px`:'100vh');
  if(sharedFooter){
    sharedFooter.style.zoom=shouldFit?String(1/canvasScale):'';
    sharedFooter.style.width=shouldFit?`${window.innerWidth}px`:'';
  }
  if(responsiveStylesheet) responsiveStylesheet.disabled=shouldFit;
};
fitHomeCanvas();
window.addEventListener('resize',fitHomeCanvas);

const collectionsSection=document.querySelector('.collections');
if(collectionsSection){
  const collectionCards=[...collectionsSection.querySelectorAll('.collection-card')];
  const collectionBackgrounds=[...collectionsSection.querySelectorAll('[data-collection-bg]')];
  const collectionViewport=collectionsSection.querySelector('[data-collection-viewport]');
  const collectionTrack=collectionsSection.querySelector('.collection-carousel-track');
  const collectionPrevious=collectionsSection.querySelector('[data-collection-prev]');
  const collectionNext=collectionsSection.querySelector('[data-collection-next]');
  const collectionCurrent=collectionsSection.querySelector('[data-collection-current]');
  let collectionFrame=null;
  const showCollectionBackground=name=>{
    const available=collectionBackgrounds.some(image=>image.dataset.collectionBg===name);
    const selected=available?name:'default';
    collectionBackgrounds.forEach(image=>image.classList.toggle('is-active',image.dataset.collectionBg===selected));
  };
  const collectionName=card=>[...card.classList].find(className=>['rings','earrings','pendant','bracelet'].includes(className));
  const collectionStep=()=>{
    if(!collectionCards.length||!collectionTrack) return 0;
    return collectionCards[0].getBoundingClientRect().width+(parseFloat(getComputedStyle(collectionTrack).columnGap)||0);
  };
  const updateCollectionCarousel=()=>{
    if(!collectionViewport||!collectionCards.length) return;
    const step=collectionStep();
    const atEnd=collectionViewport.scrollLeft+collectionViewport.clientWidth>=collectionViewport.scrollWidth-2;
    let current=step?Math.round(collectionViewport.scrollLeft/step):0;
    if(atEnd) current=collectionCards.length-1;
    current=Math.max(0,Math.min(collectionCards.length-1,current));
    if(collectionCurrent) collectionCurrent.textContent=String(current+1).padStart(2,'0');
    if(collectionPrevious) collectionPrevious.disabled=current===0;
    if(collectionNext) collectionNext.disabled=atEnd;
    if(window.matchMedia('(max-width: 600px)').matches) showCollectionBackground(collectionName(collectionCards[current]));
    collectionFrame=null;
  };
  const moveCollectionCarousel=direction=>collectionViewport?.scrollBy({left:direction*collectionStep(),behavior:'smooth'});
  collectionCards.forEach(card=>{
    const name=collectionName(card);
    card.addEventListener('mouseenter',()=>showCollectionBackground(name));
    card.addEventListener('focusin',()=>showCollectionBackground(name));
  });
  collectionsSection.addEventListener('mouseleave',()=>showCollectionBackground('default'));
  collectionsSection.addEventListener('focusout',event=>{if(!collectionsSection.contains(event.relatedTarget))showCollectionBackground('default')});
  collectionPrevious?.addEventListener('click',()=>moveCollectionCarousel(-1));
  collectionNext?.addEventListener('click',()=>moveCollectionCarousel(1));
  collectionViewport?.addEventListener('keydown',event=>{
    if(event.key==='ArrowLeft'||event.key==='ArrowRight'){
      event.preventDefault();
      moveCollectionCarousel(event.key==='ArrowLeft'?-1:1);
    }
  });
  collectionViewport?.addEventListener('scroll',()=>{
    if(!collectionFrame) collectionFrame=requestAnimationFrame(updateCollectionCarousel);
  },{passive:true});
  window.addEventListener('resize',updateCollectionCarousel,{passive:true});
  updateCollectionCarousel();
}

const caveScene=document.querySelector('.cave-scene');
if(caveScene){
  const caveToggle=caveScene.querySelector('.cave-toggle');
  let caveStageTimer=null;
  const setCaveButton=(expanded,label)=>{caveToggle?.setAttribute('aria-expanded',String(expanded));const text=caveToggle?.querySelector('span');if(text)text.textContent=label};
  const openCave=()=>{
    clearTimeout(caveStageTimer);
    caveScene.classList.remove('is-revealed');
    caveScene.classList.add('is-mid');
    setCaveButton(true,'Opening');
    caveStageTimer=setTimeout(()=>{
      caveScene.classList.add('is-revealed');
      setCaveButton(true,'Tap To Close');
    },300);
  };
  const closeCave=()=>{
    clearTimeout(caveStageTimer);
    caveScene.classList.remove('is-mid','is-revealed');
    setCaveButton(false,'Tap To Reveal');
  };
  caveScene.addEventListener('pointerenter',event=>{if(event.pointerType==='mouse')openCave()});
  caveScene.addEventListener('pointerleave',event=>{if(event.pointerType==='mouse')closeCave()});
  caveToggle?.addEventListener('click',event=>{event.stopPropagation();if(caveScene.classList.contains('is-mid')||caveScene.classList.contains('is-revealed'))closeCave();else openCave()});
}

const storyVideoButton=document.querySelector('[data-story-video]');
storyVideoButton?.addEventListener('click',()=>{
  const videoCard=storyVideoButton.closest('.video-card');
  const videoId=storyVideoButton.dataset.storyVideo;
  if(!videoCard||!videoId) return;
  const player=document.createElement('iframe');
  player.src=`https://www.youtube-nocookie.com/embed/${encodeURIComponent(videoId)}?autoplay=1&rel=0&playsinline=1`;
  player.title='Carat Street jewellery video';
  player.allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
  player.allowFullscreen=true;
  player.referrerPolicy='strict-origin-when-cross-origin';
  videoCard.classList.add('is-playing');
  videoCard.append(player);
  storyVideoButton.remove();
});

const goldDish=document.querySelector('.gold-dish');
const orbitText=goldDish?.querySelector('.orbit-text');
if(goldDish&&orbitText){
  let currentAngle=0;
  let targetAngle=0;
  let lastX=null;
  let lastY=null;
  let animationFrame=null;
  const renderOrbit=()=>{
    currentAngle+=(targetAngle-currentAngle)*.13;
    orbitText.style.setProperty('--orbit-angle',`${currentAngle.toFixed(3)}deg`);
    if(Math.abs(targetAngle-currentAngle)>.02) animationFrame=requestAnimationFrame(renderOrbit);
    else animationFrame=null;
  };
  const moveOrbit=event=>{
    if(lastX!==null){
      targetAngle+=(event.clientX-lastX)*.62+(event.clientY-lastY)*.18;
      if(!animationFrame) animationFrame=requestAnimationFrame(renderOrbit);
    }
    lastX=event.clientX;
    lastY=event.clientY;
  };
  goldDish.addEventListener('pointerenter',event=>{lastX=event.clientX;lastY=event.clientY});
  goldDish.addEventListener('pointermove',moveOrbit);
  goldDish.addEventListener('pointerleave',()=>{lastX=null;lastY=null});
}

const newsletterForm=document.querySelector('.newsletter-form');
newsletterForm?.addEventListener('submit',event=>{
  event.preventDefault();
  const status=newsletterForm.parentElement.querySelector('.form-status');
  if(status) status.textContent='Thank you for joining Carat Street.';
  newsletterForm.reset();
});

const homeProductCarousel=document.querySelector('[data-home-product-carousel]');
if(homeProductCarousel){
  const viewport=homeProductCarousel.querySelector('[data-home-product-viewport]');
  const cards=[...homeProductCarousel.querySelectorAll('.home-product-card')];
  const previousButton=homeProductCarousel.querySelector('[data-home-product-prev]');
  const nextButton=homeProductCarousel.querySelector('[data-home-product-next]');
  const currentLabel=homeProductCarousel.querySelector('[data-home-product-current]');
  let carouselFrame=null;
  const cardStep=()=>{
    if(!cards.length) return 0;
    const styles=getComputedStyle(homeProductCarousel.querySelector('.home-product-grid'));
    return cards[0].getBoundingClientRect().width+(parseFloat(styles.columnGap)||0);
  };
  const updateCarousel=()=>{
    const maximum=Math.max(0,viewport.scrollWidth-viewport.clientWidth);
    const atStart=viewport.scrollLeft<=2;
    const atEnd=viewport.scrollLeft>=maximum-2;
    previousButton.disabled=atStart;
    nextButton.disabled=atEnd;
    const step=cardStep();
    let current=step?Math.round(viewport.scrollLeft/step)+1:1;
    if(atEnd) current=cards.length;
    if(currentLabel) currentLabel.textContent=String(Math.min(cards.length,current)).padStart(2,'0');
    carouselFrame=null;
  };
  const moveCarousel=direction=>viewport.scrollBy({left:direction*cardStep(),behavior:'smooth'});
  previousButton?.addEventListener('click',()=>moveCarousel(-1));
  nextButton?.addEventListener('click',()=>moveCarousel(1));
  viewport?.addEventListener('keydown',event=>{
    if(event.key==='ArrowLeft'||event.key==='ArrowRight'){
      event.preventDefault();
      moveCarousel(event.key==='ArrowLeft'?-1:1);
    }
  });
  viewport?.addEventListener('scroll',()=>{
    if(!carouselFrame) carouselFrame=requestAnimationFrame(updateCarousel);
  },{passive:true});
  window.addEventListener('resize',updateCarousel,{passive:true});
  updateCarousel();
}
