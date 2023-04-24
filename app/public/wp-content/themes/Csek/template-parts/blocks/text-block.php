<?php
	/**
	 * Block Name: Text Block
	 *
	 * This is the template that displays the Media block.
	 */
	
	// get fields
	include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );

	$content = get_field('content');  
	
	
	$links = get_field('links');
	

	$colour_treatment = get_field('colour_treatment');
	
	
	if($block_style=='one-column-icons'){
		$icons = get_field('icons');
	}


	// create id attribute for specific styling
	$id = $block['id'];
	


?>



<section class="text-block  <?=$block_style?> alignfull <?=$colour_treatment?>  <?=$block_top_padding?> <?=$block_bottom_padding?> " id="<?=$id?>">
	
	
	<div class="container mx-auto lg:px-40">

	

	
	
		<?=$content?>


		<?
			get_template_part('template-parts/blocks/link-buttons',null,['links'=>get_field('links'),'wrapper_class'=>'flex justify-center']);
			
			
		?>
		
	

	</div>
	
	
</section>



