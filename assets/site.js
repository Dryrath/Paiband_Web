(() => {
 const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 const fine = window.matchMedia('(pointer:fine)').matches;
 const body = document.body;
 const header = document.querySelector('.site-header');

 const progress = document.createElement('div');
 progress.className = 'scroll-progress';
 document.body.appendChild(progress);

 if (fine && !reduce) {
   const glow = document.createElement('div');
   glow.className = 'pointer-glow';
   document.body.prepend(glow);
   window.addEventListener('pointermove', e => {
     document.documentElement.style.setProperty('--mouse-x', e.clientX + 'px');
     document.documentElement.style.setProperty('--mouse-y', e.clientY + 'px');
   }, {passive:true});
 }

 const selectors = [
   '.section-head','.game-card','.pillar','.update','.mosaic figure',
   '.gallery4 figure','.press-card','.support-card','.path-card',
   '.schedule-card','.person','.image-frame','.callout','.factbar','.stat'
 ].join(',');
 const revealItems = [...document.querySelectorAll(selectors)];
 revealItems.forEach((el, i) => {
   el.classList.add('reveal');
   const parent = el.parentElement;
   if (parent) {
     const siblings = [...parent.children].filter(x => revealItems.includes(x));
     const index = siblings.indexOf(el);
     el.style.setProperty('--reveal-delay', Math.min(index * 85, 340) + 'ms');
   }
 });

 if (!reduce && 'IntersectionObserver' in window) {
   const io = new IntersectionObserver(entries => {
     entries.forEach(entry => {
       if (entry.isIntersecting) {
         entry.target.classList.add('is-visible');
         io.unobserve(entry.target);
       }
     });
   }, {threshold:.13, rootMargin:'0px 0px -5% 0px'});
   revealItems.forEach(el => io.observe(el));
 } else {
   revealItems.forEach(el => el.classList.add('is-visible'));
 }

 let ticking = false;
 const updateScroll = () => {
   const y = window.scrollY || 0;
   const max = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
   progress.style.transform = `scaleX(${Math.min(1, y / max)})`;
   if (header) header.classList.toggle('scrolled', y > 24);

   if (!reduce && window.innerWidth > 760) {
     document.querySelectorAll('.poster.a').forEach(el => el.style.setProperty('--parallax-y', `${Math.min(38, y * .045)}px`));
     document.querySelectorAll('.poster.b').forEach(el => el.style.setProperty('--parallax-y', `${Math.min(58, y * .075)}px`));
     document.querySelectorAll('.tgs-bg').forEach(el => {
       el.style.setProperty('--parallax-a', `${Math.min(55, y * .045)}px`);
       el.style.setProperty('--parallax-b', `${Math.min(85, y * .07)}px`);
     });
     document.querySelectorAll('.detail-box').forEach(el => {
       const r = el.getBoundingClientRect();
       const delta = (window.innerHeight/2 - (r.top + r.height/2)) * .045;
       el.style.setProperty('--parallax-y', `${Math.max(-38, Math.min(38, delta))}px`);
     });
   }
   ticking = false;
 };
 window.addEventListener('scroll', () => {
   if (!ticking) { requestAnimationFrame(updateScroll); ticking = true; }
 }, {passive:true});
 updateScroll();

 if (fine && !reduce && window.innerWidth > 900) {
   document.querySelectorAll('.game-card').forEach(card => {
     card.addEventListener('pointermove', e => {
       const r = card.getBoundingClientRect();
       const x = (e.clientX - r.left) / r.width - .5;
       const y = (e.clientY - r.top) / r.height - .5;
       card.style.transform = `perspective(1100px) rotateX(${(-y*3.2).toFixed(2)}deg) rotateY(${(x*4).toFixed(2)}deg) translateY(-5px)`;
     });
     card.addEventListener('pointerleave', () => card.style.transform = '');
   });
 }

 requestAnimationFrame(() => body.classList.add('motion-ready'));

 document.addEventListener('keydown', e => {
   if (e.key === 'Escape') {
     const n = document.getElementById('mainNav');
     if (n) n.classList.remove('open');
   }
 });
})();