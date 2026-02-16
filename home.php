<?php get_header(); ?>

<section class="outerwelcome"><!-- outer welcome start -->


    <div class="container"><!-- container start -->
        <div class="hometext">
            <div class="hometext__title"><!-- title start -->
                Ποιοι είμαστε
            </div><!-- title end -->
            <div class="hometext__content"><!-- content start -->
                Η <b>Nedahost</b> ιδρύθηκε το 2016 με στόχο την παροχή υπηρεσιών υψηλού επιπέδου στον <b>σχεδιασμό</b>, 
                <b>την ανάπτυξη και την προώθηση ιστοσελίδων</b>. Με μια πορεία που στηρίζεται σε περισσότερα 
                από <b>15 χρόνια ενασχόλησης με τον προγραμματισμό</b>, εγγυόμαστε τεχνικά άρτια 
                αποτελέσματα και ολοκληρωμένες λύσεις που βοηθούν κάθε επιχείρηση να ξεχωρίσει στον 
                ψηφιακό κόσμο και να ενισχύσει ουσιαστικά την παρουσία της.
                <a href="#" class="hometext__arrow">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Arrow.png" alt="Arrow">
                </a>
            </div><!-- content end -->
        </div>
    </div><!-- container end -->
</section><!-- outer welcome end -->




    <section class="services">
    <div class="container">
    <div class="services__title"><!-- work title start -->
            <h3>SERVICES</h3>
        </div><!-- work title end -->
        <div class="services__header">
            <nav class="services__menu">
                <ul>
                    <?php
                    $services = new WP_Query(array(
                        'post_type' => 'nedahost_services',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'meta_key' => 'show_on_frontpage',
                        'meta_value' => '1'
                    ));
                    
                    $index = 0;
                    if ($services->have_posts()) :
                        while ($services->have_posts()) : $services->the_post();
                    ?>
                        <li>
                            <a href="#" data-slide="<?php echo $index; ?>" <?php echo $index === 0 ? 'class="active"' : ''; ?>>
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php 
                        $index++;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="services__carousel">
        <div class="carousel-track">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'nedahost_services',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'meta_key' => 'show_on_frontpage',
                'meta_value' => '1'
            ));
            
            $index = 0;
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $number = get_post_meta(get_the_ID(), 'service_number', true);
                    $color = get_post_meta(get_the_ID(), 'service_color', true);
                    $text_color = get_post_meta(get_the_ID(), 'text_color', true);
                    $text_class = ($text_color === 'dark') ? 'text-dark' : 'text-light';
                    $link = get_post_meta(get_the_ID(), 'service_link', true);
            ?>
                <div class="carousel-slide <?php echo $text_class; ?>" data-slide="<?php echo $index; ?>" <?php echo $color ? 'style="background-color: ' . esc_attr($color) . ';"' : ''; ?>>
                    <div class="card-main">
                        <div class="card-visual">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="card-circle"></div>
                            <?php endif; ?>
                        </div>
                        <div class="card-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                    $card_title = get_post_meta(get_the_ID(), 'card_title', true);
                    $display_title = !empty($card_title) ? $card_title : get_the_title();
                    ?>

                    <div class="card-footer">
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link); ?>">
                                <h2 class="card-title"><?php echo esc_html($display_title); ?></h2>
                            </a>
                        <?php else : ?>
                            <h2 class="card-title"><?php echo esc_html($display_title); ?></h2>
                        <?php endif; ?>
                        <div class="card-number"><?php echo esc_html($number); ?></div>
                    </div>
                </div>
            <?php 
                $index++;
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        
        <div class="carousel-navigation">
            <button class="carousel-prev">←</button>
            <button class="carousel-next">→</button>
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