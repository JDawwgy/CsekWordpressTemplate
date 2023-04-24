<?
$layout = get_field('layout');
$image = get_field('image');
$title = get_field('title');
$subtitle = get_field('sub_title');
$content = get_field('content');
$link = get_field('link');

if ($layout == 'Content Left, Image Right') {
	$halfContainer = 'left-half';
	$margin = 'pr-8';
	$imagePos = "order-first md:order-last";
} else {
	$halfContainer = 'right-half';
	$margin = 'pl-8';
	$imagePos = 'order-first';
}
?>

<section>
	<div class="grid grid-cols-1 md:grid-cols-2 gap-16 py-8 md:py-16">
		<div class="my-auto md:py-8 w-full <?=$halfContainer?>">
			<? if (!empty($title)) { ?>
				<h2 class="text-5xl text-primary uppercase"><?=$title?></h2>
			<? } ?>
			
			<? if (!empty($subtitle)) { ?>
				<h2 class="text-xl text-primarydark bold"><?=$subtitle?></h2>
			<? } ?>
			
			<div><?=$content?></div>
			
			<?
			if( $link ): 
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
				<div class="mb-12">
					<a class="btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				</div>
			<?php endif; ?>
		</div>
		
		<div class="w-full relative h-full my-auto <?=$imagePos?>">
			<img class="h-full object-cover rounded-2xl" src="<?=$image?>" />
			<div class="rounded-2xl" id="overlay"></div>
		</div>
	</div>
</section>