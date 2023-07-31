<?php get_header(); ?>

        <?php if(have_posts()): ?>
        <?php get_template_part('template-parts/post/content', 'page'); ?>
        <?php else: ?>

        <?php endif; ?>
        <
<?php get_footer(); 