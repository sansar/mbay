<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Худалдааны сайт</title>
	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/styles-new.css" rel="stylesheet">
	<link href="css/jcarousel.skeleton.css" rel="stylesheet">


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.jcarousel.js"></script>
	<script src="js/jcarousel.skeleton.js"></script>
	<style type="text/css">.fancybox-margin{margin-right:0px;}</style>
</head>
<body>
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
	<div id="cover" data-index="0" style="width: 100%; height: 100%; -webkit-transition: 0ms; transition: 0ms; -webkit-transform: translate(0px, 0px) translateZ(0px);position: absolute; z-index: 100; display: none;">
	</div>
	<div class="topHeader section">
		<div class="dateHolder"><span class="iconDate"></span>2014.08.28 Пүрэв гариг <span class="iconClock"></span>18:53</div><!--end dateHolder-->

		<div class="socialHolder">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div><!--end socialHolder-->
		
		<?php if ($user == null): ?>
		<div class="loginHolder" style="z-index: 200">
			<a href="#" id="login">Нэвтрэх</a>  |  <a class="setting-menu fancybox fancybox.iframe" href="/users/register">Бүртгүүлэх</a>
			<div class="loginBox">
				<fieldset>
					<div id="validation" style="display: none"><span>email эсвэл нууц үг буруу байна.</span></div>
					<input id="username" type="email" name="Email" placeholder="Your email address" required>
					<input id="password" type="password" name="Password" placeholder="Password" required>
					<input class="buttonLogin" type="submit" name="login-submit" id="login-submit" value="Нэвтрэх"> 
					<div><a href="#">нууц үгээ мартсан бол</a></div>
				</fieldset>
				<fieldset class="facebookBox">
					<a href="/auth/facebook" class="buttonLogin-facebook" name="login-submit" id="login-submit"><div><a href="/auth/facebook" class="buttonLogin-facebook" name="login-submit" id="login-submit">Facebook</a></div>
				</fieldset>
			</div>
		</div><!--end userHolder-->
		<?php elseif ($user['role'] == ROLE_USER): ?>
		<div class="userHolder">
			<div id="userNameBox"><?php echo $user['first_name']; ?></div> |  <a href="/users/logout">Гарах</a>
			<div class="userBox">
				<ul class="userNav">
					<li><a href="/goods/step1">Бараа оруулах</a></li>
					<li><a href="/goods/mygoods">Миний бараа</a></li>
					<li><a href="#">Хувийн тохиргоо</a></li>
				</ul>
			</div>
		<?php else: ?>
		<div class="userHolder">
			<div id="userNameBox"><?php echo $user['first_name']; ?></div> |  <a href="/users/logout">Гарах</a>
			<div class="userBox">
				<ul class="userNav">
					<li><a href="/goods/createdlist">Барааны жагсаалт</a></li>
					<li><a href="/users/all">Хэрэглэгчийн жагсаалт</a></li>
					<li><a href="/users/admins">Админы жагсаалт</a></li>
				</ul>
			</div>
		<?php endif; ?>
		</div><!--end loginHolder-->
		<div class="basketHolder">
			Тэмдэглэсэн бараа <span class="basketNumber">0</span>
		</div><!--end basketHolder-->
	</div><!--end topHeader-->
	<div class="header section">
		<div class="logoHolder"><h1 class="logo"><a href="/">lets shop</a></h1></div><!--end logoHolder-->
		<div class="searchHolder">
			<form class="searchForm">
				<select class="searchSelect">
					<option>Бүх категори</option>
					<option>Хувцас</option>
					<option>Тавилга</option>
					<option>Цахилгаан бараа</option>
					<option>Цуглуулга</option>
					<option>Монголд үйлдвэрлэв</option>
					<option>Бэлэг дурсгал</option>
					<option>Бусад</option>
				</select>
				<input placeHolder="Хайх: " value="" class="searchInput"></input>
				<input class="buttonInput" type="submit" name="search-submit" id="search-submit" value="">
			</form>
		</div><!--end searchHolder-->
		<div class="bannerA1"></div><!--end banner-->
	</div><!--end header-->
	<div class="navHolder section">
		<div class="navBox">
			<ul class="nav">
				<li id="i-1"><a href="">Хувцас</a>
					<div class="navSubBox">
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Хувцас</h3></div>
								<ul class="navSub">
									<li><a href="#">Хувцас</a></li>
									<li><a href="#">Гутал</a></li>
									<li><a href="#">Гоёл зүүлт</a></li>
									<li><a href="#">Хүүхдийн хувцас</a></li>
									<li><a href="#">Бусад</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb002.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb003.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb004.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-2"><a href="">Тавилга</a>
					<div class="navSubBox" style="left: -78px;">
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-3"><a href="">Цахилгаан бараа</a>
					<div class="navSubBox" style="left: -160px;">
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-4"><a href="">Цуглуулга</a>
					<div class="navSubBox" style="left: -298px;">
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-5"><a href="">Монголд үйлдвэрлэв</a>
					<div class="navSubBox" style="left: -396px;">
						<div class="navSubMenu" >
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-6"><a href="">Бэлэг дурсгал</a>
					<div class="navSubBox" style="left: -568px;">
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
				<li id="i-7"><a href="">Бусад</a>
					<div class="navSubBox" style="left: -696px;" >
						<div class="navSubMenu">
							<div class="navSubItem">
								<div class="navSubTitle"><h3>Дэд цэсний гарчиг</h3></div>
								<ul class="navSub">
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
									<li><a href="#">Дэд цэс 1</a></li>
								</ul>
							</div>
						</div>
						<div class="navSubProduct">
							<div class="subnavTitleSpecial"><img src="images/subnav_special.png"></div>

							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>
							<div class="navSubProductItemBig"><a href="#"><img src="images/sub_thumb001.png" width="285px"></a></div>

						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="addProduct"><a href="#">Бараа оруулах</a></div>
	</div><!--end navHolder-->
	<div class="sliderHolder section">
		<div class="slider jcarousel-wrapper">

			<div class="jcarousel" data-jcarousel="true">
				<ul>
					<li><img src="images/slider001.png" /></li>
					<li><img src="images/slider002.png" /></li>
					<li><img src="images/slider003.png" /></li>
				</ul>
			</div>

			<div class="jcarousel-slider-info">
				<a data-jcarouselcontrol="true" href="#" class="jcarousel-control-prev inactive slider-prev">‹</a>

				<p data-jcarouselpagination="true" class="jcarousel-pagination slider-pagination">
					<a class="active" href="#1"></a>
					<a href="#2"></a>
					<a href="#3"></a>
				</p>

				<a data-jcarouselcontrol="true" href="#" class="jcarousel-control-next slider-next">›</a>
			</div>

			<img src="images/slider.jpg" style="display: none;" />
		</div>
		<div class="bannerB1"></div>
	</div><!--end slider-->
	<div class="sectionHolder section">
		<div class="sectionMid">
			<div class="homeProductHolder">
				<div class="titleHolder">
					<div class="title"><h2><a href="#">Онцлох</a></h2></div>
					<div class="sliderArrow">
						<a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true" ></a>
						<a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
					</div>
				</div><!--end titleHolder-->
				<div class="productHolder">

					<div class="jcarousel-wrapper">
					<div class="jcarousel" data-jcarousel="true">
					<ul>
						<li>
							<div class="productItem">
								<div class="productItemThumb">
									<div class="ribbonBox ribbonSold"></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div class="productItemThumb">
									<div class="ribbonBox ribbonSale"></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div class="productItemThumb">
									<div class="ribbonBox ribbonSpecial"></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div class="productItemThumb">
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
					</ul>
					</div>
					</div><!--end jcarousel wrapper-->


					
					
				</div><!--end special-->
			</div><!--end homeProductHolder-->
			<div class="homeProductHolder">
				<div class="titleHolder">
					<div class="title"><h2><a href="#">Эрэлт ихтэй</a></h2></div>
					<div class="sliderArrow">
						<a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true" ></a>
						<a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
					</div>
				</div><!--end titleHolder-->
				<div class="productHolder">
					<div class="jcarousel-wrapper">
					<div class="jcarousel" data-jcarousel="true">
					<ul>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
					</ul>
					</div>
					</div><!--end jcarousel wrapper-->
						
				</div><!--end suggest-->
			</div><!--end homeProductHolder-->
			<div class="homeProductHolder">
				<div class="titleHolder">
					<div class="title"><h2><a href="#">Сүүлд нэмэгдсэн</a></h2></div>
					<div class="sliderArrow">
						<a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true" ></a>
						<a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
					</div>
				</div><!--end titleHolder-->
				<div class="productHolder">
					
					<div class="jcarousel-wrapper">
					<div class="jcarousel" data-jcarousel="true">
					<ul>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
						<li>
							<div class="productItem">
								<div>
									<div></div>
									<img src="images/product_thumb.png">
								</div>
								<div>
									<h3><a href="#">Унадаг дугуй</a></h3>
									<p class="productPrice">650,000төг</p>
									<div class="productCategory"><a href="#">Бусад</a></div>
								</div>
							</div><!--end item-->
						</li>
					</ul>
					</div>
					</div><!--end jcarousel wrapper-->
					

				</div><!--end suggest-->
			</div><!--end homeProductHolder-->
		</div><!--end sectionMid-->
		<div class="widget">
			<div class="newsHolder section">
				<div class="titleHolder">
					<div class="title"><h2><a href="#">Мэдээ, мэдээлэл</a></h2></div>
				</div>

				<div class="newsItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="#" class="newsTitle">Интернэт худалдаагаар Sharp LC32-LE340MD телевизорыг 592₮-р худалдан авлаа</a>
					<p class="newsDate">19 минутын өмнө</p>
				</div><!--end newsItem-->
				<div class="newsItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="#" class="newsTitle">Интернэт худалдаагаар Sharp LC32-LE340MD телевизорыг 592₮-р худалдан авлаа</a>
					<p class="newsDate">43 минутын өмнө</p>
				</div><!--end newsItem-->
				<div class="newsItem">
					<a href="#" class="newsTitle">Интернэт худалдаагаар Sharp LC32-LE340MD телевизорыг 592₮-р худалдан авлаа</a>
					<p class="newsDate">1 цаг 23 минутын өмнө</p>
				</div><!--end newsItem-->
				<div class="newsItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="#" class="newsTitle">Интернэт худалдаагаар Sharp LC32-LE340MD телевизорыг 592₮-р худалдан авлаа</a>
					<p class="newsDate">2014.08.31</p>
				</div><!--end newsItem-->
			</div><!--end newsHolder-->
			
			<div class="shopHolder section">
				<div class="titleHolder">
					<div class="title"><h2><a href="#">Дэлгүүрүүд</a></h2></div>
				</div>
				<div class="shopItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="">Дэлгүүрийн нэр</a>
				</div><!--end shopItem-->
				<div class="shopItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="">Дэлгүүрийн нэр</a>
				</div><!--end shopItem-->
				<div class="shopItem">
					<a href="#"><img src="images/news_thumb.png" /></a>
					<a href="">Дэлгүүрийн нэр</a>
				</div><!--end shopItem-->
			</div><!--end shopHolder-->
			<div class="facebookHolder">
				<img src="images/facebook.png" />
			</div><!---->
		</div><!--end widget-->
	</div><!--end section-->
	<div class="seen section">
		<div class="titleHolder">
			<div class="title"><h2><a href="#">Таны үзсэн бараа</a></h2></div>
		</div>
		<div class="seenHolder">
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
			<div class="seenItem">
				<a href=""><img src="images/seen-thumb.jpg"></a>
				<a href="">Барааны нэр</a>
			</div><!--end seenItem-->
		</div>
	</div><!--end seen-->
	<div class="footer section">
		<div class="footerHolder section">
			<div class="footerItem footerNav">
				<div class="footerNavTitle"><h3>Бараа худалдан авах</h3></div>
				<ul class="footerNav">
					<li><a href="#">Таны сагсанд</a></li>
					<li><a href="#">Авах бараанууд</a></li>
					<li><a href="#">Ангилал</a></li>
					<li><a href="#">Бараа нийлүүлэгчид</a></li>
				</ul>
			</div><!--end footerNav-->
			<div class="footerItem footerNav">
				<div class="footerNavTitle"><h3>Бараа худалдах</h3></div>
				<ul class="footerNav">
					<li><a href="#">Бүртгүүлэх</a></li>
					<li><a href="#">Бараа оруулах</a></li>
					<li><a href="#">Миний бараанууд</a></li>
				</ul>
			</div><!--end footerNav-->
			<div class="footerItem footerNav">
				<div class="footerNavTitle"><h3>Бидний тухай</h3></div>
				<ul class="footerNav">
					<li><a href="#">Үйлчилгээний нөхцөл</a></li>
					<li><a href="#">Нууцлалын баталгаа</a></li>
					<li><a href="#">Асуулт хариулт</a></li>
				</ul>
			</div><!--end footerNav-->
			<div class="footerItem footerAddress">
				<div class="footerNavTitle"><h3>Холбоо барих</h3></div>
				<div class="footerAddressHolder">					
				    Утас : +976-77111670<br />
				    Факс : +976-70111670<br />
				    Шуудангийн хайрцаг : 2866, Улаанбаатар-211213, Монгол улс<br />
				    Цахим шуудан : <a href="mailto:info@email.mn">info@email.mn</a>
				</div>
			</div><!--end footerAddress-->
		</div>
		<div class="footerCopyright">
			<h1 class="footerLogo"><a href="#">lets shop</a></h1>
			<p>© 2013-2014 letsshop.mn. Зохиогчийн эрх хуулиар хамгаалагдсан.</p>
		</div>
	</div><!--end footer-->

	<script type="text/javascript">
		$(function() {
		    $('.jcarousel').jcarousel({
		        // Configuration goes here
		    });
		});

        $(function() {
			var $oe_menu		= $('.nav');
			var $oe_menu_items	= $oe_menu.children('li');

            $oe_menu_items.bind('mouseenter',function(){
				var $this = $(this);
				$this.addClass('slided selected');
				$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
					$oe_menu_items.not('.slided').children('div').hide();
					$this.removeClass('slided');
				});
			}).bind('mouseleave',function(){
				var $this = $(this);
				$this.removeClass('selected').children('div').css('z-index','1');
			});

			$oe_menu.bind('mouseenter',function(){
				var $this = $(this);
				$this.addClass('hovered');
			}).bind('mouseleave',function(){
				var $this = $(this);
				$this.removeClass('hovered');
				$oe_menu_items.children('div').hide();
			})
        });

        $( "#login").click(function() {
			if (!$(".loginBox").is(':visible')) {
				//$("#countryHolder").css("right","82px");
			  	$(".loginBox").show();
			  	$("#username").focus();
			  	$("#cover").show();
			}else{
				//$("#countryHolder").css("right","190px");
				$(".loginBox").hide();
				$("#cover").hide();
			}
			//$ ( "#benefits").css("display", "none");
			//$ ( "#country").css("right","410px");
		}); 
		$( "#userNameBox").click(function() {
			if (!$(".userBox").is(':visible')) {
				//$("#countryHolder").css("right","82px");
			  	$(".userBox").show();
			  	$("#cover").show();
			}else{
				//$("#countryHolder").css("right","190px");
				$(".userBox").hide();
				$("#cover").hide();
			}
			//$ ( "#benefits").css("display", "none");
			//$ ( "#country").css("right","410px");
		});
		$("#cover").click(function() {
			$(".loginBox").hide();
			$(".userBox").hide();
			$("#cover").hide();
		});
		$('#login-submit').click(function() {
	        $.ajax({
	            type: "POST",
	            url: 'users/login',
	            data: {
	            	'data[User][email]': $("#username").val(),
	            	'data[User][password]': $("#password").val()
	            },
	            success: function(data) {
	                if (data === 'Correct') {
	                    window.location.replace('/');
	                } else {
	                    alert(data);
	                }
	            }
	        });

	    });
    </script>

</body>
</html>