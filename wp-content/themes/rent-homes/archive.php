<?php get_header(); ?>
<h2><?php the_archive_title(); ?></h2>
<ul class="properties-listing">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part( 'template-parts/post', 'date'); ?> 

<?php endwhile; ?>
</ul>
<?php else : ?>  
        
        <?php _e( 'Not found posts', 'rent' ); ?>
<?php posts_nav_link(); ?>

<?php endif; ?>


<?php get_footer(); ?>