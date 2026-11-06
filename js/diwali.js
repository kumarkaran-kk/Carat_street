document.addEventListener('DOMContentLoaded', () => {
  const welcome = document.querySelector('[data-diwali-welcome]');
  const enterButton = welcome?.querySelector('[data-diwali-enter]');
  const canvas = welcome?.querySelector('[data-diwali-fireworks]');
  if (!welcome || !enterButton || !canvas) return;

  const previewRequested = new URLSearchParams(window.location.search).get('diwali') === '1';
  const storageKey = 'caratStreetDiwaliSeen';
  let alreadySeen = false;
  try {
    alreadySeen = sessionStorage.getItem(storageKey) === '1';
  } catch (_) {
    alreadySeen = false;
  }

  if (alreadySeen && !previewRequested) return;

  welcome.hidden = false;
  document.body.classList.add('diwali-welcome-open');
  enterButton.focus({preventScroll: true});
  try {
    sessionStorage.setItem(storageKey, '1');
  } catch (_) {
    // The welcome still works when storage is unavailable.
  }

  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const context = canvas.getContext('2d');
  const colours = ['#f7d98d', '#eab253', '#fff1be', '#e98642', '#d79a5c'];
  let width = 0;
  let height = 0;
  let pixelRatio = 1;
  let animationFrame = null;
  let closed = false;
  let particles = [];
  let rockets = [];
  let timers = [];

  const resizeCanvas = () => {
    pixelRatio = Math.min(window.devicePixelRatio || 1, 2);
    const bounds = welcome.getBoundingClientRect();
    width = bounds.width;
    height = bounds.height;
    canvas.width = Math.round(width * pixelRatio);
    canvas.height = Math.round(height * pixelRatio);
    context.setTransform(pixelRatio, 0, 0, pixelRatio, 0, 0);
  };

  const explode = (x, y, colour) => {
    const count = width < 600 ? 46 : 70;
    for (let index = 0; index < count; index += 1) {
      const angle = (Math.PI * 2 * index) / count + (Math.random() - .5) * .12;
      const speed = 1.8 + Math.random() * 3.8;
      particles.push({
        x,
        y,
        previousX: x,
        previousY: y,
        velocityX: Math.cos(angle) * speed,
        velocityY: Math.sin(angle) * speed,
        life: 1,
        decay: .012 + Math.random() * .011,
        colour,
        size: .8 + Math.random() * 1.6
      });
    }
  };

  const launch = (xRatio, yRatio, colourIndex) => {
    const targetX = width * xRatio;
    const targetY = height * yRatio;
    rockets.push({
      x: targetX + (Math.random() - .5) * 110,
      y: height + 20,
      previousX: targetX,
      previousY: height + 20,
      targetX,
      targetY,
      speed: 8 + Math.random() * 2,
      colour: colours[colourIndex % colours.length]
    });
  };

  const render = () => {
    context.fillStyle = 'rgba(18, 7, 8, .18)';
    context.fillRect(0, 0, width, height);

    rockets = rockets.filter((rocket) => {
      rocket.previousX = rocket.x;
      rocket.previousY = rocket.y;
      const angle = Math.atan2(rocket.targetY - rocket.y, rocket.targetX - rocket.x);
      rocket.x += Math.cos(angle) * rocket.speed;
      rocket.y += Math.sin(angle) * rocket.speed;

      context.beginPath();
      context.moveTo(rocket.previousX, rocket.previousY);
      context.lineTo(rocket.x, rocket.y);
      context.strokeStyle = rocket.colour;
      context.lineWidth = 1.4;
      context.stroke();

      if (Math.hypot(rocket.targetX - rocket.x, rocket.targetY - rocket.y) < rocket.speed * 1.4) {
        explode(rocket.targetX, rocket.targetY, rocket.colour);
        return false;
      }
      return true;
    });

    particles = particles.filter((particle) => {
      particle.previousX = particle.x;
      particle.previousY = particle.y;
      particle.velocityX *= .985;
      particle.velocityY = particle.velocityY * .985 + .035;
      particle.x += particle.velocityX;
      particle.y += particle.velocityY;
      particle.life -= particle.decay;

      context.globalAlpha = Math.max(0, particle.life);
      context.beginPath();
      context.moveTo(particle.previousX, particle.previousY);
      context.lineTo(particle.x, particle.y);
      context.strokeStyle = particle.colour;
      context.lineWidth = particle.size;
      context.stroke();
      context.globalAlpha = 1;
      return particle.life > 0;
    });

    if (!closed) animationFrame = requestAnimationFrame(render);
  };

  const closeWelcome = () => {
    if (closed) return;
    closed = true;
    timers.forEach((timer) => clearTimeout(timer));
    cancelAnimationFrame(animationFrame);
    window.removeEventListener('resize', resizeCanvas);
    welcome.classList.add('is-closing');
    document.body.classList.remove('diwali-welcome-open');
    window.setTimeout(() => {
      welcome.hidden = true;
      welcome.remove();
    }, 800);
  };

  resizeCanvas();
  window.addEventListener('resize', resizeCanvas, {passive: true});
  enterButton.addEventListener('click', closeWelcome);
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closeWelcome();
  });

  if (!reducedMotion) {
    context.fillStyle = '#120708';
    context.fillRect(0, 0, width, height);
    explode(width * .5, height * .22, colours[0]);
    render();
    [[.18, .3, 0, 250], [.82, .27, 2, 900], [.3, .2, 1, 1650], [.72, .22, 4, 2400], [.5, .16, 0, 3300]].forEach(([x, y, colour, delay]) => {
      timers.push(window.setTimeout(() => launch(x, y, colour), delay));
    });
  }

  timers.push(window.setTimeout(closeWelcome, reducedMotion ? 4200 : 6800));
});
