<?


$id = $block['id'];


///////////////////////////////////////////////
/////  convert block settings to classes
/////////////////////////////////////////////


$block_style = get_field('block_style');
$colour_treatment = get_field('colour_treatment');
$block_orientation = get_field('block_orientation');
$block_width = get_field('block_width');
$block_top_padding = get_field('block_top_padding');
$block_bottom_padding = get_field('block_bottom_padding');



if($block_orientation=="media-right"){
	$block_orientation="flex-row-reverse";
}else{
	$block_orientation="";
}

if($block_top_padding=="padding-top"){
	$block_top_padding="block-padding-top";
}else{
	$block_top_padding="";
}

if($block_bottom_padding=="padding-bottom"){
	$block_bottom_padding="block-padding-bottom";
}else{
	$block_bottom_padding="";
}