<div class="replays index">
	<h2><?php echo __('Replays'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('replay_id'); ?></th>
			<th><?php echo $this->Paginator->sort('score_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($replays as $replay): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($replay['Replay'][''], array('controller' => 'replays', 'action' => 'view', $replay['Replay']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($replay['Score'][''], array('controller' => 'scores', 'action' => 'view', $replay['Score']['id'])); ?>
		</td>
		<td><?php echo h($replay['Replay']['created']); ?>&nbsp;</td>
		<td><?php echo h($replay['Replay']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $replay['Replay']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $replay['Replay']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $replay['Replay']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $replay['Replay']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Replay'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
