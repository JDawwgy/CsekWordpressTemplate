<?php
	/**
	 * Block Name: Media Block
	 *
	 * This is the template that displays the Media block.
	 */

	// get fields

	include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );
	$heading = get_field('heading');
	$subheading = get_field('sub-heading');
	$description = get_field('description');

	$links = get_field('links');




	// create id attribute for specific styling
	$id =  $block['id'];

	if(!empty($subheading)){
		$heading="<small>".$subheading."</small><br>".$heading;
	}





?>



<section class="custom-media-block alignfull <?=$block_style?>  <?=$colour_treatment?> <?=$block_width?> <?=$block_top_padding?> <?=$block_bottom_padding?>" id="<?=$id?>" >
	<div class="container mx-auto md:flex  items-center <?=$block_orientation?>">

	<?
		if(in_array($block_style, ['faq'])){
			echo"<div class='wrap' style='display:flex;'>";
		}
	?>
	<div class="has-media flex-grow flex-shrink-0 md:w-7/12">

			<?

				include plugin_dir_path( __FILE__ ) . 'content-mediablock-'.$block_style.'.php';
			?>


	</div>



	<div class="has-content flex-shrink ">
		<div class="inner ">
		<? if(!empty($heading)) { ?>
			<h2><?=$heading?></h2>
		<? } ?>

		<div class="wp-block-jetpack-markdown"><?=$description?></div>

		<?
			get_template_part('template-parts/blocks/link-buttons',null,['links'=>get_field('links'),'wrapper_class'=>'justify-center']);
		?>


		</div>
	</div>


<?
if(in_array($block_style, ['faq'])){
	echo"</div>";
}
?>
	</div>


</section>
