$(function() {
	$("#breadCrumb").jBreadCrumb({
		maxFinalElementLength: 400, // 最後の明くリンクの最大 px これより長い場合はendElementsToLeaveOpenとbeginingElementsToLeaveOpenを減らす
		minFinalElementLength: 200, // これより長い場合はbeginingElementsToLeaveOpenを減らす
		minimumCompressionElements: 4, // これより要素が多ければ折りたたみが行われる
		endElementsToLeaveOpen: 1, // 最後からいくつ開けるか（0で最後だけ）
		beginingElementsToLeaveOpen: 1, // 先頭からいくつ開けるか（0で先頭だけ）
		timeExpansionAnimation: 800, // 閉じたリンクを開ける時間 msec
		timeCompressionAnimation: 500, // 開けたあと閉じる時間 msec
		timeInitialCollapse: 600, // ページ読み込み後に自動的に閉じる時間 msec
		//easing: null, // easingのタイプ easingプラグインが入っている場合はeaseOutQuad。入っていなければswingが初期値
		overlayClass: 'chevronOverlay', // 閉じたリンクに利用するクラス
		previewWidth: 30 // 閉じたリンクの文字表示部の幅 px
	});
});
$(function() {
	$('[title]', '#nav').tipsy({
		gravity: 's',
		fade: true,
		offset: 10
	});
	$('[title]', '#breadCrumb').tipsy({
		className: null,
		delayIn: 0, // 表示を遅らす msec
		delayOut: 0, // 非表示を遅らす msec
		fade: false, // fade in/out
		fallback: '', // titleが存在しない場合の初期文字列
		gravity: 'n', // tooltipに対するelementの方向（上下左右を東西南北で表現）
		html: false, // original-title内にhtmlを記述
		live: false, // live or bind
		offset: 0, // tooltipの表示位置の調整（指定のpx分elementから上下に離れる）
		opacity: 0.8, // tooltipの透過
		title: 'title', // tooltipに表示する文字列を指定するattribute もしくは無名関数の戻り値で指定することも可能
		trigger: 'hover' // トリガーとなるイベント manual で .tipsy('show/hide') で表示させられる
	});
/*
Using Tooltips on Form Inputs
Tooltips can be bound to form inputs' focus/blur events using the option {trigger: 'focus'}:
フォームで使う
*/
});
