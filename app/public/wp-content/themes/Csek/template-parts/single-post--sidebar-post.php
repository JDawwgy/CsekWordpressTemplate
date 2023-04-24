<?

	$excerpt=get_field('shortened_excerpt',$post);
	if(empty($excerpt)){
		$excerpt=wp_trim_words(get_the_excerpt(  $post ),15);
	}
?>
<div class="flex mb-3">
	<div class="w-1/3">
		<div class='post-excerpt--image h-full'>
			<?
			if ( has_post_thumbnail() ) {
			?>
			<a href='<?=get_the_permalink( $post )?>'>

			<?=get_the_post_thumbnail(null,'thumbnail',['class'=>'w-full h-full object-cover object-top object-center'])?>
		</a>

			<?
			}
			else {
			?>
				<a href='<?=get_the_permalink( $post )?>'>
					<img src="/wp-content/themes/tailpress-master/resources/img/signalfields-placeholder-img-blog.jpg" class="w-full h-full object-cover object-top object-center" alt="100% Ontario signal."/>
				</a>
			<?
			}
			?>
		</div>
	</div>
	<div class="w-2/3 bg-secondary p-4">
		<h5 class="text-base mb-0 pb-0 leading-snug"><? the_title();?></h5>
		<p class='text-xs mb-3 pb-2'><?=$excerpt?></p>
		<a class="btn-text-small " href="<?=esc_url( get_permalink());?>">Learn More</a>
	</div>
</div>
