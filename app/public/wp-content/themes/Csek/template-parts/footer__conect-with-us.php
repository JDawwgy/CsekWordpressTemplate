<?
	if(!isset($args['text-size'])){
		$args['text-size']='text-base leading-tight pt-0';
	}
?>

<p class="<?=$args['text-size']?>">
	
	<?php
	$email = get_field('email', 'option');
	if( $email ):
			$email_url = 'mailto:'.$email;
			$email_title = $email;
			
			?>
			<a href="<?php echo esc_url( $email_url ); ?>"><?php echo esc_html( $email_title ); ?></a><br>
	<?php endif; ?>
	
	<?php
$phone = get_field('phone', 'option');
if( $phone ):
	$phone_url = $phone['url'];
	$phone_title = $phone['title'];
	$phone_target = $phone['target'] ? $phone['target'] : '_self';
	?>
	<a href="<?php echo esc_url( $phone_url ); ?>" target="<?php echo esc_attr( $phone_target ); ?>"><?php echo esc_html( $phone_title ); ?></a><br>
<?php endif; ?>
</p>