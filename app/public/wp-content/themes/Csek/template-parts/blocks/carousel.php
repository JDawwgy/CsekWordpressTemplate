<?php

	include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );
	
	$slides = get_field('slides');



?>

		
			<section class='carousel-slides-wrapper alignfull <?=$colour_treatment?>  <?=$block_top_padding?> <?=$block_bottom_padding?>' id="<?=$id?>">
			
				<div class='container mx-auto'>
					<div class="carousel-slides peek-a-boo flex ">
						<?php 
						
							
							foreach( $slides as $slide ) {
							
								echo '<div class="px-10">';
									echo $slide['content'];
								echo '</div>';
							}
							// endforeach;
							
						?>
					</div>
				
			
					
				</div>
			</section>
		
