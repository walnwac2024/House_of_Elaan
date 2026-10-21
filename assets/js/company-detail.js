(() => {
  if (!('IntersectionObserver' in window) || matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const targets = document.querySelectorAll(
    '.company-gallery-image, .company-about > *, .company-section-heading > *, .company-service, .company-next > *'
  );
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold: .12, rootMargin: '0px 0px 40px 0px' });

  targets.forEach((target) => observer.observe(target));
  document.documentElement.classList.add('company-motion-ready');

  const visual = document.querySelector('.company-brand-hero');
  if (visual && matchMedia('(pointer: fine)').matches) {
    visual.addEventListener('pointermove', (event) => {
      const box = visual.getBoundingClientRect();
      const x = (event.clientX - box.left) / box.width - .5;
      const y = (event.clientY - box.top) / box.height - .5;
      visual.style.setProperty('--pointer-x', `${(x * 16).toFixed(1)}px`);
      visual.style.setProperty('--pointer-y', `${(y * 16).toFixed(1)}px`);
      visual.style.setProperty('--orbit-x', `${(x * 24).toFixed(1)}px`);
      visual.style.setProperty('--orbit-y', `${(y * 24).toFixed(1)}px`);
    });
    visual.addEventListener('pointerleave', () => {
      ['--pointer-x', '--pointer-y', '--orbit-x', '--orbit-y'].forEach((name) => {
        visual.style.setProperty(name, '0px');
      });
    });
  }

  const hero = document.querySelector('.company-hero');
  const progress = document.createElement('div');
  progress.className = 'company-scroll-progress';
  progress.setAttribute('aria-hidden', 'true');
  progress.style.setProperty('--progress-color', hero?.style.getPropertyValue('--brand-color') || '#c93932');
  document.body.appendChild(progress);
  let scheduled = false;
  function updateProgress() {
    const distance = document.documentElement.scrollHeight - window.innerHeight;
    progress.style.setProperty('--page-progress', distance > 0 ? String(Math.min(1, window.scrollY / distance)) : '0');
    scheduled = false;
  }
  window.addEventListener('scroll', () => {
    if (scheduled) return;
    scheduled = true;
    requestAnimationFrame(updateProgress);
  }, { passive: true });
  updateProgress();

  const floatingControls = document.querySelectorAll('.floating-whatsapp, .floating-back-top');
  function updateFloatingControls() {
    floatingControls.forEach((control) => control.classList.toggle('is-visible', window.scrollY > 280));
  }
  window.addEventListener('scroll', updateFloatingControls, { passive: true });
  updateFloatingControls();
})();
