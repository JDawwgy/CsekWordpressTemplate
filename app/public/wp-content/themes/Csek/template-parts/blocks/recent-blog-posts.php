<?php





	$settings = get_field('settings');


	$tax_query = [];

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$webinar_args = array(
			'post_type' => 'post',
			'posts_per_page' => 12,

			'paged' => $paged,
			'tax_query' => $tax_query,

		);



	// title for block. Can be set in block setup, or may be passed when included from blog post
	if(!empty($args)){
		$title=$args['title'];
		if(!empty($args['terms'])){
			$webinar_args['category_name']=$args['terms'][0]->slug;
		}
	}else{
		$title = get_field('title');
		if(!empty($title)){
			$title="<h2>".$title."</h2>";
		}

	}





	if( $settings=="custom" ){
		$posts = get_field('posts');
		if(!empty($posts)){
			$webinar_args['post__in']=$posts;
		}
	}
	$webinar_query = new WP_Query( $webinar_args );
	$id =  $block['id'];


?>


			<?php if ( $webinar_query->have_posts() ) : ?>
				<section class='recent-blog-posts-wrapper pb-28' id="<?=$id?>" >

					<div class='wrap'>
						<?
							if(!empty($title)){
								echo $title;
							}

						?>
						<div class="wp-block-latest-posts__list wp-block-latest-posts">

							<?php
								// foreach ( $query->posts as $post ) :
									$x=0;
								while ( $webinar_query->have_posts() ) : $webinar_query->the_post();
									$x++;
									include plugin_dir_path( __FILE__ ) . 'recent-blog-post.php';

								endwhile;
								// endforeach;

							?>
						</div>
 					</div>
				</section>
			<?php endif; wp_reset_query(); ?>
