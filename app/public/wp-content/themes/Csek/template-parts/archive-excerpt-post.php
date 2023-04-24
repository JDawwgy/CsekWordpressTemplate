<?
	$featuredClass="";
	if(!empty($args['featured'] && $args['featured']==true )){
		$featuredClass="featured-post";
	}
	$post=$args['post'];
	$term = get_the_terms( $post, 'category' )[0];
	$excerpt=get_field('shortened_excerpt',$post);
	if(empty($excerpt)){
		$excerpt=wp_trim_words(get_the_excerpt(  $post ),15);
	}

?>

<article class='pb-2 lg:pb-0 lg:p-4 lg:pt-8  '>
	<div class="article--wrapper  <?=$featuredClass?> ">
		<div class='article--image'>
			<?
			if ( has_post_thumbnail() ) {
			?>
			<a href='<?=get_the_permalink( $post )?>'>
				<?=get_the_post_thumbnail($post,'full',['class'=>'object-cover h-64 w-full max-w-unset transition-all duration-300', ])?>
			</a>
			<?
			}
			else {
			?>
			<a href='<?=get_the_permalink( $post )?>'>
				<img src="/wp-content/themes/tailpress-master/resources/img/signalfields-placeholder-img-blog.jpg" class="object-cover h-64 w-full max-w-unset wp-post-image transition-all duration-300" alt="100% Ontario signal."/>
 			</a>
			<?
			}
			?>
		</div>
		<div class='article--details'>
			<p class="text-sm tracking-wide font-bold pb-4"><a class='p-2 bg-primary no-underline mr-2' href='<?=get_term_link($term)?>'><?=$term->name?></a> <?=get_the_date();?></p>

			<h5 class='text-3xl   pb-4 mb-0'><a class=' pb-2' href='<?=get_the_permalink( $post )?>'><?=get_the_title(  $post );?></a></h5>

			<p class="pb-4 mb-0 "><?=$excerpt?></p>

			<?=get_template_part('template-parts/blocks/link-buttons',null,['links'=>
			[
				[
					'button_style'=>"btn-text text-black ",
					'link'=>['title'=>"Learn More",'url'=>get_the_permalink( $post )]
				],
			],
			'wrapper_class'=>'justify-left']);?>
		</div>
	</div>
</article>
