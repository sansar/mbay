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

	.navbar .dropdown-menu > li > a:hover {
		background-image: none;
		color: white;
		background-color: rgb(0, 129, 194);
		background-color: rgba(0, 129, 194, 0.5);
	}

	.navbar .dropdown-menu > li > a.maintainHover {
		color: white !important;
		background-color: #0081C2;
	}
	
	.dropdown-menu a {
		color: #0088cc !important;
		display: block;
		padding: 3px 20px;
		font-weight: normal;
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
					<input type="text" name="keywords" id="s" value="" />
				</form>
			</div>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="margin-top:5px;font-size: 20px">Категори сонгох</a>
						<ul class="dropdown-menu" role="menu">
							<li data-submenu-id="submenu-patas"><a href="#">Хувцас</a>
								<div id="submenu-patas" class="popover">
									<h3 class="popover-title"><a href="#">Хувцас</a></h3>
									<ul>
										<li><a href="#">Хувцас</a></li>
										<li><a href="#">Гутал</a></li>
										<li><a href="#">Акксесуар</a></li>
										<li><a href="#">Хүүхдийн хувцас</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div>
							</li>
							<li data-submenu-id="submenu-snub-nosed"><a href="#">Тавилга</a>
								<div id="submenu-snub-nosed" class="popover">
									<h3 class="popover-title"><a href="#">Тавилга</a></h3>
									<ul>
										<li><a href="#">Гал тогоо</a></li>
										<li><a href="#">Зочны өрөө</a></li>
										<li><a href="#">Унтлагын өрөө</a></li>
										<li><a href="#">Ажлын өрөө</a></li>
										<li><a href="#">Хүүхдийн өрөө</a></li>
										<li><a href="#">Оффис</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-duoc-langur"><a href="#">Цахилгаан бараа</a>
								<div id="submenu-duoc-langur" class="popover">
									<h3 class="popover-title"><a href="#">Цахилгаан бараа</a></h3>
									<ul>
										<li><a href="#">Компьютер</a></li>
										<li><a href="#">Гэр ахуй</a></li>
										<li><a href="#">Утас</a></li>
										<li><a href="#">Аппарат</a></li>
										<li><a href="#">Хөгжим</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-pygmy"><a href="#">Цуглуулга</a>
								<div id="submenu-pygmy" class="popover">
									<h3 class="popover-title"><a href="#">Цуглуулга</a></h3>
									<ul>
										<li><a href="#">Ном</a></li>
										<li><a href="#">CD/DVD/диск</a></li>
										<li><a href="#">Марк/тэмдэг</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-tamarin"><a href="#">Монголд үйлдвэрлэв</a>
								<div id="submenu-tamarin" class="popover">
									<h3 class="popover-title"><a href="#">Монголд үйлдвэрлэв</a></h3>
									<ul>
										<li><a href="#">Хувцас</a></li>
										<li><a href="#">Тавилга</a></li>
										<li><a href="#">Гэр ахуй</a></li>
										<li><a href="#">Гар урлал</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-monk"><a href="#">Бэлэг дурсгал</a>
								<div id="submenu-monk" class="popover">
									<h3 class="popover-title"><a href="#">Бэлэг дурсгал</a></h3>
									<ul>
										<li><a href="#">Эрэгтэй бэлэг</a></li>
										<li><a href="#">Эмэгтэй бэлэг</a></li>
										<li><a href="#">Хүүхдийн бэлэг</a></li>
										<li><a href="#">Төрсөн өдрийн бэлэг</a></li>
										<li><a href="#">Хуримын бэлэг</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
							<li data-submenu-id="submenu-gabon"><a href="#">Бусад</a>
								<div id="submenu-gabon" class="popover">
									<h3 class="popover-title"><a href="#">Бусад</a></h3>
									<ul>
										<li><a href="#">Тоног төхөөрөмж</a></li>
										<li><a href="#">Үйлдвэрлэл</a></li>
										<li><a href="#">Бусад</a></li>
									</ul>
								</div></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="nav-collapse collapse" style="float:right;padding-right:50px">
				<ul class="nav">
					<li class="active">
						<a class="dropdown-toggle setting-menu" data-toggle="dropdown" href="#" style="margin-top:5px;font-size: 15px">Тохиргоо</a>
						<ul class="dropdown-menu" role="menu">
						<?php if ($user):?>
							<li data-submenu-id="submenu-snub-nosed"><a href="/goods/step1">Бараа оруулах</a></li>
							<li data-submenu-id="submenu-duoc-langur"><a href="#">Тэмдэглэсэн бараа</a></li>
							<li data-submenu-id="submenu-pygmy"><a href="/users/logout">Гарах</a></li>
						<?php else:?>
							<li data-submenu-id="submenu-snub-nosed">
								<a class="fancybox fancybox.iframe" href="/users/register">Бүртгүүлэх</a>
							</li>
							<li data-submenu-id="submenu-duoc-langur">
								<a class="fancybox fancybox.iframe" href="/users/login">Нэвтрэх</a>
							</li>
						<?php endif;?>
						</ul>
					</li>
				</ul>
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

		$row.find("a").addClass("maintainHover");
	}

	function deactivateSubmenu(row) {
		var $row = $(row),
			submenuId = $row.data("submenuId"),
			$submenu = $("#" + submenuId);

		$submenu.css("display", "none");
		$row.find("a").removeClass("maintainHover");
	}

// 	$(".dropdown-menu li").click(function(e) {
// 		e.stopPropagation();
// 	});

	$(document).click(function() {
		$(".popover").css("display", "none");
		$("a.maintainHover").removeClass("maintainHover");
	});
</script>
