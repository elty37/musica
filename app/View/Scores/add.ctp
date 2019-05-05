<div class="scores form">
<?php echo $this->Form->create('Score'); ?>
	<fieldset>
		<legend><?php echo __('Add Score'); ?></legend>
	<?php
		echo $this->Form->input('score_id');
		echo $this->Form->input('sentence');
		echo $this->Form->input('answer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
