/*
 	Author: Toshiya TSURU <t_tsuru@sunbi.co.jp>
	Last changed: $LastChangedDate: 2012-04-25 21:47:09 +0900 (Wed, 25 Apr 2012) $
 */
$(function() {

	$('#reel-item-01 img.reel').reel({
		frames : 35,
	});

	$('#reel-item-02 img.reel').reel({
		footage : 10,
		frames : 20,
		frame : 14,
		rows : 6,
		row : 3
	});

	$('#reel-item-03 img.reel').reel({
		stitched : 1652
	});

	/*
	 * 「Viwe 360」ボタンクリック時の処理
	 */
	$('.btn').live('click', function(event) {
		var $item = $(this).attr('data-item');
		$('.hero-unit').filter(":visible").fadeOut('slow', function() {
			$('#' + $item).fadeIn('slow');
		});
		
		// return false, to prevent the event
		return false;
	});
});
