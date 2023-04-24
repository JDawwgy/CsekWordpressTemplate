<?
include( get_template_directory() . '/template-parts/blocks/common-block-layout-setup.php' );
$faqs = get_field('faqs');
$title = get_field('section_title');
?>

<section class='faq alignfull py-16 pb-20' id="<?=$id?>">
	<div class="container mx-auto ">
		
		<? if(!empty($title)) { ?>
			<h2 class="pt-6 text-primary uppercase text-5xl"><?=$title?></h2>
		<? } ?>
		
		<?
		// reuse faq media partial that is shared with media-block sometimes
		get_template_part( 'template-parts/blocks/content-mediablock-faq',null,['faqs'=>$faqs]);
		?>
	</div>
</section>
