<?php 
/**
 * @var $this View
 */
?><div class="row alertas view">
	<div class="col-md-12">
		<h2><?= $ambito['Ambito']['nombre'] ?></h2>
		<hr/>
	</div>
	<div class="col-md-4">

		<div class="actions">
			<h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

			<div class="list-group">
				<?= $this->Html->link(__('Editar Ambito'), array('action' => 'edit', $ambito['Ambito']['id']), array('class' => 'list-group-item')); ?>
				<?= $this->Form->postLink(__('Eliminar Ambito'), array('action' => 'eliminar', $ambito['Ambito']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $ambito['Ambito']['id'])); ?>
				<?= $this->Html->link(__('Listado de Ambitos'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
				<?= $this->Html->link(__('Agregar Ambito'), array('action' => 'add'), array('class' => 'list-group-item')); ?>
			</div>
		</div>
	</div>
	<div class="col-md-8">

		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($ambito['Ambito']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Nombre'); ?></dt>
				<dd>
					<?= h($ambito['Ambito']['nombre']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Descripcion'); ?></dt>
				<dd>
					<?= h($ambito['Ambito']['descripcion']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($ambito['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $ambito['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($ambito['Ambito']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($ambito['Ambito']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($ambito['Ambito']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($ambito['Ambito']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>

	</div>
</div>
