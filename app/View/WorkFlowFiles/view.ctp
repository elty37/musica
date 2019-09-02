<div class="workFlowFiles view">
<h2><?php echo __('Work Flow File'); ?></h2>
	<dl>
		<dt><?php echo __('Work Flow Files'); ?></dt>
		<dd>
			<?php echo $this->Html->link($workFlowFile['WorkFlowFiles'][''], array('controller' => 'work_flow_files', 'action' => 'view', $workFlowFile['WorkFlowFiles']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Flow File Name'); ?></dt>
		<dd>
			<?php echo h($workFlowFile['WorkFlowFile']['work_flow_file_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($workFlowFile['WorkFlowFile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($workFlowFile['WorkFlowFile']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Work Flow File'), array('action' => 'edit', $workFlowFile['WorkFlowFile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Work Flow File'), array('action' => 'delete', $workFlowFile['WorkFlowFile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $workFlowFile['WorkFlowFile']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow File'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Files'), array('controller' => 'work_flow_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Work Flow Heads'), array('controller' => 'work_flow_heads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Work Flow Head'), array('controller' => 'work_flow_heads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Work Flow Heads'); ?></h3>
	<?php if (!empty($workFlowFile['WorkFlowHead'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Work Flow Head Id'); ?></th>
		<th><?php echo __('Work Flow Name'); ?></th>
		<th><?php echo __('Work Flow File Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($workFlowFile['WorkFlowHead'] as $workFlowHead): ?>
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
