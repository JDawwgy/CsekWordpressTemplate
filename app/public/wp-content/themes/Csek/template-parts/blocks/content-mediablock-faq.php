<?

if(!empty($args['faqs'])) {
	$faqs = $args['faqs'];
} else{
	$faqs = get_field('faqs');
}


if(!empty($faqs)):
	$total_questions=count($faqs);
	$truncate=false;
	if($total_questions>=8){
		$truncate=8;
	}
	
	echo '<dl class="accordian-faqs">';
		$x=1;
		while( have_rows('faqs') ) : the_row();
			if($truncate && $x==$truncate){
				echo "<div class='hidden extra-faqs'>";
			}
			echo'<div class="bg-grey mb-4 rounded-xl">';
				echo'<dt class="cursor-pointer text-2xl py-6 pr-16 question-container">';
					echo '<h4 class="question-title pl-8 pt-1"><a class="question-title text-primary">'.get_sub_field('question')."</a></h4>";
				echo'</dt>';
				
				echo'<dd class="hidden py-5 pr-16 pl-8 answer">';
					echo get_sub_field('answer');
				echo'</dd>';
			echo  '</div>';
			$x++;
		endwhile;
		if($truncate){
			echo"</div>";
		}
	echo "</dl>";
	if($truncate){
		echo "<a href='#' class=''>View More</a>";
	}
	
endif;
?>
