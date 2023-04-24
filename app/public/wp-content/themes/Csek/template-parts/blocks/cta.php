<?
$title = get_field('title');
$content = get_field('content');
$link = get_field('link');
$bgImage = get_field('background_image');
?>

<section class="my-12 alignfull py-20 bg-no-repeat bg-cover bg-center relative" style="background-image: url('<?=$bgImage?>')">
	<div id="overlay"></div>
	
	<div class="container mx-auto relative text-center">
		<h2 class="text-5xl text-white uppercase"><?=$title?></h2>
		<div class="mb-12 text-white w-10/12 md:w-1/2 mx-auto"><?=$content?></div>
		
		<?
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
		
	</div>
</section>
