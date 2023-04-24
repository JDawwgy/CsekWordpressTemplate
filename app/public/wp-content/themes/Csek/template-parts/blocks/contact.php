<?
$title = get_field('title');
$content = get_field('content');
$form = get_field('form_id');

$email = get_field('contact_email','option');
$phone = get_field('contact_phone','option');
$location = get_field('location','option');
$maps = get_field('google_maps_link','option');
?>

<section class="flex flex-col md:flex-row my-20 contact-page">
	
	<div class="md:w-1/2 px-8"> 
		<h2><?=$title?></h2>
		<div><?=$content?></div>
		
		<div class="my-6 mt-9">
			<div class="flex items-center my-4">
				<i class="fa fa-map-marker w-6 mr-6 text-primary"></i>
				<p id="contact-map"><a target="_blank" href="<?=$maps?>"><?=$location?></a></p>
			</div>
			
			<div class="flex items-center my-4">
				<i class="fa fa-envelope mr-6 w-6 text-primary"></i>
				<p id="contact-mail"><a href="mailto:<?=$email?>" target="_blank"><?=$email?></a></p>
			</div>
			
			<div class="flex items-center my-4">
				<i class="fa fa-phone mr-6 w-6 text-primary"></i>
				<p id="contact-phone">Phone: <a href="tel:<?=$phone?>" target="_blank"><?=$phone?></a></p>
			</div>
		</div>
	</div>
	
	<div class="md:w-1/2 px-8 mt-8 md:mt-0">
		<?
		echo do_shortcode( '[gravityform id="'.$form.'" title="false" description="false" ajax="true"]');
		?>
	</div>
</section>