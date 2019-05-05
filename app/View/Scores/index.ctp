<div class="scores index">
	<h2><?php echo __('Scores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('score_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sentence'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($scores as $score): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($score['Score'][''], array('controller' => 'scores', 'action' => 'view', $score['Score']['id'])); ?>
		</td>
		<td><?php echo h($score['Score']['sentence']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['answer']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['created']); ?>&nbsp;</td>
		<td><?php echo h($score['Score']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $score['Score']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $score['Score']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $score['Score']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $score['Score']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
