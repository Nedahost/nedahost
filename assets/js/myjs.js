document.addEventListener('DOMContentLoaded', function() {
  
  // Lenis smooth scroll
  window.lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
  });

  function raf(time) {
    window.lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  // Smooth scroll για links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        window.lenis.scrollTo(target);
      }
    });
  });

  // Marquee Scroll Effect
  const marqueeTop = document.querySelector('.marquee-track--top');
  const marqueeBottom = document.querySelector('.marquee-track--bottom');
  
  if (marqueeTop && marqueeBottom) {
    window.addEventListener('scroll', function() {
      const scroll = window.scrollY;
      const topPosition = -scroll * 0.3;
      const bottomPosition = -200 + scroll * 0.3;
      
      marqueeTop.style.transform = 'translateX(' + topPosition + 'px)';
      marqueeBottom.style.transform = 'translateX(' + bottomPosition + 'px)';
    });
  }

});