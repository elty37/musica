<div class="performedScores view">
<h2><?php echo __('Performed Score'); ?></h2>
	<dl>
		<dt><?php echo __('Performed Score'); ?></dt>
		<dd>
			<?php echo $this->Html->link($performedScore['PerformedScore'][''], array('controller' => 'performed_scores', 'action' => 'view', $performedScore['PerformedScore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Concert'); ?></dt>
		<dd>
			<?php echo $this->Html->link($performedScore['Concert']['concert_id'], array('controller' => 'concerts', 'action' => 'view', $performedScore['Concert']['concert_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Score'); ?></dt>
		<dd>
			<?php echo $this->Html->link($performedScore['Score'][''], array('controller' => 'scores', 'action' => 'view', $performedScore['Score']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment Use Flag'); ?></dt>
		<dd>
			<?php echo h($performedScore['PerformedScore']['comment_use_flag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($performedScore['PerformedScore']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($performedScore['PerformedScore']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Performed Score'), array('action' => 'edit', $performedScore['PerformedScore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Performed Score'), array('action' => 'delete', $performedScore['PerformedScore']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $performedScore['PerformedScore']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Performed Scores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Score'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Performed Scores'), array('controller' => 'performed_scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Score'), array('controller' => 'performed_scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Performed Scores'); ?></h3>
	<?php if (!empty($performedScore['PerformedScore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Performed Score Id'); ?></th>
		<th><?php echo __('Concert Id'); ?></th>
		<th><?php echo __('Score Id'); ?></th>
		<th><?php echo __('Comment Use Flag'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($performedScore['PerformedScore'] as $performedScore): ?>
		<tr>
			<td><?php echo $performedScore['performed_score_id']; ?></td>
			<td><?php echo $performedScore['concert_id']; ?></td>
			<td><?php echo $performedScore['score_id']; ?></td>
			<td><?php echo $performedScore['comment_use_flag']; ?></td>
			<td><?php echo $performedScore['created']; ?></td>
			<td><?php echo $performedScore['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'performed_scores', 'action' => 'view', $performedScore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'performed_scores', 'action' => 'edit', $performedScore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'performed_scores', 'action' => 'delete', $performedScore['id']), array('confirm' => __('Are you sure you want to delete # %s?', $performedScore['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Performed Score'), array('controller' => 'performed_scores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
