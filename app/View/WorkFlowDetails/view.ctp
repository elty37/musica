<div class="workFlowDetails view">
<h2><?php echo __('Work Flow Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Work Flow Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowDetail['WorkFlowDetail'][''], array('controller' => 'work_flow_details', 'action' => 'view', $workFlowDetail['WorkFlowDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Flow Head'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowDetail['WorkFlowHead'][''], array('controller' => 'work_flow_heads', 'action' => 'view', $workFlowDetail['WorkFlowHead']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Name'); ?></dt>
		<dd>
			<?php echo h($workFlowDetail['WorkFlowDetail']['task_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task State'); ?></dt>
		<dd>
			<?php echo h($workFlowDetail['WorkFlowDetail']['task_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workFlowDetail['WorkFlowDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($workFlowDetail['WorkFlowDetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Flow Detail'), array('action' => 'edit', $workFlowDetail['WorkFlowDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Flow Detail'), array('action' => 'delete', $workFlowDetail['WorkFlowDetail']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowDetail['WorkFlowDetail']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('controller' => 'work_flow_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Detail Comments'), array('controller' => 'work_flow_detail_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail Comment'), array('controller' => 'work_flow_detail_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Work Flow Detail Comments'); ?></h3>
	<?php if (!empty($workFlowDetail['WorkFlowDetailComment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Flow Detail Comment Id'); ?></th>
		<th><?php echo __('Work Flow Detail Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workFlowDetail['WorkFlowDetailComment'] as $workFlowDetailComment): ?>
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
<div class="related">
	<h3><?php echo __('Related Work Flow Details'); ?></h3>
	<?php if (!empty($workFlowDetail['WorkFlowDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Flow Detail Id'); ?></th>
		<th><?php echo __('Work Flow Head Id'); ?></th>
		<th><?php echo __('Task Name'); ?></th>
		<th><?php echo __('Task State'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workFlowDetail['WorkFlowDetail'] as $workFlowDetail): ?>
		<tr>
			<td><?php echo $workFlowDetail['work_flow_detail_id']; ?></td>
			<td><?php echo $workFlowDetail['work_flow_head_id']; ?></td>
			<td><?php echo $workFlowDetail['task_name']; ?></td>
			<td><?php echo $workFlowDetail['task_state']; ?></td>
			<td><?php echo $workFlowDetail['created']; ?></td>
			<td><?php echo $workFlowDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'work_flow_details', 'action' => 'view', $workFlowDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'work_flow_details', 'action' => 'edit', $workFlowDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'work_flow_details', 'action' => 'delete', $workFlowDetail['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowDetail['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
