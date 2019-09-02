<div class="workFlowDetails form">
<?php echo $this->Form->create('WorkFlowDetail'); ?>
	<fieldset>
		<legend><?php echo __('Add Work Flow Detail'); ?></legend>
	<?php
		echo $this->Form->input('work_flow_detail_id');
		echo $this->Form->input('work_flow_head_id');
		echo $this->Form->input('task_name');
		echo $this->Form->input('task_state');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('controller' => 'work_flow_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Detail Comments'), array('controller' => 'work_flow_detail_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail Comment'), array('controller' => 'work_flow_detail_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
