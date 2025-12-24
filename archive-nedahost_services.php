<?php get_header(); ?>

<section class="services-hero">
    <div class="container">
        <h1 class="services-hero__title">SERVICES</h1>
        <p class="services-hero__subtitle">
            Our services enable us to explore incredible new possibilities through the power of intelligent data, human insight, and compelling creativity
        </p>
    </div>
</section>

<section class="services-list">
    <div class="container">
        <?php
        $services = new WP_Query(array(
            'post_type' => 'nedahost_services',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));
        
        if ($services->have_posts()) :
            while ($services->have_posts()) : $services->the_post();
                $number = get_post_meta(get_the_ID(), 'service_number', true);
        ?>
            <article class="service-item">
                <a href="<?php the_permalink(); ?>" class="service-item__link">
                    <div class="service-item__content">
                        <h2 class="service-item__title"><?php the_title(); ?></h2>
                        <p class="service-item__excerpt"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    </div>
                    <div class="service-item__arrow">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-up-right.svg" alt="Arrow">
                    </div>
                </a>
            </article>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>