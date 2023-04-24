<?
$title = get_field('title');
$subTitle = get_field('sub_title');
$content = get_field('content');
$link = get_field('button');
?>

<section class="alignfull content-block py-16">
	<div class="container mx-auto">
		
		<? if(!empty($title)) { ?>
			<h2 class="text-secondary text-3xl title"><?=$title?></h2>
		<? } 
		
		if(!empty($subTitle)) { ?>
			<h3 class="text-2xl"><?=$subTitle?></h3>
		<? } 
		
		if(!empty($content)) { ?>
			<div class="content"><?=$content?></div>
		<? } 
		
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<a class="btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
	</div>
</section>