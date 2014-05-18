<?php if (isset($items)): ?>
<?php foreach ($items as $item): ?>
	<div class="box even clearfix">
		<div class="left">
			<div>
			<?php $item['image'] = $this->Image->get_images($item['goods']['secret_number']); ?>
			<?php foreach ($item['image'] as $key => $image):?>
				<img src="<?php echo $image['medium'];?>" style="width: 140px; max-height: 200px" <?php if ($key > 0) echo 'style="display:none"'; else echo 'class="active"';?>/>
			<?php endforeach;?>
			</div>
			<?php if ($item['goods']['pickup_flag']) {echo '<span class="green-ribbon">おすすめ</span>';}?>
			<div class="layer">
				<p class="more">
					<a href="/goods/detail/<?php echo $item['goods']['id'];?>">もっと詳しく</a>
				</p>
			</div>
		</div>
		<div class="right">
			<h4 style="height: 50px;word-wrap: break-word;"><?php echo $this->Truncate->truncate($item['goods']['overview'], 33); ?></h4>
			<p>
				<br /><?php echo $item['goods']['price']; ?>
			</p>
		</div>
	</div>
<?php endforeach; ?>
<?php endif; ?>
<?php if (isset($next_link)): ?>
	<div class="next" style="display:none">
		<a href="<?php echo $next_link; ?>">next page</a>
	</div>
<?php endif; ?>
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

		targetLayer = me.find(".layer");
		targetLayer.stop().animate({
			"margin-left": "15px",
			"width": "130px",
			"height": "190px",
			"opacity": "1"
		}, 200); 
	},
	function() {
		clearInterval(timerID);
		if ($(this).find("img").length > 1) {
			var $active = $(this).find("img.active");
			var $next = $(this).find("img:first");
			$active.hide().removeClass("active");
			$next.show().addClass("active");
			$(this).find("img").css("opacity","1");
		}
		targetLayer.stop().animate({
			"margin-left": "0",
			"width": "140px",
			"height": "200x",
			"opacity": "0"
		}, 400);
	});
});
</script>
