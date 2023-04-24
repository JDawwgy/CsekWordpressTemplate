<?

	$image = get_field('image');
?>
<figure class="size-full  md:alignnone relative">
	<?
	if($image ) {
		echo wp_get_attachment_image( $image, "large",false,['class'=>'md:absolute md:inset-0'] );
	}
	?>
</figure>