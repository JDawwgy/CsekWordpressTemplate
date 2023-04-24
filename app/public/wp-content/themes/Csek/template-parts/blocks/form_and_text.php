<?php
	/**
	 * Block Name: Text Block with Form
	 *
	 * This is the template that displays the Text Block with Form
	 */

	// get fields
	include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );

	$heading = get_field('form_heading');

	$content = get_field('content');

  $colour_treatment = get_field('colour_treatment');

	$links = get_field('links');


	$background_image = get_field('background_image');


	if($block_style=='one-column-icons'){
		$icons = get_field('icons');
	}


	// create id attribute for specific styling
	$id = $block['id'];



?>



<section class="text-block-with-form  <?=$block_style?> <?=$colour_treatment?> alignfull relative bg-dark lg:bg-transparent" id="<?=$id?>">
	<div class='absolute left-0 top-o right-0 z-0 h-full'>
		<? echo wp_get_attachment_image($background_image,'full',false,['class'=>'w-full object-cover h-full']); ?>
		<div class='scrim z-1 absolute inset-0 z-2'></div>
	</div>
	<div class="container mx-auto flex flex-col sm:flex-row relative z-1   <?=$block_top_padding?> <?=$block_bottom_padding?> <?=$block_orientation?>">


		<div class='w-full order-2  pt-24 '>
			<div class="form-bg p-8 rounded-xl shadow-xl">
				<h3 class="text-primary"><?=$heading;?></h3>
 				<?
					echo do_shortcode('[gravityform id="'.get_field('gravity_form_id').'"  title="false" description="false" ajax="true"]');
				?>
			</div>
		</div>

		<div class='w-full order-1 '>
			<div class="lg:pt-32 pr-8">
				<?=$content?>

				<?
					get_template_part('template-parts/blocks/link-buttons',null,['links'=>get_field('links'),'wrapper_class'=>'justify-center']);
				?>
			</div>
		</div>

	</div>


</section>
