<div class="conductors form">
<?php echo $this->Form->create('Conductor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Conductor'); ?></legend>
	<?php
		echo $this->Form->input('conductor_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('concert_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Conductor.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Conductor.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('controller' => 'conductors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
	</ul>
</div>
