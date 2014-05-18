<?php if ($page_count == 1): ?>
<?php elseif ($page_count < 8): ?>
<div class="pagination">
<?php for ($i = 1; $i <= $page_count; $i++):?>
	<?php $this->Paginator->build_page($i, $current_page, $page_count, $page_url); ?>
<?php endfor;?>
</div>
<?php else: ?>
<div class="pagination">
<?php $this->Paginator->build_page(1, $current_page, $page_count, $page_url); ?>
<?php $this->Paginator->build_page(2, $current_page, $page_count, $page_url); ?>
<?php if ($current_page < 5): ?>
	<?php for ($i = 3; $i <= $current_page + 1; $i++): ?>
		<?php $this->Paginator->build_page($i, $current_page, $page_count, $page_url); ?>
	<?php endfor;?>
	<span>...</span>
<?php elseif (5 <= $current_page && $current_page < $page_count - 3): ?>
	<span>...</span>
	<?php $this->Paginator->build_page($current_page - 1, $current_page, $page_count, $page_url); ?>
	<?php $this->Paginator->build_page($current_page, $current_page, $page_count, $page_url); ?>
	<?php $this->Paginator->build_page($current_page + 1, $current_page, $page_count, $page_url); ?>
	<span>...</span>
<?php else: ?>
	<span>...</span>
	<?php for ($i = $current_page - 1; $i < $page_count - 1; $i++): ?>
		<?php $this->Paginator->build_page($i, $current_page, $page_count, $page_url); ?>
	<?php endfor;?>
<?php endif; ?>
<?php $this->Paginator->build_page($page_count - 1, $current_page, $page_count, $page_url); ?>
<?php $this->Paginator->build_page($page_count, $current_page, $page_count, $page_url); ?>
</div>
<?php endif; ?>