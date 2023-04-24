<section class="blog-header-block-no-image pt-24 pb-16 lg:pt-52 pb-20"  >



			<div class="has-content flex-shrink ">
				<div class="hidden lg:block">
					<a class="btn-text-small-reverse" href="/blog/">Back to All Posts</a>
				</div>
				<div class="blog-header-block__content bg-signal px-8 pt-8 pb-4 lg:px-10 lg:pt-10 relative z-2 ">
					<div class="block mb-4 lg:hidden" >
						<a class="btn-text-small-reverse " href="/blog/">Back to All Posts</a>
					</div>
					<h3 class="pb-4 lg:text-left leading-tight"><? the_title(); ?></h3>


				<div class="wp-block-jetpack-markdown"><? the_excerpt();?></div>




				</div>
				<hr class="mt-8 lg:mt-0">
				<div class="meta-deets">
					Category:
					<span><?php
						$cat= get_the_category();

						echo $cat[0]->name;
					?></span><Br>
				 Date: <span><?php echo get_the_date(); ?></span>


			</div>




</section>
