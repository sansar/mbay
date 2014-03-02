<div class="admin form">
	<?php
		echo $this->Form->create('Good', Array('url' => '/goods/step3'));
		echo $this->Form->input('Good.category', array(
			'label' => __('Choose category', true),
			'empty' => __('-- Choose category --'),
			'selected' => '',
			'id' => 'category',
			'error' => array(
				'notEmpty' => __('Choose category', true),
			)
		));
		echo $this->Form->submit(__('continue', true));
	?>
</div>