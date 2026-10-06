(() => {
  const section = document.querySelector('#businesses');
  const rail = section?.querySelector('.business-card-grid');
  if (!rail) return;
  const cards = [...rail.querySelectorAll('.enterprise-card')];
  cards.forEach(card => {
    const details = card.querySelector('.enterprise-services');
    const intro = card.querySelector('.enterprise-intro');
    details.querySelector('summary > span').firstChild.textContent = 'Details & services ';
    details.querySelector('summary').after(intro);
  });
  const desktop = matchMedia('(min-width: 1101px) and (min-height: 620px) and (hover: hover) and (pointer: fine)');
  const reduce = matchMedia('(prefers-reduced-motion: reduce)');
  const finePointer = matchMedia('(hover: hover) and (pointer: fine)');
  section.classList.add('business-gallery');
  rail.setAttribute('aria-label', 'Our businesses — swipe or scroll to explore');
  // More vertical travel gives each business time to rise and grow into view.
  const scrollPerPixel = 1.3;
  const smoothingMs = 125;
  section.querySelector('.section-heading h2 br')?.replaceWith(document.createTextNode(' '));
  const galleryIntro = section.querySelector('.section-heading');
  galleryIntro.classList.remove('section-heading', 'compact');
  galleryIntro.classList.add('business-gallery-intro');
  const introFooter = document.createElement('span');
  introFooter.className = 'business-intro-footer';
  introFooter.textContent = 'Nine businesses. One shared vision. →';
  galleryIntro.append(introFooter);
  rail.prepend(galleryIntro);
  const progress = document.createElement('div');
  progress.className = 'business-gallery-progress';
  progress.setAttribute('aria-hidden', 'true');
  progress.innerHTML = '<span class="business-gallery-count">01 / 09</span><span class="business-gallery-line"><i></i></span><span class="business-gallery-hint">Scroll to explore <b>↗</b></span>';
  rail.after(progress);
  const progressFill = progress.querySelector('i');
  const progressCount = progress.querySelector('.business-gallery-count');
  progress.removeAttribute('aria-hidden');
  const galleryNav = document.createElement('div');
  galleryNav.className = 'business-gallery-nav';
  galleryNav.setAttribute('role', 'group');
  galleryNav.setAttribute('aria-label', 'Browse businesses');
  galleryNav.innerHTML = '<button type="button" aria-label="Previous business">&#8592;</button><button type="button" aria-label="Next business">&#8594;</button>';
  progress.append(galleryNav);
  const stops = [galleryIntro, ...cards];
  const navButtons = [...galleryNav.querySelectorAll('button')];
  const mobileCarousel = matchMedia('(max-width: 1100px)');
  let carouselFrame = 0, carouselVisible = false, carouselPaused = false, resumeAfter = 0;
  const pauseButton = document.createElement('button');
  pauseButton.type = 'button';
  pauseButton.className = 'business-carousel-pause';
  pauseButton.textContent = 'Ⅱ';
  pauseButton.setAttribute('aria-label', 'Pause automatic carousel');
  galleryNav.prepend(pauseButton);
  pauseButton.addEventListener('click', () => {
    carouselPaused = !carouselPaused;
    pauseButton.textContent = carouselPaused ? '▶' : 'Ⅱ';
    pauseButton.setAttribute('aria-label', carouselPaused ? 'Play automatic carousel' : 'Pause automatic carousel');
  });
  function stopCarouselMotion() {
    cancelAnimationFrame(carouselFrame);
    carouselFrame = 0;
    rail.classList.remove('carousel-moving');
  }
  function moveCarousel(direction) {
    stopCarouselMotion();
    const positions = stops.map(item => Math.min(distance, item.offsetLeft - galleryIntro.offsetLeft));
    let current = 0;
    positions.forEach((position, index) => {
      if (Math.abs(position - rail.scrollLeft) < Math.abs(positions[current] - rail.scrollLeft)) current = index;
    });
    const next = (current + direction + stops.length) % stops.length;
    const from = rail.scrollLeft, destination = positions[next];
    if (reduce.matches || Math.abs(next - current) > 1) {
      rail.scrollTo({ left: destination, behavior: 'instant' });
      if (!reduce.matches) rail.animate([{ opacity: .45 }, { opacity: 1 }], { duration: 550, easing: 'ease-out' });
      return;
    }
    rail.classList.add('carousel-moving');
    const began = performance.now();
    function glide(now) {
      const progress = Math.min(1, (now - began) / 750);
      const eased = progress * progress * (3 - 2 * progress);
      rail.scrollLeft = from + (destination - from) * eased;
      if (progress < 1) carouselFrame = requestAnimationFrame(glide);
      else stopCarouselMotion();
    }
    carouselFrame = requestAnimationFrame(glide);
  }
  const holdCarousel = () => { resumeAfter = Date.now() + 4500; stopCarouselMotion(); };
  rail.addEventListener('pointerdown', holdCarousel, { passive: true });
  rail.addEventListener('wheel', holdCarousel, { passive: true });
  rail.addEventListener('focusin', holdCarousel);
  mobileCarousel.addEventListener('change', () => { stopCarouselMotion(); measure(); });
  reduce.addEventListener('change', stopCarouselMotion);
  document.addEventListener('visibilitychange', () => { stopCarouselMotion(); resumeAfter = Date.now() + 3200; });
  if ('IntersectionObserver' in window) new IntersectionObserver(entries => {
    carouselVisible = entries[0].isIntersecting;
    if (!carouselVisible) stopCarouselMotion();
    else resumeAfter = Date.now() + 1800;
  }, { threshold: .01 }).observe(rail);
  window.setInterval(() => {
    if (mobileCarousel.matches && carouselVisible && !document.hidden && !reduce.matches && !carouselPaused && !carouselFrame && Date.now() >= resumeAfter && !rail.querySelector(':focus-visible') && !document.querySelector('dialog[open]')) { resumeAfter = Date.now() + 3200; moveCarousel(1); }
  }, 500);
  navButtons.forEach((button, direction) => button.addEventListener('click', () => {
    if (mobileCarousel.matches) { resumeAfter = Date.now() + 4500; moveCarousel(direction ? 1 : -1); return; }
    const position = rail.scrollLeft;
    const positions = stops.map(item => Math.min(distance, item.offsetLeft - galleryIntro.offsetLeft));
    const destination = direction
      ? positions.find(value => value > position + 20) ?? distance
      : [...positions].reverse().find(value => value < position - 20) ?? 0;
    if (section.classList.contains('is-pinned')) {
      window.scrollTo({ top: start + destination * scrollPerPixel, behavior: reduce.matches ? 'instant' : 'smooth' });
    } else rail.scrollTo({ left: destination, behavior: reduce.matches ? 'instant' : 'smooth' });
  }));
  cards.forEach((card, index) => {
    const marker = document.createElement('span');
    marker.className = 'business-panel-marker';
    marker.setAttribute('aria-hidden', 'true');
    marker.textContent = `${String(index + 1).padStart(2, '0')} / HOUSE OF ELAAN`;
    card.querySelector('.enterprise-logo-panel').append(marker);
  });
  function updateProgress(position) {
    const first = galleryIntro.offsetLeft;
    let active = -1;
    cards.forEach((card, index) => {
      if (card.offsetLeft - first <= position + rail.clientWidth * .3) active = index;
    });
    progressCount.textContent = active < 0 ? 'INTRO / 09' : `${String(active + 1).padStart(2, '0')} / ${String(cards.length).padStart(2, '0')}`;
    progressFill.style.transform = `scaleX(${distance ? .08 + .92 * position / distance : 1})`;
    navButtons[0].disabled = !mobileCarousel.matches && position < 2;
    navButtons[1].disabled = !mobileCarousel.matches && position >= distance - 2;
  }
  rail.addEventListener('scroll', () => updateProgress(rail.scrollLeft), { passive: true });
  let distance = 0, start = 0, frame = 0, renderedScroll = 0, lastTime = 0;
  const scrollTarget = () => Math.max(0, Math.min(distance, (window.scrollY - start) / scrollPerPixel));
  function paint(time = performance.now()) {
    frame = 0;
    if (!section.classList.contains('is-pinned')) return;
    const target = scrollTarget();
    const elapsed = lastTime ? Math.min(64, time - lastTime) : 16;
    lastTime = time;
    renderedScroll += (target - renderedScroll) * (1 - Math.exp(-elapsed / smoothingMs));
    if (Math.abs(target - renderedScroll) < .2) renderedScroll = target;
    rail.scrollLeft = renderedScroll;
    updateProgress(renderedScroll);
    const width = rail.clientWidth;
    cards.forEach(card => {
      const incoming = Math.max(0, Math.min(1, (card.offsetLeft - renderedScroll - width * .02) / (width * .94)));
      const eased = incoming * incoming * (3 - 2 * incoming);
      card.style.transform = `translate3d(0,${eased * rail.clientHeight * .19}px,0) scale(${1 - eased * .12})`;
    });
    if (renderedScroll !== target) frame = requestAnimationFrame(paint);
    else lastTime = 0;
  }
  function measure() {
    const pinned = desktop.matches && !reduce.matches;
    section.classList.toggle('is-pinned', pinned);
    distance = Math.max(0, rail.scrollWidth - rail.clientWidth);
    // Brief space at the end lets the final card settle before the section exits.
    section.style.height = pinned ? `${window.innerHeight - 76 + distance * scrollPerPixel + window.innerHeight * .18}px` : '';
    start = section.getBoundingClientRect().top + window.scrollY - 76;
    cancelAnimationFrame(frame);
    lastTime = 0;
    renderedScroll = scrollTarget();
    if (!pinned) cards.forEach(card => card.style.removeProperty('transform'));
    updateProgress(pinned ? renderedScroll : rail.scrollLeft);
    paint();
  }
  window.addEventListener('scroll', () => {
    if (!frame) frame = requestAnimationFrame(paint);
  }, { passive: true });
  window.addEventListener('resize', measure, { passive: true });
  window.addEventListener('load', measure);
  desktop.addEventListener('change', measure);
  reduce.addEventListener('change', measure);
  document.fonts?.ready.then(measure);
  if ('ResizeObserver' in window) new ResizeObserver(measure).observe(section.querySelector('.container'));

  function showCard(card) {
    const position = card.offsetLeft - galleryIntro.offsetLeft;
    if (section.classList.contains('is-pinned')) {
      window.scrollTo({ top: start + Math.min(distance, position) * scrollPerPixel, behavior: 'instant' });
    } else rail.scrollTo({ left: position, behavior: 'instant' });
  }
  rail.addEventListener('focusin', event => {
    const card = event.target.closest('.enterprise-card');
    if (card) {
      const rect = card.getBoundingClientRect();
      const viewport = rail.getBoundingClientRect();
      if (rect.left < viewport.left || rect.right > viewport.right) showCard(card);
    }
  });
  document.addEventListener('click', event => {
    const link = event.target.closest('a[href^="#"]');
    const card = link && cards.find(item => '#' + item.id === link.getAttribute('href'));
    if (!card) return;
    event.preventDefault();
    measure();
    showCard(card);
    if (!section.classList.contains('is-pinned')) section.scrollIntoView({ behavior: reduce.matches ? 'instant' : 'smooth' });
    history.replaceState(null, '', '#' + card.id);
  });
  function hashCard() {
    const card = cards.find(item => '#' + item.id === location.hash);
    if (card) { measure(); showCard(card); }
  }
  window.addEventListener('hashchange', hashCard);
  window.addEventListener('load', hashCard);

  const cursor = document.createElement('span');
  cursor.className = 'business-talk-cursor';
  cursor.textContent = 'Let’s Talk ↗';
  cursor.setAttribute('aria-hidden', 'true');
  document.body.appendChild(cursor);
  let cursorFrame = 0, pointerX = 0, pointerY = 0;
  function hideCursor() {
    cancelAnimationFrame(cursorFrame);
    cursorFrame = 0;
    cursor.classList.remove('is-active');
    rail.classList.remove('has-talk-cursor');
  }
  rail.addEventListener('pointermove', event => {
    if (!finePointer.matches || event.pointerType === 'touch' || event.target.closest('a,button,summary,details,input,textarea') || document.querySelector('dialog[open]')) { hideCursor(); return; }
    if (!event.target.closest('.enterprise-card')) { hideCursor(); return; }
    pointerX = event.clientX; pointerY = event.clientY;
    if (!cursorFrame) cursorFrame = requestAnimationFrame(() => {
      cursor.style.left = `${pointerX}px`; cursor.style.top = `${pointerY}px`;
      cursor.classList.add('is-active'); rail.classList.add('has-talk-cursor');
      cursorFrame = 0;
    });
  });
  rail.addEventListener('pointerleave', hideCursor);
  window.addEventListener('scroll', hideCursor, { passive: true });
  finePointer.addEventListener('change', hideCursor);
  rail.addEventListener('click', event => {
    if (!finePointer.matches || event.target.closest('a,button,summary,details,input,textarea') || window.getSelection().toString()) return;
    const card = event.target.closest('.enterprise-card');
    if (card) { hideCursor(); card.querySelector('.enterprise-contact').click(); }
  });
  measure();
  // Long descriptions open outside the pinned panel instead of a clipped scrollbox.
  const detailDialog = document.createElement('dialog');
  detailDialog.className = 'business-detail-dialog';
  detailDialog.setAttribute('aria-labelledby', 'business-detail-title');
  detailDialog.innerHTML = '<button type="button" class="business-detail-close" aria-label="Close details">×</button><h2 id="business-detail-title"></h2><div class="business-detail-body"></div>';
  document.body.appendChild(detailDialog);
  let detailTrigger;
  cards.forEach(card => {
    const button = document.createElement('button');
    button.className = 'business-detail-trigger';
    button.type = 'button';
    button.textContent = 'Details & services ↗';
    button.setAttribute('aria-haspopup', 'dialog');
    card.querySelector('.enterprise-reading').before(button);
    button.addEventListener('click', () => {
      hideCursor();
      detailTrigger = button;
      detailDialog.querySelector('h2').textContent = card.querySelector('h3').textContent;
      const body = detailDialog.querySelector('.business-detail-body');
      body.replaceChildren(card.querySelector('.enterprise-intro').cloneNode(true), card.querySelector('.enterprise-services dl').cloneNode(true));
      detailDialog.showModal();
      document.documentElement.classList.add('inquiry-open');
    });
  });
  detailDialog.querySelector('button').addEventListener('click', () => detailDialog.close());
  detailDialog.addEventListener('click', event => {
    const rect = detailDialog.getBoundingClientRect();
    if (event.target === detailDialog && (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom)) detailDialog.close();
  });
  detailDialog.addEventListener('close', () => {
    document.documentElement.classList.remove('inquiry-open');
    detailTrigger?.focus({ preventScroll: true });
  });
})();
