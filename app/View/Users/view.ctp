<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['user_id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['user_id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('controller' => 'conductors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Conductors'); ?></h3>
	<?php if (!empty($user['Conductor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Conductor Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Concert Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Conductor'] as $conductor): ?>
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
<div class="related">
	<h3><?php echo __('Related Play Logs'); ?></h3>
	<?php if (!empty($user['PlayLog'])): ?>
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
	<?php foreach ($user['PlayLog'] as $playLog): ?>
		<tr>
			<td><?php echo $playLog['play_log_id']; ?></td>
			<td><?php echo $playLog['user_id']; ?></td>
			<td><?php echo $playLog['replay_id']; ?></td>
			<td><?php echo $playLog['action_type']; ?></td>
			<td><?php echo $playLog['action']; ?></td>
			<td><?php echo $playLog['created']; ?></td>
			<td><?php echo $playLog['modified']; ?></td>
			<td class="actions">
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
