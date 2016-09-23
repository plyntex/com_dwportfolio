(function($)
{
	$(document).ready(function()
	{
		// "isotope" plugin
		var $grid = $('.portfolio-grid');
		$grid.isotope({
		});	

		var filter = '*', isotope_run = function(f) {
			$grid.isotope({filter: f}).
			trigger('colio','excludeHidden');
		};						
		$('#filters a').click(function(){
			var selector = $(this).attr('data-filter');
			$grid.isotope({ filter: selector });
			return false;
		});
		
		// set selected menu items
		var $optionSets = $('.option-set'),
		$optionLinks = $optionSets.find('a'); 
		$optionLinks.click(function(){
			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
			return false;
			}
		var $optionSet = $this.parents('.option-set');
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected'); 
		});
		
		isotope_run(filter);
	})
})(jQuery);