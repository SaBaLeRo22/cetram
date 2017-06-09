<?php 
/**
 * @var $this View
 */
?><div class="row respuestaSalarios view">
    <div class="col-md-12">
        <h2><?= $respuestaSalario['RespuestaSalario']['categoria'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaSalario['Consulta']['costo'], array('controller' => 'consultas', 'action' => 'view', $respuestaSalario['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Convenio'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaSalario['Convenio']['anio'], array('controller' => 'convenios', 'action' => 'view', $respuestaSalario['Convenio']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Anio'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['anio']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Inicio'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['inicio']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Fin'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['fin']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Categoria'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaSalario['Categoria']['nombre'], array('controller' => 'categorias', 'action' => 'view', $respuestaSalario['Categoria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Categoria'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['categoria']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Salario'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['salario']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Cantidad'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaSalario['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaSalario['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaSalario['RespuestaSalario']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaSalario['RespuestaSalario']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaSalario['RespuestaSalario']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Salario'), array('action' => 'edit', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Salario'), array('action' => 'delete', $respuestaSalario['RespuestaSalario']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaSalario['RespuestaSalario']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Salarios'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Salario'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
