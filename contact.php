<?php get_header(); ?>  
    <div class="wrapper"><!-- wrapper start -->
        <div class="container"><!-- container start -->
            <?php if(have_posts()): ?>
            <?php get_template_part('template-parts/post/content', 'page'); ?>
            <?php else: ?>

            <?php endif; ?>
            <div class="clear_0"></div>
        </div><!-- container end -->
    </div><!-- wrapper end -->
<?php get_footer();