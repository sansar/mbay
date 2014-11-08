<?php $item['image'] = $this->Image->get_images($item['goods']['token']); ?>
<li>
	<div class="productItem">
		<a href="/goods/detail/<?php echo $item['goods']['id'];?>">
			<div class="productItemThumb">
			<?php if ($item['goods']['status'] == STATUS_SOLD): ?>
				<div class="ribbonBox ribbonSold"></div>
			<?php elseif ($item['goods']['real_price'] != $item['goods']['price']): ?>
				<div class="ribbonBox ribbonSale"></div>
			<?php elseif ($item['goods']['pickup_flag'] == PICKUP_ON): ?>
				<div class="ribbonBox ribbonSpecial"></div>
			<?php endif; ?>
				<?php foreach ($item['image'] as $key => $image):?>
					<img src="<?php echo $image['thumbtop'];?>" <?php if ($key > 0) echo 'style="display:none"'; else echo 'class="active"';?>/>
				<?php endforeach;?>
			</div>
			<div>
				<h3><?php echo $this->Truncate->truncate($item['goods']['overview'], 33); ?></h3>
				<p class="productPrice"><?php echo $item['goods']['price']; ?> төг</p>
			</div>
		</a>
		<div class="productCategory"><a href="#">Бусад</a></div>
	</div><!--end item-->
</li>
<script type="text/javascript">
$(function(){
	var timerID;
	$('.productItemThumb').hover(
		function(){
			var me = $(this);
			timerID = setInterval(function(){rotate(me, true);}, 1000);
		}, function(){
			var me = $(this);
			clearInterval(timerID);
			rotate(me, false);
		});
	function rotate(elem, isNext){
		if (elem.find("img").length < 2) return;
		var active = elem.find("img.active");
		var next = elem.find("img:first");
		if (isNext) next = active.next("img").length?active.next("img"):elem.find("img:first");
		active.hide().removeClass("active");
		next.show().addClass("active");
	}
});
</script>
