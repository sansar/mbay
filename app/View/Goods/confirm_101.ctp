<link href="/jqueryui/CHAPTER03/02/sample3/base.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/jqueryui/CHAPTER03/02/sample3/cloud-zoom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jqueryui/CHAPTER03/02/sample3/../jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/jqueryui/CHAPTER03/02/sample3/cloud-zoom.1.0.2.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<div id="header" class="clearfix">
			<div id="logo">
				<img src="/jqueryui/CHAPTER03/02/sample3/img/logo.png" alt="MdN ZAKKA かわいい雑貨のお店です。" width="330"
					height="25" />
			</div>

			<ul id="menu">
				<li><a href="#">生活雑貨</a></li>
				<li><a href="#">インテリア雑貨</a></li>
				<li><a href="#">手作り雑貨</a></li>
				<li><a href="#">その他の雑貨</a></li>
			</ul>
		</div>

		<div id="contents">
			<ul id="breadcrumbs">
				<li><a href="#">ホーム</a></li>
				<li>&nbsp;＞&nbsp;<a href="#">手作り雑貨</a></li>
				<li>&nbsp;＞&nbsp;ぬいぐるみ・雑貨</li>
			</ul>

			<div id="main-image">
				<a href='<?php echo $images[0]['big']; ?>' class='cloud-zoom' id='zoom1'
					rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4">
					<img src="<?php echo $images[0]['medium']; ?>" alt='' />
				</a>
			</div>

			<div id="outline">
				<h1>ぬいぐるみ・雑貨</h1>
				<p>
					手作りのかわいいぬいぐるみ・雑貨です。<br /> ナチュラルでぬくもりの ある当店オリジナル商品となります。<br />
					お友達へのプレゼントにもおススメ！です。<br /> 全商品送料無料ほか、お得なポイントサービスもご利用いただけます。
				</p>
				<p>
					価格：<br /> 各1,050円（税込）
				</p>
				<div id="thumbnail">
					<ul>
						<?php foreach($images as $image):?>
						<li><a href='<?php echo $image['big']; ?>' class='cloud-zoom-gallery'
							rel="useZoom: 'zoom1', smallImage: '<?php echo $image['medium']; ?>' ">
							<img src="<?php echo $image['tumb']; ?>" /></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<div id="footer">
<?php 
	echo $this->Form->create ( 'Good', array (
			'url' => '/goods/complete/101' 
	) );
	echo $this->Form->input ('token', array (
		'value' => $token,
		'type'  => 'hidden'
	));
	echo $this->Form->end ( __ ( 'Confirm', true ) );
?>
		</div>
	</div>
</body>
</html>