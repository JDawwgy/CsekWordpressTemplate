<?php get_header(); ?>

	<div class="container mt-8 mx-auto">
		
		<?php if ( have_posts() ) : ?>
			
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				
				<?php get_template_part( 'template-parts/content', 'post' ); ?>
				
				
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
	</div>

<?php
get_footer();
