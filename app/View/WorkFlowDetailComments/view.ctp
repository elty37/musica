<div class="workFlowDetailComments view">
<h2><?php echo __('Work Flow Detail Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Work Flow Detail Comment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowDetailComment['WorkFlowDetailComment'][''], array('controller' => 'work_flow_detail_comments', 'action' => 'view', $workFlowDetailComment['WorkFlowDetailComment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Flow Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowDetailComment['WorkFlowDetail'][''], array('controller' => 'work_flow_details', 'action' => 'view', $workFlowDetailComment['WorkFlowDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($workFlowDetailComment['WorkFlowDetailComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workFlowDetailComment['WorkFlowDetailComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($workFlowDetailComment['WorkFlowDetailComment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Flow Detail Comment'), array('action' => 'edit', $workFlowDetailComment['WorkFlowDetailComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Flow Detail Comment'), array('action' => 'delete', $workFlowDetailComment['WorkFlowDetailComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowDetailComment['WorkFlowDetailComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Detail Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Detail Comments'), array('controller' => 'work_flow_detail_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail Comment'), array('controller' => 'work_flow_detail_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('controller' => 'work_flow_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Work Flow Detail Comments'); ?></h3>
	<?php if (!empty($workFlowDetailComment['WorkFlowDetailComment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Flow Detail Comment Id'); ?></th>
		<th><?php echo __('Work Flow Detail Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workFlowDetailComment['WorkFlowDetailComment'] as $workFlowDetailComment): ?>
		<tr>
			<td><?php echo $workFlowDetailComment['work_flow_detail_comment_id']; ?></td>
			<td><?php echo $workFlowDetailComment['work_flow_detail_id']; ?></td>
			<td><?php echo $workFlowDetailComment['comment']; ?></td>
			<td><?php echo $workFlowDetailComment['created']; ?></td>
			<td><?php echo $workFlowDetailComment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'work_flow_detail_comments', 'action' => 'view', $workFlowDetailComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'work_flow_detail_comments', 'action' => 'edit', $workFlowDetailComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'work_flow_detail_comments', 'action' => 'delete', $workFlowDetailComment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowDetailComment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work Flow Detail Comment'), array('controller' => 'work_flow_detail_comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
