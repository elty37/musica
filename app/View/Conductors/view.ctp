<div class="conductors view">
<h2><?php echo __('Conductor'); ?></h2>
	<dl>
		<dt><?php echo __('Conductor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conductor['Conductor'][''], array('controller' => 'conductors', 'action' => 'view', $conductor['Conductor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conductor['User'][''], array('controller' => 'users', 'action' => 'view', $conductor['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concert'); ?></dt>
		<dd>
			<?php echo $this->Html->link($conductor['Concert']['concert_id'], array('controller' => 'concerts', 'action' => 'view', $conductor['Concert']['concert_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conductor'), array('action' => 'edit', $conductor['Conductor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conductor'), array('action' => 'delete', $conductor['Conductor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conductor['Conductor']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('controller' => 'conductors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Conductors'); ?></h3>
	<?php if (!empty($conductor['Conductor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Conductor Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Concert Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($conductor['Conductor'] as $conductor): ?>
		<tr>
			<td><?php echo $conductor['conductor_id']; ?></td>
			<td><?php echo $conductor['user_id']; ?></td>
			<td><?php echo $conductor['concert_id']; ?></td>
			<td><?php echo $conductor['created']; ?></td>
			<td><?php echo $conductor['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conductors', 'action' => 'view', $conductor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conductors', 'action' => 'edit', $conductor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conductors', 'action' => 'delete', $conductor['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conductor['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
