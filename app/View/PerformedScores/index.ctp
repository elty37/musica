<div class="performedScores index">
	<h2><?php echo __('Performed Scores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('performed_score_id'); ?></th>
			<th><?php echo $this->Paginator->sort('concert_id'); ?></th>
			<th><?php echo $this->Paginator->sort('score_id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment_use_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($performedScores as $performedScore): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($performedScore['PerformedScore'][''], array('controller' => 'performed_scores', 'action' => 'view', $performedScore['PerformedScore']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($performedScore['Concert']['concert_id'], array('controller' => 'concerts', 'action' => 'view', $performedScore['Concert']['concert_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($performedScore['Score'][''], array('controller' => 'scores', 'action' => 'view', $performedScore['Score']['id'])); ?>
		</td>
		<td><?php echo h($performedScore['PerformedScore']['comment_use_flag']); ?>&nbsp;</td>
		<td><?php echo h($performedScore['PerformedScore']['created']); ?>&nbsp;</td>
		<td><?php echo h($performedScore['PerformedScore']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $performedScore['PerformedScore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $performedScore['PerformedScore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $performedScore['PerformedScore']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $performedScore['PerformedScore']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Performed Score'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Performed Scores'), array('controller' => 'performed_scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Score'), array('controller' => 'performed_scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
	</ul>
</div>
