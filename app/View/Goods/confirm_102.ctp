<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>sample</title>

<link rel="stylesheet" type="text/css" media="all" href="/jqueryui/CHAPTER03/05/style.css" />
<link rel="stylesheet" type="text/css" href="/css/cake.generic.css">
<link href="/css/confirm/base.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/jqueryui/CHAPTER03/02/sample3/cloud-zoom.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/jqueryui/CHAPTER03/02/sample2/cloud-zoom.1.0.2.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=772387386121258&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="container">
	<div id="header">
		<div>
			<?php echo $this->element('menu-aim'); ?>
		</div>
	</div>
	<div id="main">
		<div id="thumbnail">
			<ul>
			<?php $images = $this->Image->get_images($this->request->data['images']['dirpath']); ?>
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
		<div id="main-image" style="margin-bottom: 10px">
			<a href='<?php echo $images[0]['big']; ?>' class='cloud-zoom' id='zoom1' rel="position: 'right' , zoomWidth:460, adjustX: 16, adjustY:-4, softFocus:true">
				<img src="<?php echo $images[0]['medium']; ?>" alt='' title="Zoom зураг" />
			</a>
		</div>
		
		<div id="outline">
			<h1><?php echo $data['Good']['overview']; ?></h1>
			<div><?php echo $data['Good']['detail']; ?></div>
			<div> <br />Төлөв : <br />
				<?php $conditions = array (
					CONDITION_1 => __ ( 'very old', true ),
					CONDITION_2 => __ ( 'old', true ),
					CONDITION_3 => __ ( 'middle', true ),
					CONDITION_4 => __ ( 'almost new', true ),
					CONDITION_5 => __ ( 'new', true ));
					echo $conditions[$data['Good']['cond']]; ?>
			</div>
			<div> <br />Үнэ：<br />
				<?php echo $data['Good']['price'];?> Төгрөг
			</div>
			<div> <br />Хүйс：<br />
				<?php echo $data['ClothesBoot']['sex'];?>
			</div>
			<div> <br />Төрөл：<br />
				<?php echo $data['ClothesBoot']['type'];?>
			</div>
		</div>
	</div>
	
	<div id="footer">
<?php 
	echo $this->Form->create ( 'Good', array (
			'url' => '/goods/complete' 
	) );
	echo $this->Form->input ('token', array (
		'value' => $token,
		'type'  => 'hidden'
	));
?>
	<input type="submit" value="Back" onClick="history.back(); return false;" />
<?php
	echo $this->Form->end ( __( 'Confirm', true ) );
?>
		</div>
	</div>
</body>
</html>