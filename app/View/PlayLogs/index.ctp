<div class="playLogs index">
	<h2><?php echo __('Play Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('play_log_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('replay_id'); ?></th>
			<th><?php echo $this->Paginator->sort('action_type'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($playLogs as $playLog): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($playLog['PlayLog'][''], array('controller' => 'play_logs', 'action' => 'view', $playLog['PlayLog']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($playLog['User'][''], array('controller' => 'users', 'action' => 'view', $playLog['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($playLog['Replay'][''], array('controller' => 'replays', 'action' => 'view', $playLog['Replay']['id'])); ?>
		</td>
		<td><?php echo h($playLog['PlayLog']['action_type']); ?>&nbsp;</td>
		<td><?php echo h($playLog['PlayLog']['action']); ?>&nbsp;</td>
		<td><?php echo h($playLog['PlayLog']['created']); ?>&nbsp;</td>
		<td><?php echo h($playLog['PlayLog']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $playLog['PlayLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $playLog['PlayLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $playLog['PlayLog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $playLog['PlayLog']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Play Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
