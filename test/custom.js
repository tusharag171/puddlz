/* JS File */

// Start Ready
$(document).ready(function() {  

	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});
      //input gets focussed when we click on div.icon
	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
		$('b#search-string').html(query_value);
                 //set content for b#search-string as value of query_value
		if(query_value !== ''){//if we have typed in something, we need to send that value to php using ajax
			$.ajax({
				type: "POST",
				url: "search.php",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("ul#results").html(html);
				}
			});
		}return false;    
	}

	$("input#search").on("keyup", function(e) {//use 'on' instead of 'live'
		// Set Timeout
		//clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $(this).val();
                //stores value of stuff typed in insider search_string.
		// Do Search
		if (search_string == '') {//if we haven't typed anything.
			$("ul#results").fadeOut();
			$('h4#results-text').fadeOut();//fadeout makes invisible
		}else{
			$("ul#results").fadeIn();
			$('h4#results-text').fadeIn();//fadein makes visible
			$(this).data('timer', setTimeout(search, 100));
           //calls function 'search' after 100 milliseconds.
		};
	});

});
