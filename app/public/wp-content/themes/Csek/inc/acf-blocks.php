<?

	// register acf blocks

	function be_register_blocks() {

		if( ! function_exists( 'acf_register_block_type' ) )
			return;
			
			
			acf_register_block_type( array(
				'name'				=> 'header',
				'title'				=> __( 'Header', 'core-functionality' ),
				'render_template'		=> 'template-parts/blocks/block-header.php',
				'category'			=> 'formatting',
				'icon'				=> ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'supports' 			=>['align_content' => true,'align'=>false],
				'keywords'			=> array('custom','header'),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			acf_register_block_type( array(
				'name'				=> 'Call to Action',
				'title'				=> __( 'Call to Action', 'core-functionality' ),
				'render_template'		=> 'template-parts/blocks/cta.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				
				'keywords'			=> array('custom','call to action','cta'),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			
			acf_register_block(array(
				'name'				=> 'Contact',
				'title'				=> __('Contact'),
				'description'		=> __('A custom block to display on contact page'),
				'render_template'		=> 'template-parts/blocks/contact.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section', 'featured','contact','custom' ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			
			
			acf_register_block(array(
				'name'				=> 'FAQ',
				'title'				=> __('FAQ'),
				'description'		=> __('A custom block to load a FAQ Accordian'),
				'render_template'		=> 'template-parts/blocks/faq-block.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section', 'row','faq','accordian','custom' ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			acf_register_block(array(
				'name'				=> 'Content Left / Right',
				'title'				=> __('Content Left / Right'),
				'description'		=> __('A custom block to load Content Left / Right'),
				'render_template'		=> 'template-parts/blocks/content-left-right.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section','content','left','right' ),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			acf_register_block(array(
				'name'				=> 'Content',
				'title'				=> __('Content'),
				'description'		=> __('A custom block to load Content'),
				'render_template'		=> 'template-parts/blocks/content.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section','content'),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			
			acf_register_block(array(
				'name'				=> 'Parallax CTA',
				'title'				=> __('Parallax CTA'),
				'description'		=> __('A custom block to load Parallax CTA'),
				'render_template'		=> 'template-parts/blocks/parallax-cta.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section','parallax', 'call', 'to', 'action', 'cta'),
				'example'  => array(
					'attributes' => array(
						'mode' => 'preview',
						
					)
				),
				'render_callback' => 'block_render'
			));
			
			
			
			
			// register a  block
			/* acf_register_block(array(
					'name'				=> 'infoSlider',
					'title'				=> __('Information slider block'),
					'description'		=> __('A custom media block object.'),
					'render_template'		=> 'template-parts/blocks/information-slider-block.php',
					'category'			=> 'formatting',
					'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
					'keywords'			=> array( 'section', 'row','media block' ,'custom','info','slider'),
			));
			
			
			
			// register a  block
			
			acf_register_block(array(
				'name'				=> 'testimonialBlock',
				'title'				=> __('Testimonial Block'),
				'description'		=> __('A custom block object to load a testimonial slideshow.'),
				'render_template'		=> 'template-parts/blocks/testimonial-block.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section', 'row','media block' ,'custom','tsetimonial'),
			));
			
			acf_register_block(array(
				'name'				=> 'brandBarBlock',
				'title'				=> __('Brand Bar Block'),
				'description'		=> __('A custom block object to load a variety of brand icons.'),
				'render_template'		=> 'template-parts/blocks/brand-block.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section', 'row' ,'custom','brands'),
			));
			
			acf_register_block(array(
				'name'				=> 'CTA',
				'title'				=> __('Call To Action Grid'),
				'description'		=> __('A custom media block object. Lists calls-to-actions in grid format'),
				'render_template'		=> 'template-parts/blocks/cta.php',
				'category'			=> 'formatting',
				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
				'keywords'			=> array( 'section', 'row','call to action','cta','custom' ),
		));
		
		acf_register_block(array(
			'name'				=> 'Recent Blog Posts',
			'title'				=> __('Recent Blog Posts'),
			'description'		=> __('A custom media block object. Lists calls-to-actions in grid format'),
			'render_template'		=> 'template-parts/blocks/recent-blog-posts.php',
			'category'			=> 'formatting',
			'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
			'keywords'			=> array( 'section', 'row','call to action','cta','custom' ),
			));
			
		 */
		// register a  block
		
		
		
		// 			register a  block
		// 			acf_register_block(array(
		// 					'name'				=> 'titleBlock',
		// 					'title'				=> __('Title block'),
		// 					'description'		=> __('A custom title block object.'),
		// 					'render_template'		=> 'template-parts/blocks/title-block.php',
		// 					'category'			=> 'formatting',
		// 					'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
		// 
		// 					'keywords'			=> array( 'section', 'row','title' ,'custom'),
		// 					'example'  => array(
		// 						'attributes' => array(
		// 							'mode' => 'preview',
		// 
		// 						)
		// 					),
		// 					'render_callback' => 'block_render'
		// 			));
		
		
		// 			register a  block
		
		// 			acf_register_block(array(
		// 					'name'				=> 'mediaBlock',
		// 					'title'				=> __('Media block'),
		// 					'description'		=> __('A custom media block object.'),
		// 					'render_template'		=> 'template-parts/blocks/media-block.php',
		// 					'category'			=> 'formatting',
		// 					'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
		// 
		// 					'keywords'			=> array( 'section', 'row','media block' ,'custom'),
		// 					'example'  => array(
		// 						'attributes' => array(
		// 							'mode' => 'preview',
		// 
		// 						)
		// 					),
		// 					'render_callback' => 'block_render'
		// 			));
		
		// 			acf_register_block(array(
		// 				'name'				=> 'textBlock',
		// 				'title'				=> __('Text block'),
		// 				'description'		=> __('A custom text block object.'),
		// 				'render_template'		=> 'template-parts/blocks/text-block.php',
		// 				'category'			=> 'formatting',
		// 				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
		// 				'keywords'			=> array( 'section', 'row','media block' ,'custom','text'),
		// 
		// 				'anchor'		=> true,
		// 				'example'  => array(
		// 					'attributes' => array(
		// 						'mode' => 'preview',
		// 
		// 					)
		// 				),
		// 				'render_callback' => 'block_render'
		// 				));
		
		// 			acf_register_block(array(
		// 				'name'				=> 'Carousel',
		// 				'title'				=> __('Carousel'),
		// 				'description'		=> __('A custom block to load a carousel'),
		// 				'render_template'		=> 'template-parts/blocks/carousel.php',
		// 				'category'			=> 'formatting',
		// 				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
		// 				'keywords'			=> array( 'section', 'row','carousel','slider','custom' ),
		// 				'example'  => array(
		// 					'attributes' => array(
		// 						'mode' => 'preview',
		// 
		// 					)
		// 				),
		// 				'render_callback' => 'block_render'
		// 			));
		
		
		// 			acf_register_block(array(
		// 				'name'				=> 'Posts Carousel',
		// 				'title'				=> __('Posts Carousel'),
		// 				'description'		=> __('A custom block to load a carousel from post objects'),
		// 				'render_template'		=> 'template-parts/blocks/posts-carousel.php',
		// 				'category'			=> 'formatting',
		// 				'icon'				=>  ['src'=>'schedule','forground'=>'#26116B',  'background' => '#eee'],
		// 				'keywords'			=> array( 'section', 'row','carousel','slider','custom' ),
		// 				'example'  => array(
		// 					'attributes' => array(
		// 						'mode' => 'preview',
		// 
		// 					)
		// 				),
		// 				'render_callback' => 'block_render'
		// 			));
		
		

	}
	add_action('acf/init', 'be_register_blocks' );

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page();

	}
	;

	/**
	  * Callback block render,
	  * return preview image
	  */
	 function block_render( $block, $content = '', $is_preview = false ) {
		 /**
		  * Back-end preview
		  */

		  if ( $is_preview &&  !empty( $block['data']['show_image'] ) ) {
			  $template = $block['render_template'];
			  $template = str_replace( '.php', '.jpg', $template );
			  $image=explode("/", $template);

			 if(file_exists(get_template_directory()."/resources/block-previews/".end($image))){
				 echo "<div style='opacity:.8;position:absolute;top:0px;bottom:0px;left:0px;right:0px;width:100%;height:100%;'><img src='".get_template_directory_uri()."/resources/block-previews/".end($image)."' style='position:absolute;top:0px;bottom:0px;right:0px;left:0px;object-fit:cover;max-width:500px;'></div>";
			 }
			   false;
		  } else {
			   if ( $block ) :
					$template = $block['render_template'];
					$template = str_replace( '.php', '', $template );
					get_template_part( '/' . $template );
			   endif;
		  }
	 }
