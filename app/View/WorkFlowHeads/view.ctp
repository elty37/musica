<div class="workFlowHeads view">
<h2><?php echo __('Work Flow Head'); ?></h2>
	<dl>
		<dt><?php echo __('Work Flow Head'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowHead['WorkFlowHead'][''], array('controller' => 'work_flow_heads', 'action' => 'view', $workFlowHead['WorkFlowHead']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Flow Name'); ?></dt>
		<dd>
			<?php echo h($workFlowHead['WorkFlowHead']['work_flow_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Flow File'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowHead['WorkFlowFile'][''], array('controller' => 'work_flow_files', 'action' => 'view', $workFlowHead['WorkFlowFile']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($workFlowHead['WorkFlowHead']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workFlowHead['WorkFlowHead']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Flow Head'), array('action' => 'edit', $workFlowHead['WorkFlowHead']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Flow Head'), array('action' => 'delete', $workFlowHead['WorkFlowHead']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowHead['WorkFlowHead']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow File'), array('controller' => 'work_flow_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Details'), array('controller' => 'work_flow_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Detail'), array('controller' => 'work_flow_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Work Flow Details'); ?></h3>
	<?php if (!empty($workFlowHead['WorkFlowDetail'])): ?>
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
	<?php foreach ($workFlowHead['WorkFlowDetail'] as $workFlowDetail): ?>
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
<div class="related">
	<h3><?php echo __('Related Work Flow Heads'); ?></h3>
	<?php if (!empty($workFlowHead['WorkFlowHead'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Flow Head Id'); ?></th>
		<th><?php echo __('Work Flow Name'); ?></th>
		<th><?php echo __('Work Flow File Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workFlowHead['WorkFlowHead'] as $workFlowHead): ?>
		<tr>
			<td><?php echo $workFlowHead['work_flow_head_id']; ?></td>
			<td><?php echo $workFlowHead['work_flow_name']; ?></td>
			<td><?php echo $workFlowHead['work_flow_file_id']; ?></td>
			<td><?php echo $workFlowHead['modified']; ?></td>
			<td><?php echo $workFlowHead['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'work_flow_heads', 'action' => 'view', $workFlowHead['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'work_flow_heads', 'action' => 'edit', $workFlowHead['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'work_flow_heads', 'action' => 'delete', $workFlowHead['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowHead['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
