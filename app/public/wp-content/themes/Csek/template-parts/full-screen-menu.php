<div id="full-screen-menu" class ="fixed inset-0 py-40 bg-primary hidden overflow-y-scroll">
	<div class='container mx-auto'>
		<?
			wp_nav_menu([
				'menu'=>'Primary',
				//'li_class'        => 'text-lg   font-bold',
				'submenu_class' =>'hidden'
			]);
		?>
	</div>
	
</div>