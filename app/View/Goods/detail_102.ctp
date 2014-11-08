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
	<?php echo $this->element('category_menu'); ?>
	<div id="main">
		<div id="thumbnail">
			<ul>
			<?php $images = $this->Image->get_images($data['token']); ?>
			<?php foreach($images as $image):?>
			<?php if ( isset($image['thumb']) ): ?>
				<li style="margin-bottom: 5px"><a href='<?php echo $image['big']; ?>' class='cloud-zoom-gallery'
					rel="useZoom: 'zoom1', smallImage: '<?php echo $image['medium']; ?>' ">
					<img src="<?php echo $image['thumb']; ?>" style="max-width: 100px"/></a>
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
			<h1><?php echo $data['overview']; ?></h1>
			<div>
			<?php echo $this->FB->createItemLike($data['id']); ?>
			<span style="vertical-align: top;">Үзсэн: <?php echo $data['viewed']; ?> удаа</span>
			</div>
			<div><?php echo $data['detail']; ?></div>
			<div> <br />Төлөв : <br />
				<?php $conditions = array (
					CONDITION_1 => __ ( 'very old', true ),
					CONDITION_2 => __ ( 'old', true ),
					CONDITION_3 => __ ( 'middle', true ),
					CONDITION_4 => __ ( 'almost new', true ),
					CONDITION_5 => __ ( 'new', true ));
					echo $conditions[$data['cond']]; ?>
			</div>
			<div> <br />Үнэ：<br />
				<?php echo $data['price'];?> Төгрөг
			</div>
		</div>
	</div>

	<br/><br/>
	<?php if ($data['status'] == STATUS_PUBLISHED): ?>
	<div id="fb_comment">
		<?php echo $this->FB->createCommentBox($data['id']); ?>
	</div>
	<?php endif; ?>
	
	<div id="footer">
		<?php if ($user['role'] == ROLE_ADMIN): ?>
		<form method="post" action="/goods/publish/<?php echo $data['id'];?>">
			<?php if ($data['status'] == STATUS_CREATED): ?>
				<span style="font-size: 20px;color:RED">ТАВИГДААГҮЙ.</span>
			<?php elseif ($data['status'] == STATUS_COMFIRMED): ?>
				<span style="font-size: 20px;color:YELLOW">ХҮЛЭЭГДЭЖ БУЙ.</span>
			<?php elseif ($data['status'] == STATUS_PUBLISHED): ?>
				<span style="font-size: 20px;color:GREEN">ТАВИГДСАН.</span>
			<?php elseif ($data['status'] == STATUS_SOLD): ?>
				<span style="font-size: 20px;color:GREEN">ЗАРАГДСАН.</span>
			<?php elseif ($data['status'] == STATUS_TIMEUP): ?>
				<span style="font-size: 20px;color:RED">ХУГАЦАА ДУУССАН.</span>
			<?php endif; ?>
			<span id="publish_setting" style="visibility:hidden">
				Хугацаа:
				<input type="type" name="publish_from" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="10"/>
				 - <input type="type" name="publish_to" value="<?php echo date('Y-m-d', strtotime("+3 months", strtotime(date('Y-m-d')))); ?>" size="10" maxlength="10"/>
				<input type="submit" value="set"/>
				<input id="publish_close" type="submit" value="close"/>
			</span>
			<input id="publish_open" type="submit" value="Publish Setting"/>
			<input type="submit" value="Засах" onClick="location.href = 'http://<?php echo $_SERVER['HTTP_HOST'] . "/goods/edit/{$data['id']}"; ?>'; return false;" />
			<input type="submit" value="Back" onClick="history.back(); return false;" />
		</form>
		<script type="text/javascript">
			$('#publish_open').click(function(){
				$('#publish_setting').css('visibility','visible');
				$('#publish_open').hide();
				return false;
				});
			$('#publish_close').click(function(){
				$('#publish_setting').css('visibility','hidden');
				$('#publish_open').show();
				return false;
				});
		</script>
		<?php elseif ($user['id'] == $data['owner']): ?>
			<input type="submit" value="Засах" onClick="location.href = 'http://<?php echo $_SERVER['HTTP_HOST'] . "/goods/edit/{$data['id']}"; ?>'; return false;" />
			<input type="submit" value="Back" onClick="history.back(); return false;" />
		<?php else: ?>
			<input type="submit" value="Back" onClick="history.back(); return false;" />
		<?php endif; ?>
	</div>
	<br/><br/>
	<div class="module">
		<div class="heading-box odd clearfix" style="width: 100px">
			<h3>Сүүлд үзсэн</h3>
		</div>
		<div>
		<?php echo $this->element('items', array('items' => $seen_items)); ?>
		</div>
	</div>
</div>
</body>
</html>