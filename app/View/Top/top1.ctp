<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
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
<body id="top" class="gift">
	<div id="container">
		<div id="header">
			<img src="/img/logo.gif" style="margin: 10px 0px 0px -15px;"/>
			<div>
				<?php echo $this->element('searchbox'); ?>
				<div id="navi">
					<ul class="clearfix">
					<?php if ($user == null): ?>
						<li><a class="current" href="/">Main</a></li>
						<li><a href="/users/add">Register</a></li>
						<li><a href="/users/login">Login</a></li>
						<li><a href="#">Contact</a></li>
					<?php else: ?>
						<li><a class="current" href="/">Main</a></li>
						<li><a href="/goods/step1">Add Good</a></li>
						<li><a href="/users/logout">Logout</a></li>
						<li><a href="#">Contact</a></li>
					<?php endif; ?>
					</ul>
				</div>

			</div>
		</div>
		<div class="page-wrap">
	
			<nav class="main-nav" id="main-nav">
				<a href="./CSS-Tricks.html" class="clothes" style="width:200px">
					<svg viewBox="0 0 100 25" class="shape-tab">
						<use xlink:href="#shape-tab"></use>
					</svg>
					<span>Хувцас</span>
				</a>
				<a href="./CSS-Tricks-2.html" class="furnitures">
					<svg viewBox="0 0 100 25" class="shape-tab">
	      				<use xlink:href="#shape-tab"></use>
	    			</svg>
					<span>Тавилга</span>
				</a>
				<a href="./CSS-Tricks-3.html" class="electronics">
					<svg viewBox="0 0 100 25" class="shape-tab">
						<use xlink:href="#shape-tab"></use>
	    			</svg>
					<span>Цахилгаан бараа</span>
				</a>
				<a href="./CSS-Tricks-4.html" class="collections">
					<svg viewBox="0 0 100 25" class="shape-tab">
	      				<use xlink:href="#shape-tab"></use>
	    			</svg>
					<span>Цуглуулга</span>
				</a>
				<a href="./CSS-Tricks-5.html" class="mongolians">
					<svg viewBox="0 0 100 25" class="shape-tab">
	      				<use xlink:href="#shape-tab"></use>
	    			</svg>
					<span>Монголд үйлдвэрлэв</span>
				</a>
				<a href="./CSS-Tricks-5.html" class="gifts">
					<svg viewBox="0 0 100 25" class="shape-tab">
	      				<use xlink:href="#shape-tab"></use>
	    			</svg>
					<span>бэлэг дурсгал</span>
				</a>
				<a href="./CSS-Tricks-6.html" class="other">
					<svg viewBox="0 0 100 25" class="shape-tab-right">
	      				<use xlink:href="#shape-tab-right"></use>
	    			</svg>
					<span>бусад</span>
				</a>
			</nav>
		</div>
		<div id="main">

			<h2>Lunch &amp; Cakes</h2>
			<div class="module clearfix">
				<div class="heading-box odd clearfix" style="width: 100px">
					<h3>Хувцас</h3>
					<form style="margin-left:-25px">
						<div class="submit">
							<input type="submit" value="Цааш үзэх" onclick="window.location='/goods/category/10';return false;">
						</div>
					</form>
				</div>
				<div>
				<?php echo $this->element('items', array('items' => $clothes)); ?>
				</div>
			</div>
		</div>
		
		<div id="footer">
			<p>&copy; Sample Website All Rights Reserved.</p>
		</div>
	</div>
<svg class="hide">
	<defs>
		<path id="shape-tab" d="M100,25C79.568,25,84.815,0,59.692,0H11.149C5.027,0,0,4.634,0,10.385V25"></path>
		<path id="shape-tab-right" d="M0,25C20.432,25,15.185,0,40.308,0h48.543C94.973,0,100,4.634,100,10.385V25"></path>
	</defs>
</svg>
</body>
</html>