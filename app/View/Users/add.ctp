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
		echo $this->Form->input('User.password', array(
			'label' => false,
			'placeholder' => __('Password', true),
			'error' => array(
				'minLength' => __('Enter password at least 8 lengths', true)
			)
		));
		echo $this->Form->input('User.gender', array(
			'error' => array(
				'inList' => __('Choose your gender', true)
			),
			'options' => array(1 => __('Male', true), 2 => __('Female', true)),
			'type' => 'radio'
		));
		echo $this->Form->input('birthday', array(
			'label' => array('text' => __('Birthday', true)),
			'dateFormat' => 'YMD',
			'maxYear' => '2013',
			'minYear' => '1910',
			'monthNames' => false,
			'selected' => '',
			'empty' => '',
			'error' => array(
				'date' => __('Enter valid date', true)
			)
		));
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