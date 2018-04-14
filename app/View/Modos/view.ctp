<?php 
/**
 * @var $this View
 */
?><div class="row modos view">
    <div class="col-md-12">
        <h2><?= $modo['Modo']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
        <?= $this->Html->link(__('Editar Modo'), array('action' => 'edit', $modo['Modo']['id']), array('class' => 'list-group-item')); ?>
		<?= $this->Form->postLink(__('Eliminar Modo'), array('action' => 'eliminar', $modo['Modo']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $modo['Modo']['id'])); ?>
		<?= $this->Html->link(__('Listado de Modos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Modo'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($modo['Modo']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Nombre'); ?></dt>
				<dd>
					<?= h($modo['Modo']['nombre']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Descripcion'); ?></dt>
				<dd>
					<?= h($modo['Modo']['descripcion']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($modo['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $modo['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($modo['Modo']['user_created']); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($modo['Modo']['user_modified']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($modo['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $modo['Modo']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($modo['Modo']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($modo['Modo']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($modo['Modo']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($modo['Modo']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>

        <hr/>
          
    </div>
</div>
