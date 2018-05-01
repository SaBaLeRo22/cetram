<?php 
/**
 * @var $this View
 */
?><div class="row unidades view">
    <div class="col-md-12">
        <h2><?= $unidade['Unidade']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Unidad'), array('action' => 'edit', $unidade['Unidade']['id']), array('class' => 'list-group-item')); ?>
		<?= $this->Form->postLink(__('Eliminar Unidad'), array('action' => 'eliminar', $unidade['Unidade']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $unidade['Unidade']['id'])); ?>
		<?= $this->Html->link(__('Listado de Unidades'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidad'), array('action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">

		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($unidade['Unidade']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Nombre'); ?></dt>
				<dd>
					<?= h($unidade['Unidade']['nombre']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Descripcion'); ?></dt>
				<dd>
					<?= h($unidade['Unidade']['descripcion']); ?>
					&nbsp;
				</dd>



			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($unidade['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $unidade['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($unidade['Unidade']['user_created']); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($unidade['Unidade']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($unidade['Unidade']['user_modified']); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($unidade['Unidade']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
          
    </div>
</div>
