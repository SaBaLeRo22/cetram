<?php 
/**
 * @var $this View
 */
?><div class="row viaticos view">
    <div class="col-md-12">
        <h2><?= $viatico['Viatico']['costo'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Viatico'), array('action' => 'edit', $viatico['Viatico']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Viatico'), array('action' => 'eliminar', $viatico['Viatico']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $viatico['Viatico']['id'])); ?>
		<?= $this->Html->link(__('Listado de Viaticos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Viatico'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($viatico['Viatico']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Convenio'); ?></dt>
				<dd>
					<?= $this->Html->link($viatico['Convenio']['anio'], array('controller' => 'convenios', 'action' => 'view', $viatico['Convenio']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Dieta'); ?></dt>
				<dd>
					<?= $this->Html->link($viatico['Dieta']['nombre'], array('controller' => 'dietas', 'action' => 'view', $viatico['Dieta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Costo'); ?></dt>
				<dd>
					<?= h($viatico['Viatico']['costo']); ?>
					&nbsp;
				</dd>

			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($viatico['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $viatico['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($viatico['Viatico']['user_created']); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($viatico['Viatico']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($viatico['Viatico']['user_modified']); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($viatico['Viatico']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
    </div>
</div>
