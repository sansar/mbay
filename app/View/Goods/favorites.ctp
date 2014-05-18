<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<style>
.btn {
    display: inline-block;
    padding: 10px;
    border-radius: 5px; /*optional*/
    color: #aaa;
    font-size: .875em;
}

.pagination {
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
}

.page {
    display: inline-block;
    padding: 0px 9px;
    margin-right: 4px;
    border-radius: 3px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    font-size: 20px;
    font-weight: bold;
    text-decoration: none !important;
    color: #717171;
    text-shadow: 0px 1px 0px rgba(255,255,255, 1);
}

.page:hover, .page.gradient:hover {
    background: #fefefe;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
    background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
}

.page.active {
    border: none;
    background: #616161;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
    color: #f0f0f0;
    text-shadow: 0px 0px 3px rgba(0,0,0, .5);
}

.page.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f8f8f8), to(#e9e9e9));
    background: -moz-linear-gradient(0% 0% 270deg,#f8f8f8, #e9e9e9);
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Animate :: Sample Website</title>

<link rel="stylesheet" type="text/css" media="all" href="/jqueryui/CHAPTER03/05/style.css" />
<link href='/css/css.css' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="/jqueryui/CHAPTER02/01/sample3/stylesheets/jquery.megamenu.css" type="text/css" media="screen" />
<link href="/jqueryui/CHAPTER02/01/sample3/base.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/css/cake.generic.css">

<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/jqueryui/CHAPTER03/05/js/jquery.backgroundPosition.js" type="text/javascript"></script>
<script src="/jqueryui/CHAPTER03/05/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="/jqueryui/CHAPTER02/01/sample3/javascripts/jquery.megamenu.js" type="text/javascript"></script>

<!--[if !IE]><!-->
<link rel="stylesheet" href="/css/category-style.css">
<!--<![endif]-->
<!--[if lt IE 9]>
  <link rel="stylesheet" href="http://cdn.css-tricks.com/wp-content/themes/CSS-Tricks-11/css/oldie.css">
  <![endif]-->
<!--[if IE 9]>
  <link rel="stylesheet" href="http://cdn.css-tricks.com/wp-content/themes/CSS-Tricks-11/style.css?v1.2">
  <![endif]-->
</head>
<body id="top" class="clothes">
	<div id="container">
		<div id="header">
			<a href="/"><img src="/img/logo.gif" style="margin: 10px 0px 0px -15px;"/></a>
			<div>
				<?php echo $this->element('menu-aim'); ?>
			</div>
		</div>

		<div id="main">
		<?php if (empty($items)): ?>
			<div>Тэмдэглэсэн бараа байхгүй байна.</div>
		<?php else: ?>
			<?php echo $this->element('pagination', array(
					'page_count' => $page_count,
					'item_per_page' => $item_per_page,
					'current_page' => $current_page,
					'page_url' => $page_url)); ?>
			<div class="module clearfix">
				<table>
					<thead>
						<tr>
							<th></th>
							<th>Зураг</th>
							<th>Гарчиг</th>
							<th>Үзсэн</th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($items as $item): ?>
					<tr>
						<td></td>
						<td>
							<div class="box even clearfix" style="width:140px; height: 200px;">
							<?php $item['image'] = $this->Image->get_images($item['goods']['secret_number']); ?>
							<?php foreach ($item['image'] as $key => $image):?>
								<img src="<?php echo $image['medium'];?>" <?php if ($key > 0) echo 'style="display:none"'; else echo 'class="active"';?>/>
							<?php endforeach;?>
							</div>
						</td>
						<td><a href="/goods/detail/<?php echo $item['goods']['id'];?>"><?php echo $item['goods']['overview']?></a></td>
						<td><?php echo $item['goods']['view_count']; ?></td>
					</tr>
				<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<?php echo $this->element('pagination', array(
					'page_count' => $page_count,
					'item_per_page' => $item_per_page,
					'current_page' => $current_page,
					'page_url' => $page_url)); ?>
		<?php endif; ?>
		</div>
		
		<div id="footer">
			<p>&copy; Sample Website All Rights Reserved.</p>
		</div>
	</div>
<script type="text/javascript">
$(function(){
	// 設定
	var $width      = 140;// 横幅
	var $height     = 200;// 高さ
	var $interval   = 1000;// 切り替わりの間隔(ミリ秒)
	var $fade_speed = 100;// フェード処理の早さ(ミリ秒)
	$(".box img").css({"position":"absolute", "max-width":"140px","max-height":"200px"});
	// フェードイン処理
	function show(elem){
		if (elem.find("img").length < 2) return;
		var $active = elem.find("img.active");
		var $next = $active.next("img").length?$active.next("img"):elem.find("img:first");
		$active.fadeOut($fade_speed).removeClass("active");
		$next.fadeIn($fade_speed).addClass("active");
	}
	$(".box").hover(function() {
		var me = $(this);
		timerID = setInterval(function(){show(me);}, $interval);
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
	});
});
</script>
</body>
</html>