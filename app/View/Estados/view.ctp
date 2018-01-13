<?php 
/**
 * @var $this View
 */
?><div class="row estados view">
	<div class="col-md-12">
		<h2><?= $alerta['Alerta']['nombre'] ?></h2>
		<hr/>
	</div>
	<div class="col-md-4">

		<div class="actions">
			<h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

			<div class="list-group">
				<?= $this->Html->link(__('Listado de Estados'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
			</div>
		</div>
	</div>
	<div class="col-md-8">

		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($estado['Estado']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Nombre'); ?></dt>
				<dd>
					<?= h($estado['Estado']['nombre']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($estado['Estado']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($estado['Estado']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($estado['Estado']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($estado['Estado']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>

	</div>
</div>
