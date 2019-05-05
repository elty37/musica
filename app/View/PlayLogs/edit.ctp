<div class="playLogs form">
<?php echo $this->Form->create('PlayLog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Play Log'); ?></legend>
	<?php
		echo $this->Form->input('play_log_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('replay_id');
		echo $this->Form->input('action_type');
		echo $this->Form->input('action');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlayLog.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PlayLog.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Replays'), array('controller' => 'replays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Replay'), array('controller' => 'replays', 'action' => 'add')); ?> </li>
	</ul>
</div>
