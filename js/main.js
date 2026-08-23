const menuButton=document.querySelector('.menu-toggle');const nav=document.querySelector('.nav');const menuPanel=document.querySelector('.menu-panel');const closeMenu=()=>{menuPanel?.classList.remove('is-open');menuButton?.classList.remove('is-open');menuButton?.setAttribute('aria-expanded','false');menuPanel?.setAttribute('aria-hidden','true');document.body.classList.remove('menu-visible')};menuButton?.addEventListener('click',()=>{const open=!menuPanel?.classList.contains('is-open');menuPanel?.classList.toggle('is-open',open);menuButton.classList.toggle('is-open',open);menuButton.setAttribute('aria-expanded',String(open));menuPanel?.setAttribute('aria-hidden',String(!open));document.body.classList.toggle('menu-visible',open)});menuPanel?.querySelectorAll('a').forEach(a=>a.addEventListener('click',closeMenu));document.addEventListener('keydown',event=>{if(event.key==='Escape')closeMenu()});document.querySelector('[data-open-search]')?.addEventListener('click',()=>{window.location.href='search.php'});
const clock=document.querySelector('.countdown');if(clock){const deadline=new Date(clock.dataset.deadline).getTime();const render=()=>{const remaining=Math.max(0,deadline-Date.now());const values={days:Math.floor(remaining/864e5),hours:Math.floor(remaining/36e5)%24,minutes:Math.floor(remaining/6e4)%60,seconds:Math.floor(remaining/1e3)%60};Object.entries(values).forEach(([key,value])=>{clock.querySelector(`[data-${key}]`).textContent=String(value).padStart(2,'0')})};render();setInterval(render,1000)}
const heroSlides=[...document.querySelectorAll('.hero-slide')],heroTitleTrack=document.querySelector('.hero-title-track');
let heroIndex=0;
const positionHeroTitle=()=>{
  if(!heroTitleTrack) return;
  const titleRow=heroTitleTrack.firstElementChild;
  // offsetHeight stays in layout pixels. getBoundingClientRect() is already
  // multiplied by the laptop canvas zoom and caused every slide to stop short.
  const titleHeight=titleRow?.offsetHeight||parseFloat(getComputedStyle(titleRow).height)||100;
  heroTitleTrack.style.transform=`translate3d(0,-${heroIndex*titleHeight}px,0)`;
};
if(heroSlides.length>1){
  setInterval(()=>{
    const previous=heroIndex;
    heroIndex=(heroIndex+1)%heroSlides.length;
    heroSlides[previous].classList.remove('active');
    heroSlides[previous].classList.add('past');
    heroSlides[heroIndex].classList.remove('past');
    heroSlides[heroIndex].classList.add('active');
    positionHeroTitle();
    setTimeout(()=>heroSlides[previous].classList.remove('past'),1100);
  },4500);
}

// The homepage artwork is authored on the original 1900px Figma canvas.
// Preserve that exact composition on laptops by scaling the canvas as one unit;
// internal storefront pages continue to use their native responsive layouts.
const fitHomeCanvas=()=>{
  const isHome=document.body.classList.contains('home-page');
  const shouldFit=isHome&&window.innerWidth>1024&&window.innerWidth<1900;
  const responsiveStylesheet=document.querySelector('link[href*="css/responsive.css"]');
  document.body.classList.toggle('desktop-fitted',shouldFit);
  document.body.style.zoom=shouldFit?String(window.innerWidth/1900):'';
  if(responsiveStylesheet) responsiveStylesheet.disabled=shouldFit;
  requestAnimationFrame(positionHeroTitle);
};
fitHomeCanvas();
window.addEventListener('resize',fitHomeCanvas);

const collectionsSection=document.querySelector('.collections');
if(collectionsSection){
  const collectionCards=[...collectionsSection.querySelectorAll('.collection-card')];
  const collectionBackgrounds=[...collectionsSection.querySelectorAll('[data-collection-bg]')];
  const showCollectionBackground=name=>{
    const available=collectionBackgrounds.some(image=>image.dataset.collectionBg===name);
    const selected=available?name:'default';
    collectionBackgrounds.forEach(image=>image.classList.toggle('is-active',image.dataset.collectionBg===selected));
  };
  collectionCards.forEach(card=>{
    const name=[...card.classList].find(className=>['rings','earrings','pendant','bracelet'].includes(className));
    card.addEventListener('mouseenter',()=>showCollectionBackground(name));
    card.addEventListener('focusin',()=>showCollectionBackground(name));
  });
  collectionsSection.addEventListener('mouseleave',()=>showCollectionBackground('default'));
  collectionsSection.addEventListener('focusout',event=>{if(!collectionsSection.contains(event.relatedTarget))showCollectionBackground('default')});
}

const caveScene=document.querySelector('.cave-scene');
if(caveScene){
  const caveToggle=caveScene.querySelector('.cave-toggle');
  const openCave=()=>caveScene.classList.add('is-revealed');
  const closeCave=()=>caveScene.classList.remove('is-revealed');
  caveScene.addEventListener('pointerenter',event=>{if(event.pointerType==='mouse')openCave()});
  caveScene.addEventListener('pointerleave',event=>{if(event.pointerType==='mouse')closeCave()});
  caveToggle?.addEventListener('click',event=>{event.stopPropagation();const revealed=caveScene.classList.toggle('is-revealed');caveToggle.setAttribute('aria-expanded',String(revealed));caveToggle.querySelector('span').textContent=revealed?'Tap To Close':'Tap To Reveal'});
}

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

const storyBanner=document.querySelector('.story-banner');
if(storyBanner){
  let storyLightFrame=null;
  let storyLightX=50;
  let storyLightY=50;
  storyBanner.addEventListener('pointermove',event=>{
    const bounds=storyBanner.getBoundingClientRect();
    storyLightX=((event.clientX-bounds.left)/bounds.width)*100;
    storyLightY=((event.clientY-bounds.top)/bounds.height)*100;
    if(storyLightFrame) return;
    storyLightFrame=requestAnimationFrame(()=>{
      storyBanner.style.setProperty('--story-light-x',`${storyLightX.toFixed(2)}%`);
      storyBanner.style.setProperty('--story-light-y',`${storyLightY.toFixed(2)}%`);
      storyLightFrame=null;
    });
  });
}

const newsletterForm=document.querySelector('.newsletter-form');
newsletterForm?.addEventListener('submit',event=>{
  event.preventDefault();
  const status=newsletterForm.parentElement.querySelector('.form-status');
  if(status) status.textContent='Thank you for joining Carat Street.';
  newsletterForm.reset();
});
