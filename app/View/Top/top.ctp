<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>サンプルその２｜Quicksand</title>

<link href="/jqueryui/CHAPTER03/03/css/common.css" rel="stylesheet" type="text/css">
<link href="/jqueryui/CHAPTER03/03/css/quicksand_radio.css" rel="stylesheet" type="text/css">

<script src="/jqueryui/CHAPTER03/03/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/jqueryui/CHAPTER03/03/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="/jqueryui/CHAPTER03/03/js/jquery.quicksand.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

<script type="text/javascript">
// データ比較用（1つのリストデータを使い回すための記述）
(function($) {
$.fn.sorted = function(customOptions) {
var options = {
reversed: false,
by: function(a) { return a.text(); }
};
$.extend(options, customOptions);
$data = $(this);
arr = $data.get();
arr.sort(function(a, b) {
var valA = options.by($(a));
var valB = options.by($(b));
if (options.reversed) {
return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
} else {
return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
}
});
return $(arr);
};
})(jQuery);

// Quicksand設定
$(function() {

// フォーム内のラジオボタンに関連づけ
var $filterType = $('#filter input[name="type"]');
var $filterSort = $('#filter input[name="sort"]');

// 最初のデータセットを取得する
var $goodsList = $('#goodsList .all');

// 2番目以降のデータセットを取得する（最初のデータのクローンを利用）
var $data = $goodsList.clone();

// フォームに変更があったときにQuicksandを呼び出す
$filterType.add($filterSort).change(function(e) {
if ($($filterType+':checked').val() == 'all') {
var $filteredData = $data.find('li');
} else {
var $filteredData = $data.find('li[data-type=' + $($filterType+":checked").val() + ']');
}

// 価格(price)でソートした場合
if ($('#filter input[name="sort"]:checked').val() == "price") {
var $sortedData = $filteredData.sorted({
by: function(v) {
return parseFloat($(v).find('dt + dd').text());
}
});
} else {
// 価格(price)以外（※この場合は名前(name)）でソートした場合
var $sortedData = $filteredData.sorted({
by: function(v) {
return $(v).find('dt span').text();
}
});
} 

// アニメの設定
$goodsList.quicksand($sortedData, {
duration: 800,
easing: 'easeInOutQuad'
});

});

});
</script>


</head>
<body>
	<header>
		<h1>
			<a href="#"><img src="/jqueryui/CHAPTER03/03/img/h-logo.png" alt="Fashion site" width="352" height="67"></a>
		</h1>
		<nav>
			<ul>
				<li class="home"><a href="#">Home</a></li>
				<li class="simple"><a href="#" class="this">Simple</a></li>
				<li class="gorgeous"><a href="#">Gorgeous</a></li>
				<li class="princess"><a href="#">Princess</a></li>
				<li class="elegant"><a href="#">Elegant</a></li>
				<li class="contact"><a href="#">Contact</a></li>
			</ul>
		</nav>

		<form>
			<input type="text" name="q" size="31" />
			<button type="submit" value="検索">検索</button>
		</form>

		<a href="#" class="cart">カートを見る</a>
	</header>

	<section>

		<div id="sortButtons">
			<p>アイテムを絞り込む</p>
			<form id="filter">
				<input type="radio" name="type" value="all" checked="checked"
					id="filter_all"><label class="all" for="filter_all">all</label> <input
					type="radio" name="type" value="tops" id="filter_top"><label
					class="tops" for="filter_top">Top</label> <input type="radio"
					name="type" value="bottoms" id="filter_bottoms"><label
					class="bottoms" for="filter_bottoms">Bottom</label> <input
					type="radio" name="type" value="accessory" id="filter_accessory"><label
					class="accessory" for="filter_accessory">Accessories</label> <input
					type="radio" name="sort" value="price" checked="checked"
					id="filter_price"><label class="price" for="filter_price">Price</label>
				<input type="radio" name="sort" value="name" id="filter_name"><label
					class="name" for="filter_name">Name</label>
			</form>
		</div>

		<header>
			<h1>Simple</h1>
			<h2>余計なものはなにもない。だけどキュートもクールもここにある。</h2>
		</header>

		<div id="goodsList">
			<ul class="all">
				<!--全部-->
				<li data-id="g001" data-type="bottoms"><img src="/jqueryui/CHAPTER03/03/img/g001.png"
					width="150" height="150" alt="商品写真：緑の花柄スカート">
					<dl>
						<dt>
							<span>みどりのはながらすかーと</span>緑の花柄スカート
						</dt>
						<dd>39,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g002" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g002.png"
					width="150" height="150" alt="商品写真：2Wayバック">
					<dl>
						<dt>
							<span>2うぇいばっく</span>2Wayバック
						</dt>
						<dd>9,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g003" data-type="bottoms"><img src="/jqueryui/CHAPTER03/03/img/g003.png"
					width="150" height="150" alt="商品写真：デニムとレースのスカート">
					<dl>
						<dt>
							<span>でにむとれーすのすかーと</span>デニムとレースのスカート
						</dt>
						<dd>5,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g004" data-type="tops"><img src="/jqueryui/CHAPTER03/03/img/g004.png"
					width="150" height="150" alt="商品写真：シワ加工ブラウス">
					<dl>
						<dt>
							<span>しわかこうぶらうす</span>シワ加工ブラウス
						</dt>
						<dd>19,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g005" data-type="bottoms"><img src="/jqueryui/CHAPTER03/03/img/g005.png"
					width="150" height="150" alt="商品写真：ストライプサテンスカート">
					<dl>
						<dt>
							<span>すとらいぷさてんすかーと</span>ストライプサテンスカート
						</dt>
						<dd>29,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g006" data-type="tops"><img src="/jqueryui/CHAPTER03/03/img/g006.png"
					width="150" height="150" alt="商品写真：花柄ふわゆるブラウス">
					<dl>
						<dt>
							<span>はながらふわゆるぶらうす</span>花柄ふわゆるブラウス
						</dt>
						<dd>30,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g007" data-type="bottoms"><img src="/jqueryui/CHAPTER03/03/img/g007.png"
					width="150" height="150" alt="商品写真：花柄刺繍のデニム">
					<dl>
						<dt>
							<span>はながらししゅうのでにむ</span>花柄刺繍のデニム
						</dt>
						<dd>10,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g008" data-type="tops"><img src="/jqueryui/CHAPTER03/03/img/g008.png"
					width="150" height="150" alt="商品写真：デニムトップ">
					<dl>
						<dt>
							<span>でにむとっぷ</span>デニムトップ
						</dt>
						<dd>25,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g009" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g009.png"
					width="150" height="150" alt="商品写真：マルチカラー ピアス">
					<dl>
						<dt>
							<span>まるちからーぴあす</span>マルチカラー ピアス
						</dt>
						<dd>39,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g010" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g010.png"
					width="150" height="150" alt="商品写真：麻糸のキャスケット">
					<dl>
						<dt>
							<span>あさいとのきゃすけっと</span>麻糸のキャスケット
						</dt>
						<dd>17,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g011" data-type="tops"><img src="/jqueryui/CHAPTER03/03/img/g011.png"
					width="150" height="150" alt="商品写真：襟フリルブラウス">
					<dl>
						<dt>
							<span>えりふりるぶらうす</span>襟フリルブラウス
						</dt>
						<dd>19,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g012" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g012.png"
					width="150" height="150" alt="商品写真：水玉ストール">
					<dl>
						<dt>
							<span>みずたますとーる</span>水玉ストール
						</dt>
						<dd>29,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g013" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g013.png"
					width="150" height="150" alt="商品写真：毛糸のキャスケット">
					<dl>
						<dt>
							<span>けいとのきゃすけっと</span>毛糸のキャスケット
						</dt>
						<dd>18,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g014" data-type="tops"><img src="/jqueryui/CHAPTER03/03/img/g014.png"
					width="150" height="150" alt="商品写真：赤い花のカットソー">
					<dl>
						<dt>
							<span>あかいはなのかっとそー</span>赤い花のカットソー
						</dt>
						<dd>10,800</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
				<li data-id="g015" data-type="accessory"><img src="/jqueryui/CHAPTER03/03/img/g015.png"
					width="150" height="150" alt="商品写真：キュートキャットバック">
					<dl>
						<dt>
							<span>きゅーときゃっとばっく</span>キュートキャットバック
						</dt>
						<dd>105,000</dd>
						<dd>
							<a href="#">more</a>
						</dd>
					</dl></li>
			</ul>
		</div>

	</section>

	<footer>
		<ul>
			<li><a href="#">会社概要</a></li>
			<li><a href="#">よくある質問</a></li>
			<li><a href="#">お問い合わせ</a></li>
		</ul>
		<small>©2012 Fashion Site</small>
	</footer>

</body>
</html>