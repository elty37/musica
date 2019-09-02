<div class="workFlowFiles index">
	<h2><?php echo __('Work Flow Files'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('work_flow_files_id'); ?></th>
			<th><?php echo $this->Paginator->sort('work_flow_file_name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($workFlowFiles as $workFlowFile): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($workFlowFile['WorkFlowFiles'][''], array('controller' => 'work_flow_files', 'action' => 'view', $workFlowFile['WorkFlowFiles']['id'])); ?>
		</td>
		<td><?php echo h($workFlowFile['WorkFlowFile']['work_flow_file_name']); ?>&nbsp;</td>
		<td><?php echo h($workFlowFile['WorkFlowFile']['created']); ?>&nbsp;</td>
		<td><?php echo h($workFlowFile['WorkFlowFile']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $workFlowFile['WorkFlowFile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $workFlowFile['WorkFlowFile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workFlowFile['WorkFlowFile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowFile['WorkFlowFile']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Work Flow File'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
	</ul>
</div>
