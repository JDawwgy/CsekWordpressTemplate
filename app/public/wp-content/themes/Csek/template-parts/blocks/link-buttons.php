<?

if( !empty($args['links']) ): ?>
	<div class="wp-block-buttons <?=$args['wrapper_class']?>">
		<?  
			foreach($args['links'] as $link){
		
			
			
			
			
			if( $link ): 
				$button_style = $link['button_style'];
				$link_url = $link['link']['url'];
				$link_title = $link['link']['title'];
				$link_target = $link['link']['target'] ? $link['link']['target'] : '_self';
			
			
				?>
					<div class="wp-block-button btn has-<?=$button_style?>">
	
						<a class="wp-block-button__link <?=$button_style?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	
					</div>
				<?
			endif;
		}
		?>
	</div>
 <? endif; ?>