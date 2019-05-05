<div class="replays view">
<h2><?php echo __('Replay'); ?></h2>
	<dl>
		<dt><?php echo __('Replay'); ?></dt>
		<dd>
			<?php echo $this->Html->link($replay['Replay'][''], array('controller' => 'replays', 'action' => 'view', $replay['Replay']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo $this->Html->link($replay['Score'][''], array('controller' => 'scores', 'action' => 'view', $replay['Score']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($replay['Replay']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Replay'), array('action' => 'edit', $replay['Replay']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Replay'), array('action' => 'delete', $replay['Replay']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $replay['Replay']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Play Logs'); ?></h3>
	<?php if (!empty($replay['PlayLog'])): ?>
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
	<?php foreach ($replay['PlayLog'] as $playLog): ?>
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
<div class="related">
	<h3><?php echo __('Related Replays'); ?></h3>
	<?php if (!empty($replay['Replay'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Replay Id'); ?></th>
		<th><?php echo __('Score Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($replay['Replay'] as $replay): ?>
		<tr>
			<td><?php echo $replay['replay_id']; ?></td>
			<td><?php echo $replay['score_id']; ?></td>
			<td><?php echo $replay['created']; ?></td>
			<td><?php echo $replay['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'replays', 'action' => 'view', $replay['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'replays', 'action' => 'edit', $replay['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'replays', 'action' => 'delete', $replay['id']), array('confirm' => __('Are you sure you want to delete # %s?', $replay['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
