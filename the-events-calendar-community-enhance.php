
<?php
/*
Plugin Name: The Events Calendar: Community Events
Plugin URI:
Description: Styling for the magazine
Author: Timothy Wood @codearachnid
Version: 1.0.0
Author URI: http://www.imaginesimplicity.com/
*/

add_action('tribe_events_community_after_the_content','the_events_calendar_community_limit_description');
function the_events_calendar_community_limit_description(){
	?><script type="text/javascript">

	(function($){
		$.fn.textareaCounter = function(options) {
			// setting the defaults
			// $("textarea").textareaCounter({ limit: 100 });
			var defaults = {
				limit: 100
			};
			var options = $.extend(defaults, options);

			// and the plugin begins
			return this.each(function() {
				var obj, text, wordcount, limited;

				obj = $(this);
				obj.after('<span style="font-size: 11px; clear: both; margin-top: 3px; display: block;" id="counter-text">Max. '+options.limit+' words</span>');

				obj.keyup(function() {
				    text = obj.val();
				    if(text === "") {
				    	wordcount = 0;
				    } else {
					    wordcount = $.trim(text).split(" ").length;
					}
				    if(wordcount > options.limit) {
				        $("#counter-text").html('<span style="color: #DD0000;">0 words left</span>');
						limited = $.trim(text).split(" ", options.limit);
						limited = limited.join(" ");
						$(this).val(limited);
				    } else {
				        $("#counter-text").html((options.limit - wordcount)+' words left');
				    }
				});
			});
		};
	})(jQuery);

	jQuery("textarea[name=tcepostcontent]").textareaCounter({ limit: 75 });


	</script><?php
}
