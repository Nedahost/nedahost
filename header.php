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
    this.autoPlayInterval = null;
    this.autoPlayDelay = 5000; // 5 seconds
    
    this.init();
  }
  
  init() {
    // Cache DOM elements
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
    
    // Setup initial state
    this.setupCarousel();
    
    // Bind events
    this.bindEvents();
    
    // Start autoplay
    this.startAutoPlay();
    
    // Setup intersection observer for performance
    this.setupIntersectionObserver();
  }
  
  setupCarousel() {
    // Set initial active states
    this.slides[0]?.classList.add('active');
    this.menuItems[0]?.classList.add('active');
    
    // Setup slide positions for partial view effect
    this.updateSlidePositions();
    
    // Update navigation buttons
    this.updateNavButtons();
  }
  
  bindEvents() {
    // Menu navigation
    this.menuItems.forEach((item, index) => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        this.goToSlide(index);
      });
    });
    
    // Arrow navigation
    this.prevBtn?.addEventListener('click', () => this.previousSlide());
    this.nextBtn?.addEventListener('click', () => this.nextSlide());
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (!this.isInViewport()) return;
      
      switch(e.key) {
        case 'ArrowLeft':
          e.preventDefault();
          this.previousSlide();
          break;
        case 'ArrowRight':
          e.preventDefault();
          this.nextSlide();
          break;
      }
    });
    
    // Touch/swipe support
    this.setupTouchEvents();
    
    // Pause autoplay on hover
    this.carousel.addEventListener('mouseenter', () => this.pauseAutoPlay());
    this.carousel.addEventListener('mouseleave', () => this.startAutoPlay());
    
    // Pause autoplay when page is not visible
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        this.pauseAutoPlay();
      } else {
        this.startAutoPlay();
      }
    });
  }
  
  setupTouchEvents() {
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    
    const handleTouchStart = (e) => {
      startX = e.touches ? e.touches[0].clientX : e.clientX;
      isDragging = true;
      this.pauseAutoPlay();
    };
    
    const handleTouchMove = (e) => {
      if (!isDragging) return;
      currentX = e.touches ? e.touches[0].clientX : e.clientX;
    };
    
    const handleTouchEnd = () => {
      if (!isDragging) return;
      isDragging = false;
      
      const diffX = startX - currentX;
      const threshold = 50; // Minimum swipe distance
      
      if (Math.abs(diffX) > threshold) {
        if (diffX > 0) {
          this.nextSlide();
        } else {
          this.previousSlide();
        }
      }
      
      this.startAutoPlay();
    };
    
    // Touch events
    this.carousel.addEventListener('touchstart', handleTouchStart, { passive: true });
    this.carousel.addEventListener('touchmove', handleTouchMove, { passive: true });
    this.carousel.addEventListener('touchend', handleTouchEnd);
    
    // Mouse events for desktop drag
    this.carousel.addEventListener('mousedown', handleTouchStart);
    document.addEventListener('mousemove', handleTouchMove);
    document.addEventListener('mouseup', handleTouchEnd);
  }
  
  setupIntersectionObserver() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          this.startAutoPlay();
        } else {
          this.pauseAutoPlay();
        }
      });
    }, { threshold: 0.3 });
    
    observer.observe(this.carousel);
  }
  
  goToSlide(index, direction = 'next') {
    if (this.isAnimating || index === this.currentSlide || index < 0 || index >= this.totalSlides) {
      return;
    }
    
    this.isAnimating = true;
    
    // Update current slide
    const prevSlide = this.currentSlide;
    this.currentSlide = index;
    
    // Update active states
    this.updateActiveStates();
    
    // Animate slides
    this.animateSlides(prevSlide, direction);
    
    // Update navigation
    this.updateNavButtons();
    
    // Reset animation flag
    setTimeout(() => {
      this.isAnimating = false;
    }, 600); // Match CSS transition duration
  }
  
  updateActiveStates() {
    // Update slides
    this.slides.forEach((slide, index) => {
      slide.classList.toggle('active', index === this.currentSlide);
    });
    
    // Update menu items
    this.menuItems.forEach((item, index) => {
      item.classList.toggle('active', index === this.currentSlide);
    });
  }
  
  animateSlides(prevSlide, direction) {
    // Calculate transform value for partial view effect
    const slideWidth = this.slides[0].offsetWidth;
    const gap = 50; // Gap between slides
    const offset = -this.currentSlide * (slideWidth + gap);
    
    // Apply transform with smooth transition
    this.track.style.transform = `translateX(${offset}px)`;
    
    // Add stagger animation to slide content
    const currentSlideContent = this.slides[this.currentSlide].querySelector('.slide-content');
    if (currentSlideContent) {
      currentSlideContent.style.opacity = '0';
      currentSlideContent.style.transform = `translateY(20px)`;
      
      setTimeout(() => {
        currentSlideContent.style.transition = 'all 0.4s ease 0.2s';
        currentSlideContent.style.opacity = '1';
        currentSlideContent.style.transform = 'translateY(0)';
      }, 100);
    }
  }
  
  updateSlidePositions() {
    // Setup slides for partial view effect
    this.slides.forEach((slide, index) => {
      const offset = index * 100; // Each slide takes full width
      slide.style.transform = `translateX(${offset}%)`;
    });
  }
  
  nextSlide() {
    const nextIndex = (this.currentSlide + 1) % this.totalSlides;
    this.goToSlide(nextIndex, 'next');
  }
  
  previousSlide() {
    const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
    this.goToSlide(prevIndex, 'prev');
  }
  
  updateNavButtons() {
    if (this.prevBtn) {
      this.prevBtn.disabled = false; // Always enabled for infinite loop
    }
    if (this.nextBtn) {
      this.nextBtn.disabled = false; // Always enabled for infinite loop
    }
  }
  
  startAutoPlay() {
    this.pauseAutoPlay(); // Clear existing interval
    
    this.autoPlayInterval = setInterval(() => {
      if (!this.isAnimating && this.isInViewport()) {
        this.nextSlide();
      }
    }, this.autoPlayDelay);
  }
  
  pauseAutoPlay() {
    if (this.autoPlayInterval) {
      clearInterval(this.autoPlayInterval);
      this.autoPlayInterval = null;
    }
  }
  
  isInViewport() {
    const rect = this.carousel.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  }
  
  // Public API methods
  play() {
    this.startAutoPlay();
  }
  
  pause() {
    this.pauseAutoPlay();
  }
  
  getCurrentSlide() {
    return this.currentSlide;
  }
  
  getTotalSlides() {
    return this.totalSlides;
  }
  
  destroy() {
    this.pauseAutoPlay();
    // Remove event listeners if needed
    // Reset DOM state if needed
  }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  // Initialize carousel
  window.servicesCarousel = new ServicesCarousel();
});

// Handle page resize
let resizeTimeout;
window.addEventListener('resize', () => {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(() => {
    if (window.servicesCarousel) {
      window.servicesCarousel.updateSlidePositions();
    }
  }, 250);
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = ServicesCarousel;
}
            </script>
    </head>
    <body <?php body_class(); ?>>
        <header class="home-header">
            <nav>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class' => 'dropdown'
                    )
                );
                ?>
            </nav>
            <div class="container"><!-- container start -->

                <div class="text">
                    A web design and development 
                    agency in Athensss
                </div>
                <div class="logo"><!-- logo start -->
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.svg" alt="Nedahost">
                </div><!-- logo end -->
            </div><!-- container end -->
        </header>
        <main> 