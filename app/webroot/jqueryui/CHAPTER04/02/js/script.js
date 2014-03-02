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

	// コントローラ要素の設定
	// 再生ボタン
	$.mbYTPlayer.controls.play = "<img src='img/controller/play.png'>";
	// 一時停止ボタン
	$.mbYTPlayer.controls.pause = "<img src='img/controller/pause.png'>";
	// ミュートボタン
	$.mbYTPlayer.controls.mute = "<img src='img/controller/mute.png'>";
	// ミュート解除ボタン
	$.mbYTPlayer.controls.unmute = "<img src='img/controller/unmute.png'>";

	// 動画の上に敷くラスタ画像
	$.mbYTPlayer.rasterImg = "img/raster.png";

	$(function() {
		// 動画実行
		$("#video").mb_YTPlayer();
		
		// サムネイルをクリックすると、動画を切り替える。
		$(".thumb").click(function(event) {
			// a要素からobject要素へ変更されてから取得しないとloadVideoByUrlメソッドがないためエラーになる。
			$("#video").changeMovie(this.href);

			// Now Playing表示の切替
			// いったんすべての.menuからclass属性playingを外す。
			$(".menu").removeClass("playing");
			// 選択した.thumbを持つ.menuにclass属性playingを付ける。
			$(this).parent(".menu").addClass("playing");

			// a要素のデフォルト動作（リンク遷移）をキャンセル。
			event.preventDefault();
		});
/*
		// バージョンによってはoptimizeDisplayが正しく機能していない場合あり。
		// ウィンドウサイズ変更時に動画サイズも変更する。
		$(window).resize(function() {
			var wrapper = $("#wrapper_video"),	
				marginTop = parseInt(wrapper.css("marginTop")),
				marginLeft = parseInt(wrapper.css("marginLeft")),
				w = $(window).width() - marginLeft * 2,
				h = $(window).height() - marginTop;
			wrapper.width(w).height(h);
		}).resize();
*/

	});

}(jQuery));
