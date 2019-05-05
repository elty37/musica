<div class="performedScores form">
<?php echo $this->Form->create('PerformedScore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Performed Score'); ?></legend>
	<?php
		echo $this->Form->input('performed_score_id');
		echo $this->Form->input('concert_id');
		echo $this->Form->input('score_id');
		echo $this->Form->input('comment_use_flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PerformedScore.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PerformedScore.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Performed Scores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Performed Scores'), array('controller' => 'performed_scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performed Score'), array('controller' => 'performed_scores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Concerts'), array('controller' => 'concerts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Concert'), array('controller' => 'concerts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('controller' => 'scores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('controller' => 'scores', 'action' => 'add')); ?> </li>
	</ul>
</div>
