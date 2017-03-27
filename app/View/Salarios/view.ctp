<?php 
/**
 * @var $this View
 */
?><div class="row salarios view">
    <div class="col-md-12">
        <h2><?= $salario['Salario']['sueldo'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($salario['Salario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Convenio'); ?></dt>
		<dd>
			<?= $this->Html->link($salario['Convenio']['anio'], array('controller' => 'convenios', 'action' => 'view', $salario['Convenio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Categoria'); ?></dt>
		<dd>
			<?= $this->Html->link($salario['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $salario['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Sueldo'); ?></dt>
		<dd>
			<?= h($salario['Salario']['sueldo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Bonificacion Anual'); ?></dt>
		<dd>
			<?= h($salario['Salario']['bonificacion_anual']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Sac'); ?></dt>
		<dd>
			<?= h($salario['Salario']['sac']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Vacaciones'); ?></dt>
		<dd>
			<?= h($salario['Salario']['vacaciones']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Contribuciones'); ?></dt>
		<dd>
			<?= h($salario['Salario']['contribuciones']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($salario['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $salario['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($salario['Salario']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($salario['Salario']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($salario['Salario']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($salario['Salario']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Salario'), array('action' => 'edit', $salario['Salario']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Salario'), array('action' => 'delete', $salario['Salario']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $salario['Salario']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Salarios'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Salario'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
