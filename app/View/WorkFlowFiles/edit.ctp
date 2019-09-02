<div class="workFlowFiles form">
<?php echo $this->Form->create('WorkFlowFile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Work Flow File'); ?></legend>
	<?php
		echo $this->Form->input('work_flow_files_id');
		echo $this->Form->input('work_flow_file_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WorkFlowFile.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('WorkFlowFile.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
	</ul>
</div>
