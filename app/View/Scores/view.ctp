<div class="scores view">
<h2><?php echo __('Score'); ?></h2>
	<dl>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo $this->Html->link($score['Score'][''], array('controller' => 'scores', 'action' => 'view', $score['Score']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sentence'); ?></dt>
		<dd>
			<?php echo h($score['Score']['sentence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($score['Score']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($score['Score']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($score['Score']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Score'), array('action' => 'edit', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Score'), array('action' => 'delete', $score['Score']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $score['Score']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Replays'); ?></h3>
	<?php if (!empty($score['Replay'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Replay Id'); ?></th>
		<th><?php echo __('Score Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($score['Replay'] as $replay): ?>
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
<div class="related">
	<h3><?php echo __('Related Scores'); ?></h3>
	<?php if (!empty($score['Score'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Score Id'); ?></th>
		<th><?php echo __('Sentence'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($score['Score'] as $score): ?>
		<tr>
			<td><?php echo $score['score_id']; ?></td>
			<td><?php echo $score['sentence']; ?></td>
			<td><?php echo $score['answer']; ?></td>
			<td><?php echo $score['created']; ?></td>
			<td><?php echo $score['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'scores', 'action' => 'view', $score['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'scores', 'action' => 'edit', $score['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'scores', 'action' => 'delete', $score['id']), array('confirm' => __('Are you sure you want to delete # %s?', $score['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
