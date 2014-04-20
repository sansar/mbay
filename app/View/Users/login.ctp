<div class="login form">
	<a href="/auth/facebook"><img src="/img/facebook_login.jpg" /></a>
	<a href="/auth/twitter"><img src="/img/twitter_login.jpg" /></a>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User', Array('url' => '/users/login')); ?>
	<table>
		<tr>
			<th>Е-майл хаяг</th>
			<td><?php echo $this->Form->input('email', Array('label' => false)); ?></td>
		</tr>
		<tr>
			<th>Нууц үг</th>
			<td><?php echo $this->Form->input('password', Array('label' => false)); ?></td>
		</tr>
	</table>
	<?php echo $this->Form->end('Нэвтрэх'); ?>
	<a href="/users/password_reset">Нууц үгээ мартсан?</a>
</div>