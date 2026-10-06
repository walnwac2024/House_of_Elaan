(() => {
  // The header is already in its fixed, full-width shell when HTML first paints.
  const siteHeader = document.querySelector('.sticky-site-header .header');
  if (siteHeader) {
    const headerShell = siteHeader.parentElement;
    let headerFrame = 0;
    const headerMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let headerProgress = Math.min(1, Math.max(0, window.scrollY / 160));
    let previousHeaderTime = 0;
    function updateHeader(time) {
      const target = Math.min(1, Math.max(0, window.scrollY / 160));
      const elapsed = previousHeaderTime ? Math.min(64, time - previousHeaderTime) : 16;
      previousHeaderTime = time;
      headerProgress = headerMotion.matches ? target : headerProgress + (target - headerProgress) * (1 - Math.exp(-elapsed / 150));
      if (Math.abs(target - headerProgress) < .001) headerProgress = target;
      headerShell.style.setProperty('--header-progress', headerProgress.toFixed(4));
      if (headerProgress !== target) headerFrame = requestAnimationFrame(updateHeader);
      else { headerFrame = 0; previousHeaderTime = 0; }
    }
    headerShell.style.setProperty('--header-progress', headerProgress.toFixed(4));
    function scheduleHeader() {
      if (!headerFrame) headerFrame = requestAnimationFrame(updateHeader);
    }
    window.addEventListener('scroll', scheduleHeader, { passive: true });
    headerMotion.addEventListener('change', scheduleHeader);
  }
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('#navigation');
  const drawer = document.querySelector('.nav-drawer');
  const mobileMenu = window.matchMedia('(max-width: 1100px)');
  const drawerLinks = drawer.querySelector('.drawer-links');
  nav.querySelectorAll('a').forEach(link => drawerLinks.appendChild(link.cloneNode(true)));
  toggle.setAttribute('aria-controls', 'mobile-navigation');
  toggle.setAttribute('aria-haspopup', 'dialog');
  function closeMenu() { if (drawer.open) drawer.close(); }
  toggle.addEventListener('click', () => {
    drawer.showModal();
    document.documentElement.classList.add('drawer-open');
    toggle.setAttribute('aria-expanded', 'true');
  });
  drawer.querySelector('.drawer-close').addEventListener('click', closeMenu);
  drawer.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
  drawer.addEventListener('click', event => {
    const bounds = drawer.getBoundingClientRect();
    if (event.target === drawer && (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom)) closeMenu();
  });
  drawer.addEventListener('close', () => {
    document.documentElement.classList.remove('drawer-open');
    toggle.setAttribute('aria-expanded', 'false');
    if (mobileMenu.matches) toggle.focus({ preventScroll: true });
  });
  mobileMenu.addEventListener('change', () => { if (!mobileMenu.matches) closeMenu(); });
  const faqs = document.querySelectorAll('.faq-list details');
  const faqMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const faqStates = new Map([...faqs].map(item => [item, { expanded: item.open, animation: null }]));
  function setFaqOpen(item, expanded) {
    const state = faqStates.get(item);
    const startHeight = item.getBoundingClientRect().height;
    state.animation?.cancel();
    state.animation = null;
    state.expanded = expanded;
    const finish = () => {
      item.open = state.expanded;
      item.style.height = '';
      state.animation = null;
    };
    if (faqMotion.matches || typeof item.animate !== 'function') { finish(); return; }
    // Keep answers rendered during closing; animate only the outer height.
    item.open = true;
    item.style.height = 'auto';
    const border = parseFloat(getComputedStyle(item).borderTopWidth) + parseFloat(getComputedStyle(item).borderBottomWidth);
    const endHeight = expanded ? item.getBoundingClientRect().height : item.querySelector('summary').getBoundingClientRect().height + border;
    item.style.height = `${startHeight}px`;
    state.animation = item.animate([
      { height: `${startHeight}px` }, { height: `${endHeight}px` }
    ], { duration: 280, easing: 'cubic-bezier(.25,.7,.25,1)' });
    state.animation.onfinish = finish;
  }
  faqs.forEach(item => item.querySelector('summary').addEventListener('click', event => {
    event.preventDefault();
    const expanded = !faqStates.get(item).expanded;
    if (expanded) faqs.forEach(other => {
      if (other !== item && faqStates.get(other).expanded) setFaqOpen(other, false);
    });
    setFaqOpen(item, expanded);
  }));
  function finishFaqAnimations() {
    faqStates.forEach((state, item) => {
      state.animation?.cancel();
      state.animation = null;
      item.open = state.expanded;
      item.style.height = '';
    });
  }
  window.addEventListener('resize', finishFaqAnimations, { passive: true });
  faqMotion.addEventListener('change', finishFaqAnimations);

  // One shared entrance rhythm across sections; content is visible without JS.
  const overviewCards = [...document.querySelectorAll(
    '.overview-card, .about-reveal:not(.about-intro), .about-title, .about-description, .group-overview h2, ' +
    '.values-heading, .faq-list > details, .network-copy, .network-map, ' +
    '.finale-copy, .finale-panel, .footer-statement, .footer-columns > *, .footer-legal, .hero-sectors'
  )];
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  if ('IntersectionObserver' in window && typeof Element.prototype.animate === 'function') {
    const activeReveals = new Map();
    const observer = new IntersectionObserver(entries => {
      let stagger = 0;
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const card = entry.target;
        observer.unobserve(card);
        if (reducedMotion.matches || card.matches(':focus-within')) {
          card.classList.remove('reveal-pending');
          card.classList.add('overview-revealed');
          return;
        }
        // Only stagger elements entering together, never by their page index.
        const delay = Math.min(stagger++ * 85, 340);
        const baseTransform = getComputedStyle(card).transform;
        const restingTransform = baseTransform === 'none' ? '' : baseTransform;
        const isPanel = card.matches('.about-purpose, .elaan-value, .finale-panel, .overview-card');
        const isHeading = card.matches('.about-title, .values-heading, .network-copy, .finale-copy, .footer-statement, .group-overview h2');
        const lift = isHeading ? 38 : isPanel ? 30 : 22;
        card.classList.add('motion-entering');
        const animation = card.animate([
          { opacity: 0, transform: `translate3d(0,${lift}px,0) scale(${isPanel ? .965 : 1}) ${restingTransform}` },
          { opacity: 1, transform: baseTransform }
        ], { duration: isHeading ? 1100 : 900, delay, easing: 'cubic-bezier(.16,1,.3,1)', fill: 'both' });
        activeReveals.set(card, animation);
        animation.onfinish = () => {
          activeReveals.delete(card);
          card.classList.remove('reveal-pending');
          card.classList.remove('motion-entering');
          card.classList.add('overview-revealed');
          animation.cancel();
        };
      });
    }, { threshold: 0, rootMargin: '0px 0px -35px 0px' });
    overviewCards.forEach(card => {
      // Never hide content already on screen (including restored scroll positions).
      // Prepare offscreen elements before observing so they cannot flash first.
      if (reducedMotion.matches || card.getBoundingClientRect().top < window.innerHeight || card.matches(':focus-within')) {
        card.classList.add('overview-revealed');
        return;
      }
      card.classList.add('reveal-pending');
      observer.observe(card);
      card.addEventListener('focusin', () => {
        observer.unobserve(card);
        card.classList.remove('reveal-pending');
        card.classList.add('overview-revealed');
        activeReveals.get(card)?.cancel();
        activeReveals.delete(card);
      });
    });
    reducedMotion.addEventListener('change', () => {
      if (!reducedMotion.matches) return;
      observer.disconnect();
      overviewCards.forEach(card => {
        card.classList.remove('reveal-pending');
        card.classList.add('overview-revealed');
      });
      activeReveals.forEach(animation => animation.cancel());
      activeReveals.clear();
    });
  }
  // Match collapsed card heights without stretching neighbours when details open.
  const businessGrid = document.querySelector('.business-card-grid');
  if (businessGrid) {
    const cards = [...businessGrid.querySelectorAll('.enterprise-card')];
    let resizeFrame;
    function equalizeBusinessCards() {
      businessGrid.classList.add('measuring-cards');
      try {
        const height = Math.ceil(Math.max(0, ...cards.map(card => card.offsetHeight)));
        businessGrid.style.setProperty('--business-card-height', `${height}px`);
      } finally {
        businessGrid.classList.remove('measuring-cards');
      }
    }
    function scheduleCardSizing() {
      cancelAnimationFrame(resizeFrame);
      resizeFrame = requestAnimationFrame(equalizeBusinessCards);
    }
    equalizeBusinessCards();
    if (document.fonts) document.fonts.ready.then(scheduleCardSizing);
    if ('ResizeObserver' in window) {
      let lastWidth = businessGrid.clientWidth;
      new ResizeObserver(() => {
        const width = businessGrid.clientWidth;
        if (width !== lastWidth) {
          lastWidth = width;
          scheduleCardSizing();
        }
      }).observe(businessGrid);
    }
    window.addEventListener('resize', scheduleCardSizing, { passive: true });
  }
  const inquiryDialog = document.querySelector('.inquiry-dialog');
  if (inquiryDialog && typeof inquiryDialog.showModal === 'function') {
    const callButton = inquiryDialog.querySelector('.inquiry-call-button');
    let inquiryTrigger;
    document.querySelectorAll('.enterprise-contact').forEach(link => {
      link.setAttribute('aria-haspopup', 'dialog');
      link.addEventListener('click', event => {
        event.preventDefault();
        inquiryTrigger = link;

        inquiryDialog.querySelector('.inquiry-business').textContent = link.closest('.enterprise-card').querySelector('h3').textContent;
        inquiryDialog.showModal();
        document.documentElement.classList.add('inquiry-open');
        callButton.focus({ preventScroll: true });
      });
    });
    inquiryDialog.querySelector('.inquiry-close').addEventListener('click', () => inquiryDialog.close());
    inquiryDialog.addEventListener('click', event => {
      const box = inquiryDialog.getBoundingClientRect();
      if (event.target === inquiryDialog && (event.clientX < box.left || event.clientX > box.right || event.clientY < box.top || event.clientY > box.bottom)) inquiryDialog.close();
    });
    inquiryDialog.addEventListener('close', () => {
      document.documentElement.classList.remove('inquiry-open');
      inquiryTrigger?.focus({ preventScroll: true });
    });

  }
  const backToTop = document.querySelector('.floating-back-top');
  if (backToTop) {
    let backTopFrame = 0;
    function updateBackToTop() {
      backTopFrame = 0;
      backToTop.classList.toggle('is-visible', window.scrollY > 400);
      document.querySelector('.floating-whatsapp')?.classList.toggle('is-visible', window.scrollY > 400);
      const bounds = backToTop.getBoundingClientRect();
      let surface = document.elementsFromPoint(bounds.left + bounds.width / 2, bounds.top + bounds.height / 2)
        .find(element => element !== backToTop && !backToTop.contains(element));
      let darkSurface = false;
      while (surface) {
        const style = getComputedStyle(surface);
        // A translucent glow can sit above an opaque red gradient.
        // Inspect all gradient stops before falling through to the ancestor.
        const colors = [...(style.backgroundImage.match(/rgba?\([^)]+\)/g) || []), style.backgroundColor];
        const color = colors.map(value => value.match(/[\d.]+/g)?.map(Number))
          .find(channels => channels && (channels.length < 4 || channels[3] >= .7));
        if (color) {
          const [r, g, b] = color;
          darkSurface = (.2126 * r + .7152 * g + .0722 * b) < 165;
          break;
        }
        surface = surface.parentElement;
      }
      backToTop.classList.toggle('on-dark-surface', darkSurface);
    }
    function scheduleBackToTop() {
      if (!backTopFrame) backTopFrame = requestAnimationFrame(updateBackToTop);
    }
    updateBackToTop();
    window.addEventListener('scroll', scheduleBackToTop, { passive: true });
    window.addEventListener('resize', scheduleBackToTop, { passive: true });
    window.addEventListener('load', scheduleBackToTop);
  }
})();

/* Letter choreography and restrained pointer depth for the opening title. */
(() => {
  const title = document.querySelector('#hero-title');
  const hero = document.querySelector('.hero-v2');
  if (!title || !hero) return;
  const motion = matchMedia('(prefers-reduced-motion: no-preference)');
  const pointer = matchMedia('(hover: hover) and (pointer: fine)');
  title.querySelectorAll('.hero-title-line > span, .hero-title-line > em').forEach((line, row) => {
    const fragment = document.createDocumentFragment();
    [...line.textContent].forEach((letter, index) => {
      const character = document.createElement('span');
      character.className = 'hero-letter';
      character.textContent = letter;
      character.style.setProperty('--letter-delay', `${120 + row * 230 + index * 32}ms`);
      fragment.append(character);
    });
    line.replaceChildren(fragment);
  });
  title.classList.add('hero-title-choreographed');
  let frame = 0;
  let x = 0, y = 0;
  const reset = () => {
    cancelAnimationFrame(frame);
    frame = 0;
    title.style.setProperty('--title-x', '0px');
    title.style.setProperty('--title-y', '0px');
    title.style.setProperty('--title-turn', '0deg');
  };
  hero.addEventListener('pointermove', event => {
    if (!motion.matches || !pointer.matches || event.pointerType === 'touch') return;
    const rect = hero.getBoundingClientRect();
    x = (event.clientX - rect.left) / rect.width - .5;
    y = (event.clientY - rect.top) / rect.height - .5;
    if (!frame) frame = requestAnimationFrame(() => {
      title.style.setProperty('--title-x', `${x * 10}px`);
      title.style.setProperty('--title-y', `${y * 6}px`);
      title.style.setProperty('--title-turn', `${x * 1.2}deg`);
      frame = 0;
    });
  }, { passive: true });
  hero.addEventListener('pointerleave', reset);
  motion.addEventListener('change', reset);
  pointer.addEventListener('change', reset);
})();

// Open the desktop web composer directly so the draft travels with the chat URL.
(() => {
  const whatsappLink = document.querySelector('.floating-whatsapp');
  if (!whatsappLink) return;
  const phone = '923111222679';
  const message = "Hello House of Elaan! I'd like to know more about your services. Please connect me with the right team.";
  const mobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
  const destination = new URL(mobile ? `https://wa.me/${phone}` : 'https://web.whatsapp.com/send');
  if (!mobile) destination.searchParams.set('phone', phone);
  destination.searchParams.set('text', message);
  whatsappLink.href = destination.href;
})();
