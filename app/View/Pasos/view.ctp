<?php 
/**
 * @var $this View
 */
?><div class="row pasos view">
    <div class="col-md-12">
        <h2><?= $paso['Paso']['completo'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($paso['Paso']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($paso['Consulta']['costo'], array('controller' => 'consultas', 'action' => 'view', $paso['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Agrupamiento'); ?></dt>
		<dd>
			<?= $this->Html->link($paso['Agrupamiento']['nombre'], array('controller' => 'agrupamientos', 'action' => 'view', $paso['Agrupamiento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Completo'); ?></dt>
		<dd>
			<?= h($paso['Paso']['completo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($paso['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $paso['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($paso['Paso']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($paso['Paso']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($paso['Paso']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($paso['Paso']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Paso'), array('action' => 'edit', $paso['Paso']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Paso'), array('action' => 'delete', $paso['Paso']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $paso['Paso']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Pasos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Paso'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
