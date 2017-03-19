<?php 
/**
 * @var $this View
 */
?><div class="row localidades view">
    <div class="col-md-12">
        <h2><?= $localidade['Localidade']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($localidade['Localidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Provincia'); ?></dt>
		<dd>
			<?= $this->Html->link($localidade['Provincia']['nombre'], array('controller' => 'provincias', 'action' => 'view', $localidade['Provincia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($localidade['Localidade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Codigopostal'); ?></dt>
		<dd>
			<?= h($localidade['Localidade']['codigopostal']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($localidade['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $localidade['Estado']['id'])); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($localidade['Localidade']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($localidade['Localidade']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Localidade'), array('action' => 'edit', $localidade['Localidade']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Localidade'), array('action' => 'delete', $localidade['Localidade']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $localidade['Localidade']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Localidades'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Localidade'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
