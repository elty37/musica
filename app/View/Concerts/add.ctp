<div class="concerts form">
<?php echo $this->Form->create('Concert'); ?>
	<fieldset>
		<legend><?php echo __('Add Concert'); ?></legend>
	<?php
		echo $this->Form->input('concert_name');
		echo $this->Form->input('editable_division');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Concerts'), array('action' => 'index')); ?></li>
	</ul>
</div>
