<?
	$category=get_the_category();
	if(empty(get_the_post_thumbnail())){
		$image_status="no-image";
	}else{
		$image_status="";
	}
?>
<div class="post-slide <?=$image_status?> ">

	<div class="post-preview relative flex-grow overflow-hidden transition-all z-10  hover:cursor-pointer  mr-12" onclick="window.location='<?php the_permalink(); ?>'">
		<?=the_post_thumbnail('full',array('class' =>'absolute inset-0 w-full h-full object-cover object-bottom hover:scale-105 transition-all') );?>

			<div class="absolute inset-0 h-full w-full md:w-full bg-dark/20" ></div>

				<div class="relative h-full w-full md:w-3/4 p-12 flex flex-col justify-end justify-items-end text-white text-sm">
					<div>
						<h6 class="text-primary tracking-loose"><a href='<?=get_term_link($category[0]->term_id)?>' class='blog-post-category'><?=$category[0]->name?></a></h6>

						<h2 class="mt-3 text-3xl font-bold tracking-tight text-white pb-4 mb-0">
							<a href="<?php the_permalink(); ?>"  class='blog-post-title'><? the_title(); ?></a>
						</h2>
						<?=the_excerpt();?>
							<div class='wp-block-buttons'><a href="<?php the_permalink(); ?>"  class='wp-block-button__link btn-text text-white border-white'>Read more</a></div>
					</div>
				</div>

	</div>

</div>
