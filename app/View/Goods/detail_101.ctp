<link href="/css/confirm/base.css" rel="stylesheet" type="text/css" media="screen" />
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
			
			<div id="thumbnail">
				<ul>
				<?php $images = $this->Image->get_images($data['secret_number']); ?>
				<?php foreach($images as $image):?>
				<?php if ( isset($image['tumb']) ): ?>
					<li style="margin-bottom: 5px"><a href='<?php echo $image['big']; ?>' class='cloud-zoom-gallery'
						rel="useZoom: 'zoom1', smallImage: '<?php echo $image['medium']; ?>' ">
						<img src="<?php echo $image['tumb']; ?>" style="max-width: 100px"/></a>
					</li>
				<?php endif; ?>
				<?php endforeach; ?>
				</ul>
			</div>
			
			<div id="main-image">
				<a href='<?php echo $images[0]['big']; ?>' class='cloud-zoom' id='zoom1'
					rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4">
					<img src="<?php echo $images[0]['medium']; ?>" style="max-width: 400px"/>
				</a>
			</div>

			<div id="outline">
				<h1><?php echo $data['overview']; ?></h1>
				<p><?php echo $data['detail']; ?></p>
				<p>
					価格：<br /> <strong><?php echo $data['price']; ?></strong>
				</p>
				<p>Condition: <?php echo $data['cond']?></p>
			</div>
		</div>

		<div id="footer">
			<input type="submit" value="Back" onClick="history.back(); return false;" />
		</div>
	</div>
</body>
</html>