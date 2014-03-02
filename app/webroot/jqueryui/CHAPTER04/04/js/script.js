/* Author: Toshiya TSURU <t_tsuru@sunbi.co.jp>

 */

$(function() {

	// 高さをそろえる
	var height = 0;
	$('.sub-unit').each(function(index, elem){
		var $elem = $(elem);
		height = (height < $elem.height()) ? $elem.height() : height;  
	});
	$('.sub-unit').height(height);
	
	// fb.wall を表示する。
	var $wall   = $('#fb-wall');
	$wall.fbWall({
		id : 'sunbi.co.jp',
		accessToken : 'AAAC7gAoWDQ0BAIHyUJYLQRACtg9fPHVFiB8gL0PN4lmhfbq3UamiLCZB8DDaB1fjJzLVz2LAmELI8oMpgc5YrkSZAQwrEZD',
		showGuestEntries : true,
		showComments : true,
		max : 7,
		timeConversion : 24
	});
	
	// 「FACEBOOK」のタグがクリックされたら、fb.wall をスライドインさせる。
	var $sticky = $('#fb-wall-stiky');
	$sticky.click(function(){
		// toggle class
		$sticky.toggleClass('show');
		// animation
		$sticky.animate({
  		right: ($sticky.hasClass('show')) ? $wall.width() + 10 : 10
		}, 750);
		$wall.animate({
  		right: ($sticky.hasClass('show')) ? 0 : ($wall.width() * -1)
		}, 750);
	});
	
});
