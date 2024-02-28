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
                        <li>
                            <a href="http://">
                                web design
                            </a>
                        </li>
                        <li>
                            <a href="http://">
                                web development
                            </a>
                        </li>
                        <li>
                            <a href="http://">
                                cms & platforms
                            </a>
                        </li>
                    </ul>
                    <p>
                        <?php the_content(); ?> 
                    </p>
                </li>
                <?php endwhile;  endif; ?>
            </ul>
            <div class="outerservices__btn"><!-- contact button start -->
                <a href="" class="button">
                    Δείτε τις υπηρεσίες μας
                </a>
            </div><!-- contact button end -->
        </section><!-- outer services end -->


        <section class="outercompany"><!-- outer company start -->
            <div class="outercompany__title"><!-- title section start -->
                <h2>About us</h2>
                <span class="spanline">Ποιοί είμαστε</span>
            </div><!-- title section end -->
            <div class="outercompany__description">
                <?php 
                $page_id = 20;
                $page_data = get_page($page_id);
                echo apply_filters('the_content', $page_data->post_content);
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
                    <span class="spanline">Contact</span>
                    <p>
                        Θα χαρούμε να ακούσουμε τις ιδέες σας και να 
                        σας βοηθήσουμε να τις κάνετε πραγματικότητα!
                    </p>
                </div>
                <div class="textcontact__slogan"><!-- slogan start -->
                    “Good design<br /> is good business”
                </div><!-- slogan end -->
            </div><!-- conetent contact end -->
            <div class="hmcontact"><!-- home contact stat -->
                <?php echo do_shortcode( '[contact-form-7 id="441" title="home contact"]'); ?>
            </div><!-- home contact end-->
        </section><!-- outer contact end -->

<?php get_footer();