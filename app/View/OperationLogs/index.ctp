<div class="operationLogs index">
	<h2><?php echo __('Operation Logs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('operation_log_id'); ?></th>
			<th><?php echo $this->Paginator->sort('function_name'); ?></th>
			<th><?php echo $this->Paginator->sort('params'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_user'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_user'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($operationLogs as $operationLog): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($operationLog['OperationLog'][''], array('controller' => 'operation_logs', 'action' => 'view', $operationLog['OperationLog']['id'])); ?>
		</td>
		<td><?php echo h($operationLog['OperationLog']['function_name']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['params']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['comment']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['created']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['created_user']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['modified']); ?>&nbsp;</td>
		<td><?php echo h($operationLog['OperationLog']['modified_user']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $operationLog['OperationLog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $operationLog['OperationLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $operationLog['OperationLog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $operationLog['OperationLog']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Operation Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Operation Logs'), array('controller' => 'operation_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operation Log'), array('controller' => 'operation_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
