<div class="border-t border-primary pt-6 pb-5">
	<div class="container mx-auto flex justify-between md:flex-row flex-col '">
		<div class='font -heading pb-4 md:pb-0'>
			<? echo "&copy; ".date("Y"). " ".get_field('copyright_info','options');  ?>
		</div>
		<div class="flex-grow text-center">
			<? wp_nav_menu(array(
				'menu'=>'Legal',
				'container_id'    => 'legal-menu',
				'container_class' => ' mt-4 p-4 lg:mt-0 lg:p-0 lg:block',
				'menu_class'      => ' lg:-mx-4',
				'li_class'        => 'text-base px-4 border-r border-primary last:border-r-0 inline-block',
				'fallback_cb'     => false,
			)); ?>
		</div>
		<div class='font -heading'>
			<?
			$designed_by_link = get_field('designed_by_link','options');
			
			if( $designed_by_link ):
				echo '<a target="_blank" href="'.esc_url( $designed_by_link ).'" >';
					echo get_field('designed_by_text','options');
					
					$designed_by_logo = get_field('designed_by_logo','options');
					echo wp_get_attachment_image( $designed_by_logo, [0,60] ,false,['class'=>'']);
				echo '</a>';
			endif;
			?>
		</div>

	</div>
</div>
