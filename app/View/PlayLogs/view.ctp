<div class="playLogs view">
<h2><?php echo __('Play Log'); ?></h2>
	<dl>
		<dt><?php echo __('Play Log'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playLog['PlayLog'][''], array('controller' => 'play_logs', 'action' => 'view', $playLog['PlayLog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playLog['User'][''], array('controller' => 'users', 'action' => 'view', $playLog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Replay'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playLog['Replay'][''], array('controller' => 'replays', 'action' => 'view', $playLog['Replay']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action Type'); ?></dt>
		<dd>
			<?php echo h($playLog['PlayLog']['action_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($playLog['PlayLog']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($playLog['PlayLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($playLog['PlayLog']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Play Log'), array('action' => 'edit', $playLog['PlayLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Play Log'), array('action' => 'delete', $playLog['PlayLog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $playLog['PlayLog']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Play Logs'); ?></h3>
	<?php if (!empty($playLog['PlayLog'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Play Log Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Replay Id'); ?></th>
		<th><?php echo __('Action Type'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($playLog['PlayLog'] as $playLog): ?>
		<tr>
			<td><?php echo $playLog['play_log_id']; ?></td>
			<td><?php echo $playLog['user_id']; ?></td>
			<td><?php echo $playLog['replay_id']; ?></td>
			<td><?php echo $playLog['action_type']; ?></td>
			<td><?php echo $playLog['action']; ?></td>
			<td><?php echo $playLog['created']; ?></td>
			<td><?php echo $playLog['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'play_logs', 'action' => 'view', $playLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'play_logs', 'action' => 'edit', $playLog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'play_logs', 'action' => 'delete', $playLog['id']), array('confirm' => __('Are you sure you want to delete # %s?', $playLog['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
