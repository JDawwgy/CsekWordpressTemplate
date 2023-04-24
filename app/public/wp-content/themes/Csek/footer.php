
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<?
$location = get_field('location', 'options');
$googleMaps = get_field('google_maps_link', 'options');
$phone = get_field('contact_phone', 'options');
$email = get_field('contact_email', 'options');
?>

<footer id="colophon" class="site-footer bg-dark" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto lg:flex justify-between py-14">
		<div class="lg:w-1/4 pb-8 lg:pb-0">
			<img class="w-[20%] lg:w-[40%]" src="/wp-content/uploads/2021/10/568-5680053_prod-placeholder-vector-product-icon-png-transparent-png.png">
		</div>
		
		<div class="lg:w-1/4 pb-8 lg:pb-0">
			<h5 class="text-2xl uppercase thin-title">Get in Touch</h5>
			
			<div class="flex flex-col">
				<a class="footer-location" href="<?=$googleMaps?>">
					<p><?=$location?></p>
				</a>
				<div>P: <a class="hover:text-primary" href="tel:<?=$phone?>"><?=$phone?></a></div>
				<div>E: <a class="hover:text-primary" href="mailto:<?=$email?>"><?=$email?></a></div>
			</div>
		</div>
		
		<div class="lg:w-1/4 pb-8 lg:pb-0">
			<? wp_nav_menu([
					'menu'            => 'Footer',
					'li_class'        => 'text-lg uppercase font-bold',
					'submenu_class'   => 'hidden'
				]); ?>
		</div>
		
		<div class="lg:w-1/4 lg:text-right">
			<h5  class="text-lg uppercase mb-6 font-bold">Connect with us</h5>
			<?
				get_template_part('/template-parts/social-links');
			?>
		</div>
	</div>
	<? get_template_part('template-parts/legalize'); ?>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
