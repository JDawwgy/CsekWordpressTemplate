<?

	$image = get_field('image');
?>
<figure class="size-full  alignfull md:alignnone">
	<?
	if($image ) {
		echo wp_get_attachment_image( $image, "large" );
	}
	?>
</figure>