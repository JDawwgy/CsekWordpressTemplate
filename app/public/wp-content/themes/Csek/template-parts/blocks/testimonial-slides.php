
	<div class="wp-testimonials">
		<?  
		
		
		
		$x=0;
		while( have_rows('testimonials') ) : the_row();
			$x++;
			$excerpt = get_sub_field('excerpt');
			$full_testimonial = get_sub_field('full_testimonial');
			$referrer_name=get_sub_field('referrer_name');
			$referrer_company=get_sub_field('referrer_company');
			
				
			
				?>
					<div class="slide">
						<h2><?=$excerpt?></h2>
						<p><?=$full_testimonial?></p>
						
						<p class='attributed'><strong><?=$referrer_name?></strong><br><?=$referrer_company?>
						</p>
						
							
						
	
					</div>
				<?
		
		endwhile;
		?>
	</div>
<div class='testimonial-slider-arrows'>
	<img src="<?=get_stylesheet_directory_uri()?>/assets/icons/utility/arrow-left-orange.svg" class="slide-navigation-component navigate-previous" alt="Previous Testimonial">
	<span class="slide-navigation-component"><span class='current-page'>1</span> OF <?=$x?></span>
	<img src="<?=get_stylesheet_directory_uri()?>/assets/icons/utility/arrow-right-orange.svg" class="slide-navigation-component navigate-next" alt="Next Testimonial">
</div>
