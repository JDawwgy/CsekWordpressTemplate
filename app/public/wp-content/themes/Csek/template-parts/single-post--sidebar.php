<?
	$related = new WP_Query(
		array(
			'category__in'   => wp_get_post_categories( $post->ID ),
			'posts_per_page' => 3,
			'post__not_in'   => array( $post->ID )
		)
	);

?>

<?
if ( has_post_thumbnail() ) {

	echo '<div class="post-sidebar lg:w-5/12 lg:pl-16 h-full ">';
}
else {
	echo '<div class="post-sidebar lg:w-5/12 lg:pl-12 lg:pt-64  h-full">';
}
?>
	<hr>
	<?
	get_template_part('template-parts/social-share');
	?>
	<?
		if( $related->have_posts() ) {
			echo '<h4 class="text-base">Related</h4>';

			while( $related->have_posts() ) {
				$related->the_post();
				/*whatever you want to output*/

				get_template_part('template-parts/single-post--sidebar-post');

			}
			wp_reset_postdata();
		}
	?>
</div>
