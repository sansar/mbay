<?php if ($user === null): ?>
	<ul>
		<li><a href="/users/add"><?php echo __('register') ?></a></li>
		<li><a href="/users/login"><?php echo __('login') ?></a></li>
	</ul>
<?php else: ?>
	<ul>
		<li><span><?php echo $user['first_name'] ?></span></li>
		<li><a href="/goods/step1"><?php echo __('exibit') ?></a></li>
		<li><a href="/users/logout"><?php echo __('logout') ?></a></li>
	</ul>
<?php endif; ?>