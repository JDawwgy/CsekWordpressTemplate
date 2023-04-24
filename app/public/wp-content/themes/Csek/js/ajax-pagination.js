jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	
	//////////////////////////////////////////////
	 ///// Blog post hovers
	 /////////////////////////////////////////////
	
	function setupBlogHovers(){
		   $('.blog-posts .article--wrapper:not(.featured-post)').each(function(){
			   new_h= $(this).data('og-height');
			   if(!$.isNumeric(new_h)){
					new_h=$(this).height();
			   }else{
					$(this).data('og-height',$(this).height());
			   }
			   
			   $(this).css('height',new_h + "px");
			  
			   $(this).css('overflow',"hidden");
	 
		  });
		  
		  $('.blog-posts article:not(:nth-child(1)) img').each(function(){
			 
			  $(this).data('og-height',$(this).height());
			
		  });
		  $('.blog-posts article:not(:nth-child(1))').hover(
			   function(){
				  //  $(this).css('overflow','hidden');
				  console.log('opening ' + $(this).find('img').data('og-height'));
					$(this).find('.wp-block-buttons').stop().slideDown(300);
					$(this).find('img').height($(this).find('img').data('og-height')-44);
			   },
			   function(){
	 		  		console.log('closing ' + $(this).find('img').data('og-height'));
					$(this).find('.wp-block-buttons').stop().slideUp(300);
					$(this).find('img').height($(this).find('img').data('og-height'));
			   }
		  );
		  
	 }
	 setupBlogHovers();
	 
	 //// ajax load
	
	$('.read-more.blogs a').click(function(e){
		e.preventDefault();
		post_type="post";
		taxonomy="category";
		term=$('.blog-posts').data('term');
		var button = $(this),
			data = {
			'action': 'loadmore',
			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : misha_loadmore_params.current_page,
			'type' :post_type,
			'taxonomy' : taxonomy,
			'term_id' : term
		};
 
		$.ajax({ // you can also use $.post here
			url : misha_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Load More' ).prev().before(data); // insert new posts
					misha_loadmore_params.current_page++;
					$('.blog-posts').append(data);
					if ( misha_loadmore_params.current_page == $('.blog-posts').data('total-pages')) 
						$('.read-more').remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
					
					setupBlogHovers();
				} else {
					$('.read-more').remove(); // if no data, remove the button as well
				}
			}
		});
	});
	
	
	
});