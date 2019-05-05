<div class="concerts view">
<h2><?php echo __('Concert'); ?></h2>
	<dl>
		<dt><?php echo __('Concert Id'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['concert_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concert Name'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['concert_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Editable Division'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['editable_division']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($concert['Concert']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Concert'), array('action' => 'edit', $concert['Concert']['concert_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Concert'), array('action' => 'delete', $concert['Concert']['concert_id']), array('confirm' => __('Are you sure you want to delete # %s?', $concert['Concert']['concert_id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('action' => 'add')); ?> </li>
	</ul>
</div>
