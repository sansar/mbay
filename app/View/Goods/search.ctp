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
<script type="text/javascript" src="/js/jquery.jscroll.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.scroll').jscroll({
			autoTrigger: true,
			loadingHtml: '<small>Loading...</small>',
			nextSelector: '.next a:last',
		});
	});
</script>
</head>
<body id="top">
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
		
		<div id="main">
			<ul id="breadcrumb" class="clearfix">
				<li><a href="/">Top</a></li>
				<li>></li>
				<li>Search</li>
			</ul>

			<h2>Lunch &amp; Cakes</h2>
			<div class="module clearfix">
				<div class="heading-box odd clearfix">
					<h3>Хувцас</h3>
				</div>
				<div class="scroll" style="display:flex">
				<?php echo $this->element('items', array('items' => $items, 'next_link' => $next_link)); ?>
				</div>
			</div>
		</div>

		<div id="footer">
			<p>&copy; Sample Website All Rights Reserved.</p>
		</div>
	</div>
</body>
</html>