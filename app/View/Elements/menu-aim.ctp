<link rel="stylesheet" type="text/css" href="/css/fancybox/jquery.fancybox.css">
<script src="/js/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
<style type="text/css">
	.fancybox-custom .fancybox-skin {
		box-shadow: 0 0 50px #222;
	}
</style>
<link rel="stylesheet" type="text/css" href="/css/flat-dropdown/flat-dropdown.css">
<link rel="stylesheet" type="text/css" href="/css/flat-dropdown/fontello.css">
<link rel="stylesheet" type="text/css" href="/css/flat-dropdown/dzyngiri.css">
<link href="/css/menu-aim/bootstrap.css" rel="stylesheet">
<style>
  body {
	padding-top: 60px;
  }
</style>
<style>
	.navbar .popover {
		width: 400px;
		-webkit-border-top-left-radius: 0px;
		-webkit-border-bottom-left-radius: 0px;
		border-top-left-radius: 0px;
		border-bottom-left-radius: 0px;
		overflow: hidden;
	}

	.navbar .popover-content {
		text-align: center;
	}

	.navbar .popover-content img {
		height: 212px;
		max-width: 250px;
	}

	.navbar .dropdown-menu {
		-webkit-border-top-right-radius: 0px;
		-webkit-border-bottom-right-radius: 0px;
		border-top-right-radius: 0px;
		border-bottom-right-radius: 0px;

		-webkit-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
		box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
	}

	.navbar .dropdown-menu > li > span:hover {
		background-image: none;
		color: white;
		background-color: rgb(0, 129, 194);
	}

	.navbar .dropdown-menu > li > span.maintainHover {
		color: white !important;
		background-color: #0081C2;
	}
	
	.dropdown-menu span {
		color: #0088cc !important;
		display: block;
		padding: 3px 20px;
		font-weight: normal;
		cursor: pointer;
	}
	.dropdown-menu span:hover {
		color: #fff !important;
		background-color: #0081C2;
	}
	.dropdown-menu a {
		color: #0088cc !important;
		display: block;
		padding: 3px 20px;
		font-weight: normal;
		cursor: pointer;
	}
	.dropdown-menu a:hover {
		color: #fff !important;
		background-color: #0081C2;
	}
</style>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div>
				<form id="searchform" action="/goods/search" method="get">
					<input type="text" name="keywords" data-toggle="dropdown" value="<?php echo isset($keyword) ? $keyword : ""; ?>" id="s" placeholder="ХАЙХ: " autocomplete="off"/>
						<ul class="dropdown-menu" role="menu">
							<li>
								<span alt="">Бүх категори</span>
								<div class="popover"></div>
							</li>
							<li data-submenu-id="submenu-snub">
								<span alt="10">Хувцас</span>
								<div id="submenu-snub" class="popover">
									<h3 class="popover-title"><span alt="10">Хувцас</span></h3>
									<ul>
										<li><span alt="101">Хувцас</span></li>
										<li><span alt="102">Гутал</span></li>
										<li><span alt="103">Акксесуар</span></li>
										<li><span alt="104">Хүүхдийн хувцас</span></li>
										<li><span alt="105">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-snub-nosed">
								<span alt="20">Тавилга</span>
								<div id="submenu-snub-nosed" class="popover">
									<h3 class="popover-title"><span alt="20">Тавилга</span></h3>
									<ul>
										<li><span alt="201">Гал тогоо</span></li>
										<li><span alt="202">Зочны өрөө</span></li>
										<li><span alt="203">Унтлагын өрөө</span></li>
										<li><span alt="204">Ажлын өрөө</span></li>
										<li><span alt="205">Хүүхдийн өрөө</span></li>
										<li><span alt="206">Оффис</span></li>
										<li><span alt="207">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-duoc-langur">
								<span alt="30">Цахилгаан бараа</span>
								<div id="submenu-duoc-langur" class="popover">
									<h3 class="popover-title"><span alt="30">Цахилгаан бараа</span></h3>
									<ul>
										<li><span alt="301">Компьютер</span></li>
										<li><span alt="302">Гэр ахуй</span></li>
										<li><span alt="303">Утас</span></li>
										<li><span alt="304">Аппарат</span></li>
										<li><span alt="305">Хөгжим</span></li>
										<li><span alt="306">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-pygmy">
								<span alt="40">Цуглуулга</span>
								<div id="submenu-pygmy" class="popover">
									<h3 class="popover-title"><span alt="40">Цуглуулга</span></h3>
									<ul>
										<li><span alt="401">Ном</span></li>
										<li><span alt="402">CD/DVD/диск</span></li>
										<li><span alt="403">Марк/тэмдэг</span></li>
										<li><span alt="404">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-tamarin">
								<span alt="50">Монголд үйлдвэрлэв</span>
								<div id="submenu-tamarin" class="popover">
									<h3 class="popover-title"><span alt="50">Монголд үйлдвэрлэв</span></h3>
									<ul>
										<li><span alt="501">Хувцас</span></li>
										<li><span alt="502">Тавилга</span></li>
										<li><span alt="503">Гэр ахуй</span></li>
										<li><span alt="504">Гар урлал</span></li>
										<li><span alt="505">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-monk">
								<span alt="60">Бэлэг дурсгал</span>
								<div id="submenu-monk" class="popover">
									<h3 class="popover-title"><span alt="60">Бэлэг дурсгал</span></h3>
									<ul>
										<li><span alt="601">Эрэгтэй бэлэг</span></li>
										<li><span alt="602">Эмэгтэй бэлэг</span></li>
										<li><span alt="603">Хүүхдийн бэлэг</span></li>
										<li><span alt="604">Хуримын бэлэг</span></li>
										<li><span alt="605">Бусад</span></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-gabon">
								<span alt="70">Бусад</span>
								<div id="submenu-gabon" class="popover">
									<h3 class="popover-title"><span alt="70">Бусад</span></h3>
									<ul>
										<li><span alt="701">Тоног төхөөрөмж</span></li>
										<li><span alt="702">Үйлдвэрлэл</span></li>
										<li><span alt="703">Бусад</span></li>
									</ul>
								</div></li>
						</ul>
					<input type="hidden" name="category" id="category" value="<?php echo isset($category_id) ? $category_id : ""; ?>"/>
				</form>
			</div>
			<div class="nav-collapse collapse" style="float:right;padding-right:10px">
			<?php if ($user):?>
			<div class="fdropdown"> <span class="fdropdown-toggle" tabindex="0"></span>
				<div class="fdropdown-text"><?php echo $user['first_name']; ?><i class="ficon-user ficon"></i></div>
				<ul class="fdropdown-content">
					<li><a href="/goods/step1">Бараа оруулах<i class="ficon-edit ficon"></i></a></li>
					<li><a href="/goods/mygoods">Миний бараа<i class="ficon-picture ficon"></i></a></li>
					<li><a href="/goods/favorites">Тэмдэглэсэн бараа<i class="ficon-link ficon"></i></a></li>
					<li><a href="#">Хувийн тохиргоо<i class="ficon-wrench ficon"></i></a></li>
					<li><a href="/users/logout">Гарах<i class="ficon-logout ficon"></i></a></li>
				</ul>
			</div>
			<?php else:?>
				<ul class="nav">
					<li class="active">
						<a class="setting-menu fancybox fancybox.iframe" href="/users/login">Нэвтрэх</a>
					</li>
				</ul>
				<ul class="nav">
					<li class="active">
						<a class="setting-menu fancybox fancybox.iframe" href="/users/register">Бүртгүүлэх</a>
					</li>
				</ul>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<script src="/js/menu-aim/jquery.menu-aim.js" type="text/javascript"></script>
<script src="/js/menu-aim/bootstrap.min.js" type="text/javascript"></script>
<script>
	var $menu = $(".dropdown-menu");
	$menu.menuAim({
		activate: activateSubmenu,
		deactivate: deactivateSubmenu
	});

	function activateSubmenu(row) {
		var $row = $(row),
			submenuId = $row.data("submenuId"),
			$submenu = $("#" + submenuId),
			height = $submenu.find('li').length * 26 + 50,
			width = $menu.outerWidth();

		$submenu.css({
			display: "block",
			top: -1,
			left: width - 3,
			height: height - 4
		});
	}

	function deactivateSubmenu(row) {
		var $row = $(row),
			submenuId = $row.data("submenuId"),
			$submenu = $("#" + submenuId);

		$submenu.css("display", "none");
	}

	$(".dropdown-menu li span").click(function(e){
		var target=$(e.currentTarget);
		$("#s").attr('placeholder', 'ХАЙХ: ' + target.text());
		$("#category").attr("value", target.attr("alt"));
		$("#s").focus();
	});
	$(".dropdown-menu ul li span").click(function(e){
		var target = $(e.currentTarget);
		$("#s").attr('placeholder', 'ХАЙХ: ' + target.parent().parent().prev().text() + " - " + target.text());
		$("#category").attr("value", target.attr("alt"));
		$("#s").focus();
});
	$(".dropdown-menu h3 span").click(function(e) {
		var target = $(e.currentTarget);
		$("#s").attr('placeholder', 'ХАЙХ: ' + target.text());
		$("#category").attr("value", target.attr("alt"));
		$("#s").focus();
});
	$(document).click(function() {
		$(".popover").css("display", "none");
		$("a.maintainHover").removeClass("maintainHover");
	});
</script>
