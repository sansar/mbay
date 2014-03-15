<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Animate :: Sample Website</title>
<link rel="stylesheet" type="text/css" media="all" href="/jqueryui/CHAPTER03/05/style.css" />
<link
	href='http://fonts.googleapis.com/css?family=Josefin+Sans:600|Tangerine'
	rel='stylesheet' type='text/css'>

</head>
<body id="top">
	<div id="container">
		<div id="header">
			<h1 id="logo">
				<a href="#"><span>S</span>ample <span>W</span>ebsite</a>
			</h1>
			<div>
				<form id="searchform" action="#" method="get">
					<input type="text" name="s" id="s" value="" />
				</form>
				<div id="navi">
					<ul class="clearfix">
					<?php if ($user == null): ?>
						<li><a class="current" href="#">Main</a></li>
						<li><a href="/users/add">Register</a></li>
						<li><a href="/users/login">Login</a></li>
						<li><a href="#">Contact</a></li>
					<?php else: ?>
						<li><a class="current" href="#">Main</a></li>
						<li><a href="/goods/step1">Add Good</a></li>
						<li><a href="/users/logout">Logout</a></li>
						<li><a href="#">Contact</a></li>
					<?php endif; ?>
					</ul>
				</div>

			</div>
		</div>
		<!-- /header -->
		<div id="main">
			<ul id="breadcrumb" class="clearfix">
				<li><a href="index.html">Home</a></li>
				<li>></li>
				<li>Menu</li>
			</ul>

			<h2>Lunch &amp; Cakes</h2>
			<div class="module clearfix">
				<div class="heading-box odd clearfix" style="width: 100px">
					<h3>Food</h3>
					<p>お得なセットメニューの他、たくさんのフードメニューを用意しております。</p>
				</div>
			<?php if ($clothes): ?>
			<?php foreach ($clothes as $cloth): ?>
				<div class="box even clearfix">
					<div class="left">
						<div>
						<?php foreach ($cloth['image'] as $key => $image):?>
							<img src="<?php echo $image;?>" width="140" height="200" <?php if ($key > 0) echo 'style="display:none"'; else echo 'class="active"';?>/>
						<?php endforeach;?>
						</div>
						<?php if ($cloth['goods']['pickup_flag']) {echo '<span class="green-ribbon">おすすめ</span>';}?>
						<div class="layer">
							<h5>Fruit tart</h5>
							<p>もっと詳しく</p>
							<p class="more">
								<a href="/goods/detail/<?php echo $cloth['goods']['id'];?>">もっと詳しく</a>
							</p>
						</div>
					</div>
					<div class="right">
						<h4><?php echo $cloth['goods']['overview']; ?></h4>
						<p>
							<br /><?php echo $cloth['goods']['price']; ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
			<?php endif; ?>
			</div>

			<div class="module clearfix">
				<div class="heading-box odd clearfix">
					<h3>Cake</h3>
					<p>ランチの後にケーキはいかがですか？コーヒー、紅茶のお得なセットもございます。</p>
				</div>
				<div class="box even clearfix">
					<div class="left">
						<div>
							<img src="/jqueryui/CHAPTER03/05/images/menu04.jpg" width="140" height="200" />
							<img src="/jqueryui/CHAPTER03/05/images/menu05.jpg" width="140" height="200" style="display: none"/>
						</div>
						<span class="orange-ribbon">おすすめ</span>
						<div class="layer">
							<h5>Fruit tart</h5>
							<p>もっと詳しく</p>
							<p class="more">
								<a href="http://www.mdn.co.jp/di/">もっと詳しく</a>
							</p>
						</div>
					</div>
					<div class="right">
						<h4>フルーツタルト</h4>
						<p>
							500円<br />ドリンクセット : <br />750円
						</p>
					</div>
				</div>
				<div class="box odd clearfix last">
					<div class="left">
						<img src="/jqueryui/CHAPTER03/05/images/menu05.jpg" width="140" height="94" alt="" />
						<span class="orange-ribbon">おすすめ</span>
						<div class="layer">
							<h5>Fruit roll</h5>
							<p>もっと詳しく</p>
							<p class="more">
								<a href="http://www.mdn.co.jp/di/">もっと詳しく&raquo;</a>
							</p>
						</div>
					</div>
					<div class="right">
						<h4>フルーツロール</h4>
						<p>
							500円<br />ドリンクセット : <br />750円
						</p>
					</div>
				</div>
				<div class="box even clearfix last">
					<div class="left">
						<img src="/jqueryui/CHAPTER03/05/images/menu06.jpg" width="140" height="94" alt="" /> <span
							class="orange-ribbon">おすすめ</span>
						<div class="layer">
							<h5>Chocolate</h5>
							<p>もっと詳しく</p>
							<p class="more">
								<a href="http://www.mdn.co.jp/di/">もっと詳しく</a>
							</p>
						</div>
					</div>
					<div class="right">
						<h4>チョコレート</h4>
						<p>
							500円<br />ドリンクセット :<br /> 750円
						</p>
					</div>
				</div>
			</div>

		</div>
		<!-- /main -->
		<!-- /sidebar -->

		<div id="footer">
			<p>&copy; Sample Website All Rights Reserved.</p>
		</div>
	</div>
	<!-- /container -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="/jqueryui/CHAPTER03/05/js/jquery.backgroundPosition.js" type="text/javascript"></script>
	<script src="/jqueryui/CHAPTER03/05/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script type="text/javascript">
$(function(){
	$('#navi a:not(.current)').hover(
		function() {$(this).stop().animate({"background-position" :"(50% -25px)"},300,'easeOutBack');},
		function() {$(this).stop().animate({"background-position" :"(50% -100px)"},100);}
	);

	// 設定
	var $width      = 140;// 横幅
	var $height     = 200;// 高さ
	var $interval   = 1000;// 切り替わりの間隔(ミリ秒)
	var $fade_speed = 200;// フェード処理の早さ(ミリ秒)
	// 開始処理
	$(".crossFade").css({"position":"relative", "overflow":"hidden", "width":$width, "height":$height});
	$(".box img").css({"position":"absolute", "top":0, "left":0});
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
		if (elem.find("img").length < 2) return;
		var $active = elem.find("img.active");
		var $next = $active.next("img").length?$active.next("img"):elem.find("img:first");
		$active.fadeOut($fade_speed).removeClass("active");
		$next.fadeIn($fade_speed).addClass("active");
	}
	
	$(".layer").css("opacity","0");
 	$(".box").click(function(){
		window.location=$(this).find("a").attr("href");
		return false;
	}).hover(function() {
		var me = $(this);
		timerID = setInterval(function(){show(me);}, $interval);
		
		targetImage = me.find("img");
		targetImage.stop().animate({
			"margin-top": "-10px",
			"margin-left": "-10px",
			"width": "150px",
			"height": "210px"
		}, 200);

		targetSpan = me.find("span");
		targetSpan.stop().animate({
			"margin-top": "-10px"
		}, 200);

		targetLayer = me.find(".layer");
		targetLayer.stop().animate({
			"margin-top": "-10px",
			"margin-left": "-10px",
			"width": "130px",
			"height": "190px",
			"opacity": "1"
        }, 200); 
        
    },
    function() {
		clearInterval(timerID);
    	targetImage.stop().animate({
       	    "margin-top": "0",
       	    "margin-left": "0",
       	    "width": "140px",
       	    "height": "200px"
       	}, 400);
       	targetSpan.stop().animate({
			"margin-top": "0"
        }, 400);
        targetLayer.stop().animate({
			"margin-top": "0",
			"margin-left": "0",
			"width": "140px",
       	    "height": "200x",
       	    "opacity": "0"
        }, 400);
    });
});
</script>
</body>
</html>