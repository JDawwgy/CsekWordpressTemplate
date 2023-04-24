<?

	//////////////////////////////////////////////
	///// This file is used for any navigation related functionallity or extensions
	/////////////////////////////////////////////
	
	
	
	
	
	
	//////////////////////////////////////////////
	///// Set up full screen navigation
	/////////////////////////////////////////////
	function fullScreenNavigation(){
		get_template_part( 'template-parts/full-screen-menu', null );
	}
	add_action('wp_footer', 'fullScreenNavigation');