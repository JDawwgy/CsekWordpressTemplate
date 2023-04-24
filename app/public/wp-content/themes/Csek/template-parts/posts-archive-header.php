<?


	if(empty($image)){

	}
	$category = get_queried_object();
	if(!empty($category)){

		$image=get_field('header_background_photo',"category_".$category->term_id);
		$title=$category->name;

	}

	if(empty($title)){

		$title=get_field('blog_title','option');
	}

	if(empty($image)){
		$image=get_field('blog_header_photo','option');

	}

?>
<section class="header-block alignfull mt-0 h-screen overflow-hidden relative  is_secondary_page has-image left-bottom   animate" id="block_617c39e0a4b1d">
  <div class="scrim-nav absolute bottom-0 h-1/3 w-full bg-gradient-to-t from-black to-transparent z-10 "></div>
  <div class="scrim absolute inset-0 "></div>
  <?
  echo '<div class="h-full w-full">' . wp_get_attachment_image( $image, 'full',false,['class'=>'h-full object-cover w-screen'] ) . '</div>';
  ?>

	<div class="absolute flex h-full w-full  flex flex-end flex-col top-0 justify-center">
	  <div class="block-header__content  relative transition-all ease-out duration-500 container mx-auto text-white flex flex-col h-full pt-72 pb-40 ">
		<div class="flex flex-col relative justify-center flex-grow">
		  <h1 class="text-center mx-auto text-white font-signal mb-0 pb-2"><?=$title?></h1>

		  <ul class="blog-posts--categories hidden lg:flex justify-center  alignfull lg:mx-0 lg:w-auto pl-[10vw] sm:pl-10 lg:px-0"><? echo str_replace("All</a>","All Posts</a>",wp_list_categories(['show_option_all'=>"All Posts",'title_li'=>false]));?></ul>

		</div>
	  </div>
	</div>
</section>
