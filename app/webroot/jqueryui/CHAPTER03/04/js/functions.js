//ギャラリーのid名
var targetElementID = "photoGallery";
//キャプションのid名
var captionElementID = "caption";

$(document).ready(function() {

	//要素取得
	var targetElement = $("#" + targetElementID);
	var captionElement = $("#" + captionElementID);

	targetElement.find("li").bind({
		"reposition": function() {

			//現在のdurationを取得
			var speed = $(this).parent().data("roundabout").duration;
			//画像の回転角度を計算
			var degrees = $(this).data("roundabout").degrees;
			var roundaboutBearing = $(this).parent().data("roundabout").bearing;
			var rotateY = Math.round(degrees - roundaboutBearing);
			if(rotateY < 0) {
				rotateY = 360 + rotateY;
			}
				
			//背面へ移動した写真を隠し、前面に出た写真を表示する
			if(rotateY < 90 || rotateY > 270){
				$(this).show();
			}else{
				$(this).hide();
			}

			//限界角度を設定
			var fixangle = 30;
				
			//写真の回転が限界角度を超える場合に角度を固定する
			if(rotateY > fixangle && rotateY < 180){
				rotateY = fixangle;
			} else if(rotateY > 270 && rotateY < 360 - fixangle){
				rotateY = 360 - fixangle;
			}

			//CSSで画像を回転させる
			$(this).parent().css({
				"-moz-perspective": "500px",
			});
			$(this).css({
				"-webkit-transform": "perspective(500) rotateY(" + rotateY + "deg)",
				"transform": "perspective(500) rotateY(" + rotateY + "deg)",
				"-moz-transform": "rotateY(" + rotateY + "deg)"
			});
		}
	});

	//一つ前、一つ次へ送る
	targetElement.bind({
		"onNavigationClick": function(event, way) {
			switch(way){
				case "next" :
					$(this).roundabout("animateToNextChild");
					break;
				case "prev" :
					$(this).roundabout("animateToPreviousChild");
					break;
				default :
					break;
			}
		}
	});

	//アニメーション開始時に実行
	targetElement.bind({
		"animationStart": function() {
			//キャプションをフェードアウト
			var duration = $(this).data("roundabout").duration;
			captionElement.animate({opacity: 0}, duration / 2);
		}
	});

	//アニメーション終了時に実行
	targetElement.bind({
		"animationEnd": function() {
			//キャプションを書き変えてフェードイン
			swapCaption($(this), $(this).roundabout("getChildInFocus"));
		}
	});

	//キャプションの文字を差し替える
	function swapCaption(target, index) {
		var title = target.find("img").eq(index).attr("title")
		var duration = target.data("roundabout").duration;
		if(title){
			captionElement.html(title);
		} else {
			captionElement.html("&nbsp;");
		}
		captionElement.animate({opacity: 1}, duration / 2);
	}

	//Roundaboutをアクティベート
	var ra = targetElement.roundabout({
		minOpacity: 1,
		minScale: 0.7,
		maxScale: 1,
		duration: 500,
		easing: "easeOutCube",
		startingChild: 8
	});

	swapCaption(targetElement, ra.data("roundabout").startingChild);

});

//PREV、NEXTクリック時の処理
function turn(way) {
	$("#" + targetElementID).trigger("onNavigationClick", [way]);
}
