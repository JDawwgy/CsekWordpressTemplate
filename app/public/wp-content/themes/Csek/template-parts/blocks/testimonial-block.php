<?php
	/**
	 * Block Name: Media Block
	 *
	 * This is the template that displays the Media block.
	 */
	
	// get fields
	
	

	$block_orientation = get_field('block_orientation');

	
	
	// create id attribute for specific styling
	$id =  $block['id'];
	




?>



<section class="wp-block-columns  testimonial-block image-normal media-right" id="<?=$id?>" >

	
	<div class="wp-block-column has-media">
	
			<?
			
				include plugin_dir_path( __FILE__ ) . 'content-mediablock-image-normal.php';
			?>
			
		
	</div>
	
	
	
	<div class="wp-block-column has-content  ">
		<div class="inner ">

		

		<?
			include plugin_dir_path( __FILE__ ) . 'testimonial-slides.php';
		
		?>
		
		
		</div>
	</div>



	
	
	
</section>



