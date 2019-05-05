<div class="conductors index">
	<h2><?php echo __('Conductors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('conductor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('concert_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($conductors as $conductor): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($conductor['Conductor'][''], array('controller' => 'conductors', 'action' => 'view', $conductor['Conductor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($conductor['User'][''], array('controller' => 'users', 'action' => 'view', $conductor['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($conductor['Concert']['concert_id'], array('controller' => 'concerts', 'action' => 'view', $conductor['Concert']['concert_id'])); ?>
		</td>
		<td><?php echo h($conductor['Conductor']['created']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conductor['Conductor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conductor['Conductor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conductor['Conductor']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $conductor['Conductor']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Conductor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('controller' => 'conductors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
