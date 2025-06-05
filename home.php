<?php get_header(); ?>

    <section class="outerwelcome"><!-- outer welcome start -->
        <div class="container"><!-- container start -->
            <div class="hometext">
                <div class="hometext__title"><!-- title start -->
                    Ποιοι είμαστε
                </div><!-- title end -->
                <div class="hometext__content"><!-- content start -->
                Η Nedahost ιδρύθηκε το 2016, είναι μια εταιρεία σχεδιασμού και ανάπτυξης ιστοσελίδων. Παρόλο το μικρό διάστημα λειτουργίας μας, διαθέτουμε πάνω από 10 χρόνια εμπειρία στο προγραμματισμό, τη σχεδίαση και τη προώθηση ιστοσελίδων, παρέχοντας ολοκληρωμένες λύσεις για κάθε επιχείρηση.
                </div><!-- content end -->
            </div>
        </div><!-- container end -->
    </section><!-- outer welcome end -->

    <section class="services">
    <div class="container">
        <!-- Title & Menu inside container -->
        <div class="services__header">
            <div class="services__title">
                <h2>Services</h2>
            </div>
            
            <nav class="services__menu">
                <ul>
                    <li><a href="#" data-slide="0" class="active">Discovery</a></li>
                    <li><a href="#" data-slide="1">Strategy</a></li>
                    <li><a href="#" data-slide="2">Design</a></li>
                    <li><a href="#" data-slide="3">Development</a></li>
                    <li><a href="#" data-slide="4">Launch</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <!-- Carousel OUTSIDE container for full-width -->
    <div class="services__carousel">
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Slide 1 - Discovery -->
                <div class="carousel-slide active" data-slide="0">
                    <div class="slide-content">
                        <div class="slide-image">
                            <img src="discovery-image.jpg" alt="Discovery">
                        </div>
                        <div class="slide-info">
                            <h3>Web services</h3>
                            <span class="slide-number">01</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 - Strategy -->
                <div class="carousel-slide" data-slide="1">
                    <div class="slide-content">
                        <div class="slide-image">
                            <img src="strategy-image.jpg" alt="Strategy">
                        </div>
                        <div class="slide-info">
                            <h3>Digital Marketing</h3>
                            <span class="slide-number">02</span>
                            <p>Comprehensive digital marketing strategies...</p>
                        </div>
                    </div>
                </div>
                
                <!-- More slides... -->
                <div class="carousel-slide" data-slide="2">
                    <div class="slide-content">
                        <div class="slide-image">
                            <img src="design-image.jpg" alt="Design">
                        </div>
                        <div class="slide-info">
                            <h3>UI/UX Design</h3>
                            <span class="slide-number">03</span>
                            <p>Creative design solutions...</p>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-slide" data-slide="3">
                    <div class="slide-content">
                        <div class="slide-image">
                            <img src="development-image.jpg" alt="Development">
                        </div>
                        <div class="slide-info">
                            <h3>Development</h3>
                            <span class="slide-number">04</span>
                            <p>Custom development solutions...</p>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-slide" data-slide="4">
                    <div class="slide-content">
                        <div class="slide-image">
                            <img src="launch-image.jpg" alt="Launch">
                        </div>
                        <div class="slide-info">
                            <h3>Launch & Support</h3>
                            <span class="slide-number">05</span>
                            <p>Complete launch and ongoing support...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation arrows -->
        <div class="carousel-nav">
            <button class="carousel-prev" aria-label="Previous slide">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
            </button>
            <button class="carousel-next" aria-label="Next slide">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" fill="none"/>
                </svg>
            </button>
        </div>
    </div>
</section>

    <section class="work"><!-- work start -->
        <div class="work__title"><!-- work title start -->
            <h3>WORK</h3>
        </div><!-- work title end -->
        <div class="container"><!-- container start -->
            <div class="listprojects"><!-- list projects start -->
                <ul>
                    <li>
                        <a href="http://">
                            <figure>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/opson.jpg" alt=""> 
                                <figcaption>
                                    Opson website
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <a href="http://">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/opson.jpg" alt=""> 
                                        <figcaption>
                                            Opson website
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a href="http://">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/opson.jpg" alt=""> 
                                        <figcaption>
                                            Opson website
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <a href="http://">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/opson.jpg" alt=""> 
                                        <figcaption>
                                            Opson website
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                            <li>
                                <a href="http://">
                                    <div class="right-box">
                                        <span class="plus-symbol">+</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- list projects end -->
        </div><!-- container end -->
    </section><!-- work end -->

    <section class="outercontact"><!-- outer contact star -->
        <div class="container">
            <h3>
                CONTACT
            </h3>
            <div>

            </div>
        </div>
    </section><!-- outer contact end -->

<?php get_footer();