<?
// Post ID is in $_POST['post_id'] when rendering ACF block in Gutenberg
$post_id = get_the_ID() ? get_the_ID() : $_POST['post_id'];

$title = get_field( 'title' );
if( empty( $title  ) )
	$title = get_the_title( $post_id );

$type  = get_field( 'type' );
$sub_title = get_field( 'sub_title' );

$image = get_field( 'image' );
$video = get_field('video');
$content_alignment = get_field('content_alignment');

$type = get_field( 'type' );

$background_colour="";
$logo="";
$pageColor = get_field('page_color', get_the_ID());

if (get_field('height') == "Tall") {
	$height = "70";
} else if (get_field('height') == "Short") {
	$height = "50";
}

$link  = get_field('link');


// cleaning of video link for background usage
if ( preg_match('/src="(.+?)"/', $video, $matches) ) {
	// Video source URL
	$src = $matches[1];

	// Add option to hide controls, enable HD, and do autoplay -- depending on provider
	$params = array(
		'playsinline' => 1,
		'controls'    => 0,
		'hd'  => 1,
		'autoplay' => 1,
		'background' => 1,
		'loop' => 1,
		'byline' => 0,
		'title' => 0,
						'muted' => 1
					
	);

	$new_src = add_query_arg($params, $src);

	$video = str_replace($src, $new_src, $video);

	// add extra attributes to iframe html
	$attributes = 'frameborder="0" autoplay muted loop playsinline webkit-playsinline';

	$video = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video);
}
	$block_style="";

	if(is_front_page()){
		$block_style=" is_homepage";

	}else{
		$block_style=" is_secondary_page";
	}
	if( empty( $image ) )
		$image = get_option( 'options_ea_default_header' );

	if (get_field('height') == "Tall") {
		$height = "80";
	} else if (get_field('height') == "Short") {
		$height = "60";
	}

	// create id attribute for  specific styling
	$id = $block['id'];

// echo '<section class="header-block alignfull mt-0 h-screen overflow-hidden relative '.$block_style.' '.$type.' '.$content_alignment.' bg-dark '.$background_colour.'  animate" id="'.$id.'"> ';
	//echo"<div class='block-header-inner'>";
	
	if (!empty($video)) {
		echo '<section class="header-block alignfull mt-0 h-screen overflow-hidden relative '.$block_style.' '.$type.' '.$content_alignment.' bg-dark '.$background_colour.'  animate" id="'.$id.'"> ';
		
		echo '<div class="block-header__video">';
			echo '<div class="video-container">';
				echo $video;
			echo"</div>";
		echo '</div>';
		
	} else if ($type=='has-image-slides') {
		
		echo '<section class="header-block alignfull mt-0 overflow-hidden relative mobile-height '.$block_style.' '.$type.' '.$content_alignment.' '.$background_colour.'  animate" id="'.$id.'" style="height: '.$height.'vh;"> ';
		
		if( have_rows('image_slideshow') ): ?>
			<div class="slides h-full w-full">
				<?php while( have_rows('image_slideshow') ): the_row(); 
					
					$image = get_sub_field('slide_image');
					?>
					<img class="w-full object-cover" style="height: <?=$height?>vh;" src="<?=$image?>" />
					
				<?php endwhile; ?>
			</div>
		<?php endif; 
	}
	
	echo '<div id="overlayLight"></div>';
	
	echo '<div class="absolute h-full w-full flex flex-col justify-center top-0">';
		echo '<div class="container mx-auto text-white">';
			
			echo '<h1 class="text-4xl uppercase">' . $title .'</h1>';
			if (!empty($sub_title)) {
				echo '<h2 class="text-lg pb-20">' . $sub_title .'</h2>';
			}
			
			if(!empty($link)) { ?>
				<?
				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			<? }
			
		echo '</div>';
	echo '</div>';
	
	if($type=='has-form'){
		if ( get_field('form_id') ) {
			echo '<div class="block-header__form">';
				echo do_shortcode( '[gravityform id="'.get_field('form_id').'" title="false" description="false" ajax="true"]');
			echo"</div>";
		}
	}
echo '</section>'; ?>
