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
		echo $this->Form->create('User', Array('url' => '/users/add'));
		echo $this->Form->input('User.email', array(
			'label' => false,
			'placeholder' => __('Email', true),
			'error' => array(
				'email' => __('Enter valid email address', true),
				'notEmpty' => __('Enter your email address', true),
				'isUnique' => __('This email address is already registered', true)
			)
		));
		echo $this->Form->input('User.first_name', array(
			'label' => false,
			'placeholder' => __('First name', true),
			'error' => array(
				'notEmpty' => __('Enter your first name', true)
			)
		));
		echo $this->Form->input('User.last_name', array(
			'label' => false,
			'placeholder' => __('Last name', true),
			'error' => array(
				'notEmpty' => __('Enter your last name', true)
			)
		));
		echo $this->Form->input('User.gender', array(
			'error' => array(
				'inList' => __('Choose your gender', true)
			),
			'options' => array(1 => __('Male', true), 2 => __('Female', true)),
			'type' => 'radio'
		));
		$birthday = $this->Form->input('birthday', array(
			'label' => array('text' => __('Birthday', true)),
			'dateFormat' => 'YMD',
			'maxYear' => '2013',
			'minYear' => '1910',
			'monthNames' => false,
			'selected' => '',
			'empty' => '[RandomStringWhichDoesNotAppearInTheMarkup]',
			'error' => array(
				'date' => __('Enter valid date', true)
			),
			'class' => 'dropdown',
			'data-settings' => '{"cutOff": 5}'
		));
		$escapedPlaceholder = preg_quote('[RandomStringWhichDoesNotAppearInTheMarkup]', '/');
		$birthday = preg_replace("/$escapedPlaceholder/", __('YEAR', true), $birthday, 1);
		$birthday = preg_replace("/$escapedPlaceholder/", __('MONTH', true), $birthday, 1);
		$birthday = preg_replace("/$escapedPlaceholder/", __('DAY', true), $birthday, 1);
		echo $birthday;
		echo $this->Form->input('phone', array(
			'label' => false,
			'placeholder' => __('Phone number', true),
			'error' => array(
				'phone' => __('Enter valid phone number', true)
			)
		));
		echo $this->Form->end('アカウントを作成する');
	?>
</div>