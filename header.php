<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7RGHQV');</script>
        <!-- End Google Tag Manager -->
        
        <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

        <?php wp_head(); ?>
        <script>
            class ServicesCarousel {
  constructor() {
    this.currentSlide = 0;
    this.totalSlides = 0;
    this.isAnimating = false;
    
    this.init();
  }
  
  init() {
    this.carousel = document.querySelector('.services__carousel');
    this.track = document.querySelector('.carousel-track');
    this.slides = document.querySelectorAll('.carousel-slide');
    this.menuItems = document.querySelectorAll('.services__menu a');
    this.prevBtn = document.querySelector('.carousel-prev');
    this.nextBtn = document.querySelector('.carousel-next');
    
    if (!this.carousel || !this.slides.length) {
      console.warn('Services carousel elements not found');
      return;
    }
    
    this.totalSlides = this.slides.length;
    
    // Κλωνοποίηση slides για infinite loop
    this.cloneSlides();
    
    this.setupCarousel();
    this.bindEvents();
  }
  
  cloneSlides() {
    // Κλωνοποίησε τα πρώτα 2 slides στο τέλος
    this.slides.forEach((slide) => {
      const clone = slide.cloneNode(true);
      clone.classList.add('clone');
      this.track.appendChild(clone);
    });
    
    // Update slides reference
    this.allSlides = document.querySelectorAll('.carousel-slide');
  }
  
  setupCarousel() {
    this.slides[0]?.classList.add('active');
    this.menuItems[0]?.classList.add('active');
  }
  
  bindEvents() {
    this.menuItems.forEach((item, index) => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        this.goToSlide(index);
      });
    });
    
    this.prevBtn?.addEventListener('click', () => this.previousSlide());
    this.nextBtn?.addEventListener('click', () => this.nextSlide());
    
    document.addEventListener('keydown', (e) => {
      if (!this.isInViewport()) return;
      
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        this.previousSlide();
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        this.nextSlide();
      }
    });
    
    this.setupTouchEvents();
  }
  
  setupTouchEvents() {
  let startX = 0;
  let currentX = 0;
  let isDragging = false;
  let startTranslate = 0;
  
  // Touch events
  this.carousel.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
    isDragging = true;
    startTranslate = this.getCurrentTranslate();
    this.track.style.transition = 'none';
  }, { passive: true });
  
  this.carousel.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    currentX = e.touches[0].clientX;
    const diff = currentX - startX;
    this.track.style.transform = `translateX(${startTranslate + diff}px)`;
  }, { passive: true });
  
  this.carousel.addEventListener('touchend', () => {
    if (!isDragging) return;
    isDragging = false;
    this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1)';
    
    const diff = currentX - startX;
    if (Math.abs(diff) > 50) {
      if (diff < 0) {
        this.nextSlide();
      } else {
        this.previousSlide();
      }
    } else {
      this.animateToSlide(this.currentSlide);
    }
  });
  
  // Mouse drag
  this.carousel.addEventListener('mousedown', (e) => {
    startX = e.clientX;
    currentX = e.clientX;
    isDragging = true;
    startTranslate = this.getCurrentTranslate();
    this.track.style.transition = 'none';
    e.preventDefault();
  });

  document.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    currentX = e.clientX;
    const diff = currentX - startX;
    this.track.style.transform = `translateX(${startTranslate + diff}px)`;
  });

  document.addEventListener('mouseup', () => {
    if (!isDragging) return;
    isDragging = false;
    this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1)';
    
    const diff = currentX - startX;
    if (Math.abs(diff) > 50) {
      if (diff < 0) {
        this.nextSlide();
      } else {
        this.previousSlide();
      }
    } else {
      this.animateToSlide(this.currentSlide);
    }
  });
}

getCurrentTranslate() {
  const style = window.getComputedStyle(this.track);
  const matrix = new DOMMatrix(style.transform);
  return matrix.m41;
}
  
  goToSlide(index) {
    if (this.isAnimating || index === this.currentSlide || index < 0 || index >= this.totalSlides) {
      return;
    }
    
    this.isAnimating = true;
    this.currentSlide = index;
    
    // Update active states
    this.slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === this.currentSlide);
    });
    
    this.menuItems.forEach((item, i) => {
      item.classList.toggle('active', i === this.currentSlide);
    });
    
    this.animateToSlide(index);
    
    setTimeout(() => {
      this.isAnimating = false;
    }, 600);
  }
  
  animateToSlide(index) {
    const slide = this.slides[0];
    const style = window.getComputedStyle(this.track);
    const gap = parseInt(style.gap) || 50;
    const slideWidth = slide.getBoundingClientRect().width;
    const offset = -index * (slideWidth + gap);
    
    this.track.style.transform = `translateX(${offset}px)`;
  }
  
  nextSlide() {
  if (this.isAnimating) return;
  
  this.isAnimating = true;
  this.currentSlide++;
  
  const slide = this.slides[0];
  const style = window.getComputedStyle(this.track);
  const gap = parseInt(style.gap) || 50;
  const slideWidth = slide.getBoundingClientRect().width;
  const offset = -this.currentSlide * (slideWidth + gap);
  
  this.track.style.transform = `translateX(${offset}px)`;
  
  // Αν φτάσαμε στα clones, πήγαινε στην αρχή χωρίς animation
  if (this.currentSlide >= this.totalSlides) {
    setTimeout(() => {
      this.track.style.transition = 'none';
      this.currentSlide = 0;
      this.track.style.transform = `translateX(0px)`;
      
      setTimeout(() => {
        this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1)';
      }, 50);
    }, 600);
  }
  
  // Update menu
  const menuIndex = this.currentSlide % this.totalSlides;
  this.menuItems.forEach((item, i) => {
    item.classList.toggle('active', i === menuIndex);
  });
  
  this.slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === menuIndex);
  });
  
  setTimeout(() => {
    this.isAnimating = false;
  }, 650);
}

previousSlide() {
  if (this.isAnimating) return;
  
  // Αν είμαστε στην αρχή, πήγαινε στο τέλος χωρίς animation πρώτα
  if (this.currentSlide === 0) {
    this.track.style.transition = 'none';
    this.currentSlide = this.totalSlides;
    
    const slide = this.slides[0];
    const style = window.getComputedStyle(this.track);
    const gap = parseInt(style.gap) || 50;
    const slideWidth = slide.getBoundingClientRect().width;
    const offset = -this.currentSlide * (slideWidth + gap);
    
    this.track.style.transform = `translateX(${offset}px)`;
    
    setTimeout(() => {
      this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1)';
      this.currentSlide--;
      const newOffset = -this.currentSlide * (slideWidth + gap);
      this.track.style.transform = `translateX(${newOffset}px)`;
    }, 50);
  } else {
    this.isAnimating = true;
    this.currentSlide--;
    
    const slide = this.slides[0];
    const style = window.getComputedStyle(this.track);
    const gap = parseInt(style.gap) || 50;
    const slideWidth = slide.getBoundingClientRect().width;
    const offset = -this.currentSlide * (slideWidth + gap);
    
    this.track.style.transform = `translateX(${offset}px)`;
  }
  
  // Update menu
  const menuIndex = this.currentSlide % this.totalSlides;
  this.menuItems.forEach((item, i) => {
    item.classList.toggle('active', i === menuIndex);
  });
  
  this.slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === menuIndex);
  });
  
  setTimeout(() => {
    this.isAnimating = false;
  }, 650);
}
  
  isInViewport() {
    const rect = this.carousel.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  window.servicesCarousel = new ServicesCarousel();
});
            </script>
    </head>
    <body <?php body_class(); ?>>
<?php if (is_front_page()) : ?>
    <header class="home-header">
        <nav>
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'dropdown'
            )); ?>
        </nav>
        <div class="container">
            <div class="text">
                A web design and development 
                agency in Athens
            </div>
            <div class="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg" alt="Nedahost">
            </div>
        </div>
    </header>
<?php else : ?>
    <header class="page-header">
        <div class="container">
            <div class="page-header__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-small.svg" alt="Nedahost">
                </a>
            </div>
            <nav>
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'dropdown'
                )); ?>
            </nav>
        </div>
    </header>
<?php endif; ?>
<main>