/************************************************************
 * flickSlidr V1.0
 * https://github.com/klutche/crossFade
 * Released under the MIT license
 ************************************************************/

$(function(){
	// 設定
	var $width      = 140;// 横幅
	var $height     = 200;// 高さ
	var $interval   = 1000;// 切り替わりの間隔(ミリ秒)
	var $fade_speed = 50;// フェード処理の早さ(ミリ秒)
	// 開始処理
	$(".crossFade").css({"position":"relative", "overflow":"hidden", "width":$width, "height":$height});
	$(".crossFade li").hide().css({"position":"absolute", "top":0, "left":0});
	$(".crossFade").each(function(){$(this).children(":first").addClass("active").fadeIn($fade_speed);});
//	$(".crossFade li:first").addClass("active").fadeIn($fade_speed);
	// ループセット
	var timerID;
	// マウスオーバーで中断
	$(".crossFade").hover(function(){
		var me = $(this);
		timerID = setInterval(function(){show(me);}, $interval);
	}, function(){
		clearInterval(timerID);
	});
	// フェードイン処理
	function show(elem){
		if (elem.find("li").length < 2) return;
		var $active = elem.find("li.active");
		var $next = $active.next("li").length?$active.next("li"):elem.find("li:first");
		$active.fadeOut($fade_speed).removeClass("active");
		$next.fadeIn($fade_speed).addClass("active");
	}
});
