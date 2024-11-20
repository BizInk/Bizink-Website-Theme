jQuery(document).ready(function($) {
	// blog Filter Home Page
	jQuery(document).on('change', ".form-select", function() {
		ajax_post_load();	
		jQuery('#page-count').val('1');	
		$('.load-more-wrap').removeClass('d-none');
	});
	
	var ppp = 3; // Post per page		
	var pageNumber = jQuery('#page-count').val();
	function ajax_post_load(){
		// Get Values
		var location = jQuery('#location').val();
		var partner = jQuery('#partner').val();
		var typeofwork = jQuery('#typeofwork').val();
        
		
		var data = {
			'action': 'filter_posts_callback',			
			'location': location,
			'partner': partner,
			'typeofwork': typeofwork,
			'ppp': ppp,
			'pageNumber':pageNumber
		}
		
		$.ajax({
			url : my_ajax_object.ajaxurl,
			data : data,
			dataType: "json",
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('.filtered-posts').html( 'Loading...' );				
			},
			success : function( data ) {
				//console.log(data);
				if ( data.postdata ) {				
					$('.filtered-posts').html( data.postdata );
					//console.log('done');					
				} else {
					$('.filtered-posts').html( '<div class="col-lg-12 text-center mb-5">No posts found.</div>' );
				}
			}
		});
	}
	ajax_post_load();
	
	function load_posts(){		
		var location = jQuery('#location').val();
		var partner = jQuery('#partner').val();
		var typeofwork = jQuery('#typeofwork').val();
	
		var pageNumber = jQuery('#page-count').val();
		pageNumber++;
		var str = 'pageNumber=' + pageNumber + '&ppp=' + ppp + '&location=' + location + '&partner=' + partner + '&typeofwork=' + typeofwork + '&action=filter_posts_callback';
		$.ajax({
			type: "POST",
			dataType: "json",
			url: my_ajax_object.ajaxurl,
			data: str,
			success: function(data){
				if ( data.postdata ) {				
					$('.filtered-posts').append( data.postdata );
					jQuery('#page-count').val(pageNumber);
					//console.log('done');					
				} else {
					$('.filtered-posts').append( '<div class="col-lg-12 text-center mb-5">No posts found.</div>' );
					$('.load-more-wrap').addClass('d-none');
				}				
			}

		});
		return false;
	}
	$("#more_posts").on("click",function(){ // When btn is pressed.
		$("#more_posts").attr("disabled",true); // Disable the button, temp.
		load_posts();						
	});
});