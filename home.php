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
    <div class="container"><!-- container start -->
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
    </div><!-- container end -->
    
 
    <div class="services__carousel">
        <div class="carousel-container">
            <div class="carousel-track">

                         
                    <div class="carousel-slide" data-slide="0"><!--slider start -->
                        <div class="card-main"><!-- card main start -->
                            <div class="card-visual">
                                <div class="card-circle"></div>
                            </div>
                            
                            <div class="card-text">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore 
                                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam 
                                    et justo duo dolores et ea rebum. Stet clita kasd gubergren, no 
                                    sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum 
                                    dolor sit amet
                            </div>
                        </div><!-- card main end -->
                        
                        <div class="card-footer">
                            <h2 class="card-title">Web services</h2>
                            <div class="card-number">01</div>
                        </div>
                    </div><!--slider end -->

                    <div class="carousel-slide" data-slide="1"><!--slider start -->
                        <div class="card-main"><!-- card main start -->
                            <div class="card-visual">
                                <div class="card-circle"></div>
                            </div>
                            
                            <div class="card-text">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore 
                                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam 
                                    et justo duo dolores et ea rebum. Stet clita kasd gubergren, no 
                                    sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum 
                                    dolor sit amet
                            </div>
                        </div><!-- card main end -->
                        
                        <div class="card-footer">
                            <h2 class="card-title">Web services</h2>
                            <div class="card-number">02</div>
                        </div>
                    </div><!--slider end -->
        
            </div>
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
            <div class="outercontact__title"><!-- title start -->
                <h3>
                    CONTACT
                </h3>
            </div><!-- title end -->
            
            <div class="home_form"><!-- home form start -->
                <?php echo do_shortcode('[contact-form-7 id="6f76224" title="home contact"]'); ?>
            </div><!-- home form end -->
        </div>
    </section><!-- outer contact end -->

<?php get_footer();