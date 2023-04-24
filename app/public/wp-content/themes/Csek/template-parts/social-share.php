<?
	$url = get_permalink($post->ID);
	$url = esc_url($url);
?>

<div class='social-share-wrapper lg:flex justify-around lg:w-1/2 mx-auto items-center'>
	<div class='share-on text-eclipse font-semibold  pb-2 lg:pb-0'>Share this post:</div>
	
	<div class='facebook share-icon pb-2 lg:pb-0'><a class='bg-facebook' target='_blank' href='http://www.facebook.com/sharer.php?u=<?=$url?>'><span>Facebook</span></a></div>
	
	<div class='twitter share-icon   pb-2 lg:pb-0'><a class='bg-twitter' target='_blank' href='https://twitter.com/share?url=<?=$url?>'><span>Twitter</span></a></div>
	
	<div class='linkedin share-icon  pb-2 lg:pb-0 '><a target='_blank' href='http://www.linkedin.com/shareArticle?url=<?=$url?>' class='bg-linkedin'><span>LinkedIn</span></a></div>
</div>
