<div class="login form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User', Array('url' => '/users/password_reset')); ?>
	<table>
		<tr>
			<th>Е-майл хаяг</th>
			<td><?php echo $this->Form->input('email', Array('label' => false)); ?></td>
		</tr>
	</table>
	<?php echo $this->Form->end('Нууц үг сэргээх'); ?>
</div>