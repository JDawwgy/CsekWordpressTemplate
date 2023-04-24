<?php get_header(); ?>

<? get_template_part('template-parts/posts-archive-header'); ?>



<section class="bg-white alignfull mb-0 ">
<div class="container mx-auto pb-16 ">
		<? get_template_part('template-parts/blog-menu-select'); ?>
			<div class="blog-posts lg:flex flex-wrap flex-auto relative lg:-mt-44 " data-total-pages='<?=ceil(	wp_count_posts()->publish/10)?>'>
		<?php
			
	    $featured=true;
		foreach( $posts as $post ):
			
			get_template_part('template-parts/archive-excerpt-post',null,['post'=>$post,'featured'=>$featured]);
			$featured=false;
			
	    endforeach; ?>
		</div>
		<? if(ceil(	wp_count_posts()->publish/10)>1){ ?>
			
			<div class='read-more blogs relative '>
				
				<?=get_template_part('template-parts/blocks/link-buttons',null,['links'=>
				[
					[
						'button_style'=>"btn-text-small",
						'link'=>['title'=>"Load More",'url'=>get_the_permalink( $post )]
					],
				],
				'wrapper_class'=>'justify-center pt-4']);?>
			</div>
		<? } ?>
</div>

</section>

<?php
get_footer();
