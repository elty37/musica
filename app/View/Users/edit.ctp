<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('user_name');
		echo $this->Form->input('role');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('controller' => 'conductors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Logs'), array('controller' => 'play_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Log'), array('controller' => 'play_logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
