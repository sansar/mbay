/**
 * script
 * 
 * @copyright   RaNa design associates, inc.
 * @author      keisuke YAMAMOTO <keisukey@ranadesign.com>
 * @link        http://kaelab.ranadesign.com/
 * @version     1.0
 * @date        2012
 *
 */
(function($) {

	$(function() {
		var layoutOptions = {
			north__closable: false,
			north__resizable: false,
			west__closable: false,
			west__size: 90,
			east__initClosed: true,
			east__spacing_open: 48,
			east__spacing_closed: 48,
			east__togglerAlign_open: "top",
			east__togglerAlign_closed: "top",
			east__togglerContent_open: "<img src='img/arrow-right.png'>",
			east__togglerContent_closed: "<img src='img/arrow-left.png'>"
		};

		$("#wrapper").layout(layoutOptions);
		
	});

}(jQuery));
