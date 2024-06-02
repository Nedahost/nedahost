<?php get_header(); ?>
<section class="outerservices"><!-- outer services start -->
    <div class="outerservices__title"><!-- title section start -->
        <h2>Services</h2>
        <span class="spanline">Τι προσφέρουμε</span>
    </div><!-- title section end -->
            <ul class="outerservices__list"><!-- list services start -->
            <?php 
                $services = array(
                    'posts_per_page' => 4,
                    'post_type' => 'nedahost_services',
                    'meta_key' => '',
                    'meta_value' => '0',
                    'meta_compare' => '>=',
                    'orderby' => '', 
                    'order' => 'ASC'
                );
                $wc_query = new WP_Query($services);
                if ($wc_query->have_posts()) :
                while ($wc_query->have_posts()) : $wc_query->the_post();
                $show_on_frontpage = get_post_meta(get_the_ID(), 'show_on_frontpage', true);
                if ($show_on_frontpage == 1) {
            ?>
                <li>
                    <figure>
                    <a href="<?php // echo get_permalink(); ?>">
                        <?php // the_post_thumbnail('image_slide'); 
                        $attr = array(
                        //'class' => 'rss_thumb'
                        );
                        $thumb = get_the_post_thumbnail($post->ID );
                        echo $thumb; 
                        ?> 
                    </a>
                    </figure>
                    <h3>
                        <a href="<?php //echo get_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <ul class="sublisting">
                    <?php 
                            // Δυναμική εμφάνιση πεδίων
                            for ($i = 1; $i <= 3; $i++) {
                                $extra_field_value = get_post_meta(get_the_ID(), 'extra_field_' . $i, true);
                                $extra_field_link_value = get_post_meta(get_the_ID(), 'extra_field_' . $i . '_link', true);
                                
                                // Έλεγχος για την τιμή του link
                                $link = !empty($extra_field_link_value) ? esc_url($extra_field_link_value) : '#';
                                
                                if (!empty($extra_field_value)) {
                                    echo '<li>';
                                    echo '<a href="' . $link . '">' . esc_html($extra_field_value) . '</a>';
                                    echo '</li>';
                                }
                            }
                        ?>
                    </ul>
                    <p>
                        <?php the_content(); ?> 
                    </p>
                </li>
                <?php } endwhile;  endif; ?>
            </ul>
            <div class="outerservices__btn"><!-- contact button start -->
                <a href="" class="button">
                    Δείτε τις υπηρεσίες μας
                </a>
            </div><!-- contact button end -->
        </section><!-- outer services end -->


        <section class="outercompany"><!-- outer company start -->
            <div class="outercompany__title"><!-- title section start -->
                <h2>Welcome</h2>
                <span class="spanline">Καλώς ήρθατε στη Nedahost!</span>
            </div><!-- title section end -->
            <div class="outercompany__description">
            <?php
                 $existing_content = get_option('custom_content');
                 echo wpautop($existing_content); 
            ?>
            </div>
            <div class="outercompany__slogan"><!-- outer company slogan start -->
                <p>
                    Ας συνεργαστούμε για να σας οδηγήσουμε στην επιτυχία που αξίζετε! 
                </p>
            </div><!-- outer company slogan end -->
        </section><!-- outer company end-->

        <section class="hmprojects"><!-- home projects start -->
            <div class="hmprojects__title"><!-- title section start -->
                <h2>PROJECTS</h2>
                <span class="spanline" >Οι δουλειές μας</span>
            </div><!-- title section end -->
            <ul class="hmprojects__list">
                <?php 
                $proteinomena = array(
                    'posts_per_page' => 4,
                    'post_type' => 'nedahost_projects',
                    'meta_key' => 'nedahost_checklove',
                    'meta_value' => '0',
                    'meta_compare' => '>=',
                    'orderby' => 'nedahost_meta_value_num', 
                    'order' => 'DESC'
                );
                $wc_query = new WP_Query($proteinomena);
                if ($wc_query->have_posts()) :
                while ($wc_query->have_posts()) : $wc_query->the_post();
                $nedahost_number = get_post_meta($post->ID, 'nedahost_number', true);
                ?>
                <li>
                    <div class="hmprojectsimg"><!-- home projects image start -->
                        <figure>
                            <a href="<?php //echo get_permalink(); ?>">
                                <?php // the_post_thumbnail('image_slide'); 
                                $attr = array(
                                //'class' => 'rss_thumb'
                                );
                                $thumb = get_the_post_thumbnail($post->ID );
                                echo $thumb; 
                                ?> 
                            </a>
                        </figure>
                    </div><!-- home projects image end -->
                    <div class="hmprojectdetails"><!-- home projects details start -->
                        <div class="hmprojectdetails__number">
                            Branding / Website
                        </div>
                        <div class="hmprojectdetails__title"><!-- title start -->
                            <a href="<?php //echo get_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </div><!-- title end -->
                    </div><!-- home projects details end-->
                    
                </li>
                <?php endwhile;  endif; ?>
            </ul>
            <div class="hmprojects__bttn"><!-- see more project start -->
                <a href="" class="button">
                    Δείτε περισσότερα
                </a>
            </div><!-- see more project end -->
        </section><!-- home projects end -->

        <section class="outercontact"><!-- outer contact star -->
            <div class="textcontact"><!-- conetent contact start -->
             
                <div class="textcontact__title"><!-- title start -->
                    <span class="spanline">Frequently
            Asked
            Questions</span>
                    
                    <p>
                    Έχετε κάποια ερώτηση; Θα χαρούμε να σας βοηθήσουμε! <a href="#">Επικοινωνείστε μαζί μας</a>
                    </p>
                </div>
                <div class="textcontact__slogan"><!-- slogan start -->
                    “Good design<br /> is good business”
                </div><!-- slogan end -->
            </div><!-- conetent contact end -->
            <div class="outerfaq"><!-- outer faq stat -->
                <div class="accordion"><!-- accordion start -->
                    <?php
                        $faq_items = get_option('nedahost_faq_items', array());
                        foreach ($faq_items as $index => $item) :
                        ?>
                            <div class="accordion-item">
                                <div class="accordion-title">
                                    <span class="title-text"><?php echo esc_html($item['question']); ?></span>
                                    <span class="accordion-icon"></span>
                                </div>
                                <div class="accordion-content">
                                    <?php echo wp_kses_post($item['answer']); ?>
                                </div>
                            </div>
                    <?php endforeach; ?>
                </div><!-- accordion end -->
            </div><!-- outer faq end-->
        </section><!-- outer contact end -->

<?php get_footer();