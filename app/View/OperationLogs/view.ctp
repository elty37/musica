<div class="operationLogs view">
<h2><?php echo __('Operation Log'); ?></h2>
	<dl>
		<dt><?php echo __('Operation Log'); ?></dt>
		<dd>
			<?php echo $this->Html->link($operationLog['OperationLog'][''], array('controller' => 'operation_logs', 'action' => 'view', $operationLog['OperationLog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Function Name'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['function_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Params'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['params']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['created_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User'); ?></dt>
		<dd>
			<?php echo h($operationLog['OperationLog']['modified_user']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Operation Log'), array('action' => 'edit', $operationLog['OperationLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Operation Log'), array('action' => 'delete', $operationLog['OperationLog']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $operationLog['OperationLog']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Operation Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operation Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Operation Logs'), array('controller' => 'operation_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operation Log'), array('controller' => 'operation_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Operation Logs'); ?></h3>
	<?php if (!empty($operationLog['OperationLog'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Operation Log Id'); ?></th>
		<th><?php echo __('Function Name'); ?></th>
		<th><?php echo __('Params'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($operationLog['OperationLog'] as $operationLog): ?>
		<tr>
			<td><?php echo $operationLog['operation_log_id']; ?></td>
			<td><?php echo $operationLog['function_name']; ?></td>
			<td><?php echo $operationLog['params']; ?></td>
			<td><?php echo $operationLog['comment']; ?></td>
			<td><?php echo $operationLog['created']; ?></td>
			<td><?php echo $operationLog['created_user']; ?></td>
			<td><?php echo $operationLog['modified']; ?></td>
			<td><?php echo $operationLog['modified_user']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'operation_logs', 'action' => 'view', $operationLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'operation_logs', 'action' => 'edit', $operationLog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'operation_logs', 'action' => 'delete', $operationLog['id']), array('confirm' => __('Are you sure you want to delete # %s?', $operationLog['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Operation Log'), array('controller' => 'operation_logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
