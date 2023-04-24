<div class="post-body lg:w-7/12 ">
	<?
	if ( has_post_thumbnail() ) {
		echo '';
	}
	else {
		get_template_part('template-parts/single-post--header-no-image');

	}
	?>
	<?php the_content(); ?>
</div>
