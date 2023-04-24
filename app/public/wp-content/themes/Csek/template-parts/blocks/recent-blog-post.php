<?
	$category=get_the_category();
	if(empty(get_the_post_thumbnail())){
		$image_status="no-image";
	}else{
		$image_status="";
	}
?>
<div class="recent-post <?=$image_status?>">

	<div class="wp-block-latest-posts__featured-image aligncenter">

		<a  href="<?php the_permalink(); ?>">
			<?php  the_post_thumbnail('medium-landscape-cropped'); ?>

		</a>
	</div>
	<div class='blog-post-details' onclick="window.location='<?php the_permalink(); ?>'">
		<a href='<?=get_term_link($category[0]->term_id)?>' class='blog-post-category'><?=$category[0]->name?></a><br>
		<a href="<?php the_permalink(); ?>"  class='blog-post-title'><? the_title(); ?></a>
		<div class='wp-block-buttons btn has-btn-filled'><a href="<?php the_permalink(); ?>"  class='wp-block-button__link btn-filled'>Read more</a></div>
	</div>

</div>
