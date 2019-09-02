<div class="workFlowHeads form">
<?php echo $this->Form->create('WorkFlowHead'); ?>
	<fieldset>
		<legend><?php echo __('Add Work Flow Head'); ?></legend>
	<?php
		echo $this->Form->input('work_flow_head_id');
		echo $this->Form->input('work_flow_name');
		echo $this->Form->input('work_flow_file_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow File'), array('controller' => 'work_flow_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('controller' => 'work_flow_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
