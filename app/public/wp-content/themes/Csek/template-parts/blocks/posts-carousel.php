<?php

	// create $vars based on key -> name of passed $args variable
	extract($args);
	// extract some commonly used gute/acf block fields
	include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );


	// get block title
	if(empty($title)){
		$title = get_field('title');
	}

	if(empty($content)){
		$content = get_field('content');
	}
	if(empty($links)){
		$links = get_field('links');
	}

	// get the post type from acf fields or args that we will be querying
	if(empty($post_type)){
		$post_type = get_field('post_type');
	}

	// if post_query is empty from args, lets query
	if(empty($posts_query)){

		$post_args = array(
			'post_type' => $post_type,
			'posts_per_page' => 6,

		);

		if(!empty($selected_posts)){
			$post_args['post__in']=$selected_posts;
		}


		$posts_query = new WP_Query( $post_args );
	}





	if ( $posts_query->have_posts() ) : ?>

		<section class='posts-carousel-wrapper alignfull has-<?=$post_type?> <?=$colour_treatment?> py-28' >

			<div class='container mx-auto'>

				<div class="flex object-center content-center items-center flex-col md:flex-row ">
				   <div class="w-full md:w-3/4">
							<div class="md:py-8">
							  	<?
								  if(!empty($title)){
									  echo '<h2>'.$title.'</h2>';
								  }

								?>
								<div class="text-xl pt-4">
									  <?=$content;?>
								</div>

							</div>
				  </div>
					<div class="w-full md:w-1/4 flex-end">
						<?
							get_template_part('template-parts/blocks/link-buttons',null,['links'=>get_field('links'),'wrapper_class'=>'mt-4  mb-8']);
						?>
					</div>
				</div>
				  <div class="  w-full  ">

						<div class="posts-list peek-a-boo ">

							<?php

								while ( $posts_query->have_posts() ) : $posts_query->the_post();

									// load post, with post_type option
	  							 	get_template_part('template-parts/posts-carousel-slide',$post_type);

								endwhile;

							?>
						</div>
					</div>

			</div>
		</section>
	<?php
	endif; wp_reset_query();

?>
