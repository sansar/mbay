<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/dropdown/jquery.easydropdown.min.js"></script>
<link rel="stylesheet" href="/css/dropdown/demo.css">
<link rel="stylesheet" href="/css/dropdown/easydropdown.css">
<style>
.dropdown{
	position: relative;
	width: 100px;
	border: 1px solid #ccc;
	cursor: pointer;
	background: #fff;

	border-radius: 3px;
	
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
}
</style>
<div class="admin form">
	<?php
		echo $this->Form->create('User', Array('url' => '/users/password_set/' . $code));
		echo $this->Form->input('User.password', array(
			'label' => false,
			'placeholder' => __('Password', true),
			'error' => array(
				'minLength' => __('Enter password at least 8 lengths', true)
			)
		));
		echo $this->Form->input('User.password_confirm', array(
			'label' => false,
			'placeholder' => __('Password confirm', true),
			'type' => 'password',
			'error' => array(
				'confirm' => __('Ижил нууц үг оруулна уу.', true)
			)
		));
		echo $this->Form->end('Нууц үг тохируулах');
	?>
</div>