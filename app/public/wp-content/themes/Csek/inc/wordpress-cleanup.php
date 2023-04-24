<?

	//////////////////////////////////////////////
	///// Modify some core wordpress features and settings
	/////////////////////////////////////////////
	function enable_more_buttons($buttons) {
	  $buttons[] = 'hr';
	 
	  /* 
	  Repeat with any other buttons you want to add, e.g.
		  $buttons[] = 'fontselect';
		  $buttons[] = 'sup';
	  */
	 
	  return $buttons;
	}
	add_filter("mce_buttons", "enable_more_buttons");
	
	
	//////////////////////////////////////////////
	///// Add SVG Support
	/////////////////////////////////////////////
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){
	
		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );
	
		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');
	
	
	//////////////////////////////////////////////
	///// set amount of post revisions to keep in history
	/////////////////////////////////////////////
	
	define('WP_POST_REVISIONS', 10);
	
	
	//////////////////////////////////////////////
	///// REMOVE COMMENTS
	/////////////////////////////////////////////
	// kill comment functions
	// Removes from admin menu
	add_action( 'admin_menu', 'my_remove_admin_menus' );
	function my_remove_admin_menus() {
		remove_menu_page( 'edit-comments.php' );
	}
	// Removes from post and pages
	add_action('init', 'remove_comment_support', 100);
	
	function remove_comment_support() {
		remove_post_type_support( 'post', 'comments' );
		remove_post_type_support( 'page', 'comments' );
	}
	// Removes from admin bar
	function mytheme_admin_bar_render() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
	
	
	//////////////////////////////////////////////
	///// disable comments
	/////////////////////////////////////////////
	add_action('admin_init', function () {
		// Redirect any user trying to access comments page
		global $pagenow;
		
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url());
			exit;
		}
	
		// Remove comments metabox from dashboard
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	
		// Disable support for comments and trackbacks in post types
		foreach (get_post_types() as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				remove_post_type_support($post_type, 'trackbacks');
			}
		}
	});
	
	// Close comments on the front-end
	add_filter('comments_open', '__return_false', 20, 2);
	add_filter('pings_open', '__return_false', 20, 2);
	
	// Hide existing comments
	add_filter('comments_array', '__return_empty_array', 10, 2);
	
	// Remove comments page in menu
	add_action('admin_menu', function () {
		remove_menu_page('edit-comments.php');
	});
	
	// Remove comments links from admin bar
	add_action('init', function () {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	});
	
	
	//////////////////////////////////////////////
	///// Add a "thin bar" image option
	/////////////////////////////////////////////
	add_action('init', function() {
		register_block_style('core/image', [
			'name' => 'thin-bar',
			'label' => __('Thin Bar', 'txtdomain'),
		]);
	});
	
	
	/**
	 * Block whitelist
	 * Only allow certain blocks to be used
	 */
	
	add_filter( 'allowed_block_types', 'our_allowed_block_types' );
	 
	function our_allowed_block_types( $allowed_blocks ) {
		 $b=WP_Block_Type_Registry::get_instance()->get_all_registered();
			
			
		$a=array('core/image',
		'core/paragraph',
		'core/heading',
		'core/group',
		'core/button');
		
		foreach($b as $key=>$value){
			if(strpos($key,'acf/')!==false){
				$a[]=$key;
			}
		}
		
		
		
		return $a;
	 
	}
	
?>