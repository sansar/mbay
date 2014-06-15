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

		<?php echo $this->element('category_menu_clothes', array('category' => $category)); ?>
		<div id="main">

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
<svg class="hide">
	<defs>
		<path id="shape-tab" d="M100,25C79.568,25,84.815,0,59.692,0H11.149C5.027,0,0,4.634,0,10.385V25"></path>
		<path id="shape-tab-right" d="M0,25C20.432,25,15.185,0,40.308,0h48.543C94.973,0,100,4.634,100,10.385V25"></path>
	</defs>
</svg>
</body>
</html>