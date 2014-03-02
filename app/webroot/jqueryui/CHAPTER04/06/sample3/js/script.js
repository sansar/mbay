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
		//
		// jQuery UI.Layout
		//
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

		var wrap = $("#wrapper").layout(layoutOptions);
		
		//
		// visualize jQuery
		//

		// contenteditable非対応の場合
		if ($.browser.msie && $.browser.version < 8) {
			$(".account").visualize({
				type: "pie",
				width: 600,
				rowFilter: ":not(:last)"
			});
			return;
		}

		// contenteditable対応の場合
		var tableCopy = $(".account").clone()
			.find("td").each(function() {
				$(this).text($(this).text().replace(/,/g, ""));
			}).end()
			.hide().appendTo("body");

		var graph = tableCopy.visualize({
				type: "pie",
				width: 600,
				rowFilter: ":not(:last)"
			}).appendTo(".area-graph");
		
		var cell = $(".account").find("td")
			.prop("contenteditable", true)
			.bind("focus", function() {
				tableCopy.empty();
			})
			.bind("keyup blur", function() {
				$(".account").clone().contents()
					.find("td").each(function() {
						$(this).text($(this).text().replace(/,/g, ""));
					}).end()
					.appendTo(tableCopy);
				graph.trigger("visualizeRefresh");
				tableCopy.empty();
			});

	});

}(jQuery));
