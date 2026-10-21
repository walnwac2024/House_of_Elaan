(() => {
  const carousel = document.querySelector('.company-carousel');
  if (!carousel) return;
  const slides = [...carousel.querySelectorAll('.company-slide')];
  const dots = [...carousel.querySelectorAll('[data-slide-to]')];
  const brandMark = carousel.querySelector('.company-brand-mark');
  const previous = carousel.querySelector('[data-slide-prev]');
  const next = carousel.querySelector('[data-slide-next]');
  const pause = carousel.querySelector('[data-slide-pause]');
  const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)');
  let current = 0;
  let paused = false;
  let visible = true;
  let timer = null;

  function paint(index) {
    current = (index + slides.length) % slides.length;
    slides.forEach((slide, position) => {
      const relative = (position - current + slides.length) % slides.length;
      slide.classList.toggle('is-active', relative === 0);
      slide.classList.toggle('is-next', relative === 1);
      slide.classList.toggle('is-prev', relative === slides.length - 1);
      slide.setAttribute('aria-hidden', relative === 0 ? 'false' : 'true');
    });
    dots.forEach((dot, position) => dot.setAttribute('aria-current', position === current ? 'true' : 'false'));
    if (brandMark && !reducedMotion.matches) {
      brandMark.classList.remove('is-emerging');
      void brandMark.offsetWidth;
      brandMark.classList.add('is-emerging');
    }
  }

  function stop() {
    if (timer !== null) clearInterval(timer);
    timer = null;
  }
  function start() {
    stop();
    if (paused || reducedMotion.matches || document.hidden || !visible || carousel.matches(':hover') || carousel.contains(document.activeElement)) return;
    timer = setInterval(() => paint(current + 1), 6000);
  }
  function choose(index) {
    paint(index);
    start();
  }

  previous.addEventListener('click', () => choose(current - 1));
  next.addEventListener('click', () => choose(current + 1));
  dots.forEach((dot, index) => dot.addEventListener('click', () => choose(index)));
  pause.addEventListener('click', () => {
    paused = !paused;
    pause.setAttribute('aria-pressed', String(paused));
    pause.setAttribute('aria-label', paused ? 'Play image slideshow' : 'Pause image slideshow');
    pause.textContent = paused ? 'Play' : 'Pause';
    start();
  });
  carousel.addEventListener('mouseenter', stop);
  carousel.addEventListener('mouseleave', start);
  carousel.addEventListener('focusin', stop);
  carousel.addEventListener('focusout', () => setTimeout(start, 0));
  document.addEventListener('visibilitychange', start);
  reducedMotion.addEventListener('change', start);
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(entries => {
      visible = entries[0].isIntersecting;
      start();
    }, { threshold: .15 }).observe(carousel);
  }
  paint(0);
  start();
})();