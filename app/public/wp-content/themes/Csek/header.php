<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col overflow-x-hidden">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="fixed w-screen z-10 bg-transparent text-white transition-all">
		
		<div class="mx-auto container">
			<div class="lg:flex lg:justify-between lg:items-center  py-6">
				<div class="flex justify-between items-center">
					<div>
						<?php if ( has_custom_logo() ) {
						
							$logo = get_theme_mod( 'custom_logo' );
							$logo_path=wp_get_original_image_path($logo);
							if(strpos($logo_path, 'svg')!==false) {
								
								echo"<a  href='/' class='primary-logo'>";
									echo file_get_contents(wp_get_original_image_path($logo));
								echo"</a>";
								
							} else {
								echo '<div class="max-w-[300px]">';
								   the_custom_logo();
							    echo '</div>';
							}
							
					    } else { ?>
							<div class="text-lg uppercase">
								<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
									<?php echo get_bloginfo( 'name' ); ?>
								</a>
							</div>
							
							<p class="text-sm font-light text-gray-600">
								<?php echo get_bloginfo( 'description' ); ?>
							</p>
							
						<?php } ?>
					</div>
					
					<div class="lg:hidden">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
											  id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>
				
				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'submenu_class'   => 'hidden',
						'li_class'        => 'lg:mx-4  font-serif text-lg uppercase font-bold',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
		</div>
	</header>

	<div id="content" class="site-content flex-grow">
		
		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>
		
		<?php endif; ?>
		<!-- End introduction -->
		
		<?php do_action( 'tailpress_content_start' ); ?>
		
		<main>
