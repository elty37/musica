<div class="operationLogs form">
<?php echo $this->Form->create('OperationLog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Operation Log'); ?></legend>
	<?php
		echo $this->Form->input('operation_log_id');
		echo $this->Form->input('function_name');
		echo $this->Form->input('params');
		echo $this->Form->input('comment');
		echo $this->Form->input('created_user');
		echo $this->Form->input('modified_user');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OperationLog.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('OperationLog.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Operation Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Operation Logs'), array('controller' => 'operation_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Operation Log'), array('controller' => 'operation_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
