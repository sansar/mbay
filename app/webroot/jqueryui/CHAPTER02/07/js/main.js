$(function(){
	var $target = $('.fs-text');
	// クッキーの保存期限
	var expires = (function(){
		// 翌年の次月初日を返す（当月末までクッキーを使用可能）
		var d = new Date();
		var result = (new Date(d.getFullYear() + 1, d.getMonth() + 1, 1));
		return result;
	})();
	// フォントサイズ変更機能を使用する
	$target.fontSizer({
		callback: function(size) {
			// ブラウザがクッキーに対応しているかどうかテスト
			if ($.cookies.test()) {
				// 変更後のフォントサイズをクッキーに保存する
				$.cookies.set('fontSize', '' + size.after, {expiresAt: expires});
			}
		},
		minSize: 12,		// 最小フォントサイズ(px)
		maxSize: 18,		// 最大フォントサイズ(px)
		increment: 2,		// 加減サイズ(px)
		controls: true,		// ＋ーボタンの自動挿入
		imageDir: 'img/'	// ＋ーボタンアイコンのフォルダ
	});
	// ページ表示時にクッキーの値を読み出す
	if ($.cookies.test()) {
		var fs = $.cookies.get('fontSize');
		$target.fontSizer(fs);
	}
	
});
