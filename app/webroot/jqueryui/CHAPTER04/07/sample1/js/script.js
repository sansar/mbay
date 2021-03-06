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

	(function() {
		// fancyBox 基本
		$(".modal").fancybox();
	});

	$(function() {
		// オプション指定
		$(".modal").fancybox({
			//openEffect: "none",
			//closeEffect: "none",
			prevEffect: "fade",
			nextEffect: "fade",
			closeBtn: false
		});
	});
}(jQuery));
