<?php

/**
 * Social Links
 *
 */

	$post_id='option';
	if(!empty($args['id'])){
		$post_id=$args['id'];
	}

	if( have_rows('social_media', 'option') ):

		echo '<ul class="social-links flex text-right float-right">';
			  while ( have_rows('social_media', $post_id) ) : the_row();
				  $socialchannel = get_sub_field('social_channel', 'option');
				  $socialurl = get_sub_field('social_url', 'option');
				  $class='fab fa-'.$socialchannel;
				  echo '<li class="social-icon mr-3 last:mr-0">';
					  echo '<a rel="nofollow noopener noreferrer" href="' . $socialurl . '" target="_blank">';
							echo '<i class="'.$class.' w-10 h-10 rounded-full text-lg items-center flex justify-center  bg-secondary text-white hover:bg-primary"></i>';



					  echo '</a>
					</li>';
			  endwhile;
		  echo '</ul>';

  endif;
