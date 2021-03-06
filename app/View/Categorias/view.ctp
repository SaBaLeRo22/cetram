<?php 
/**
 * @var $this View
 */
?><div class="row categorias view">
    <div class="col-md-12">
        <h2><?= $categoria['Categoria']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($categoria['Categoria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($categoria['Categoria']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($categoria['Categoria']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Cantidad'); ?></dt>
		<dd>
			<?= h($categoria['Categoria']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Antiguedad'); ?></dt>
		<dd>
			<?= h($categoria['Categoria']['antiguedad']); ?>
			&nbsp;
		</dd>
            </dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($categoria['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $parametro['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($categoria['Categoria']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($categoria['Categoria']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($categoria['Categoria']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($categoria['Categoria']['modified']); ?>&nbsp;</dd>
			</dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Categoria'), array('action' => 'edit', $categoria['Categoria']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Categoria'), array('action' => 'eliminar', $categoria['Categoria']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $categoria['Categoria']['id'])); ?>
		<?= $this->Html->link(__('Listado de Categorias'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Categoria'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Salario', ['controller' => 'salarios', 'action' => 'add', 'categoria_id' => $categoria['Categoria']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Salarios'); ?></h3>
            <?php if (!empty($categoria['Salario'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Convenio'); ?></th>
		<th><?= __('Sueldo'); ?></th>
		<th><?= __('Bonificacion Anual'); ?></th>
		<th><?= __('Sac'); ?></th>
		<th><?= __('Vacaciones'); ?></th>
		<th><?= __('Contribuciones'); ?></th>
		<th><?= __('Estado'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($categoria['Salario'] as $salario): ?>
		<tr>
			<td><?= $salario['id']; ?></td>
			<td><?= $salario['Convenio']['anio']; ?></td>
			<td><?= $salario['sueldo']; ?></td>
			<td><?= $salario['bonificacion_anual']; ?></td>
			<td><?= $salario['sac']; ?></td>
			<td><?= $salario['vacaciones']; ?></td>
			<td><?= $salario['contribuciones']; ?></td>
			<td><?= $salario['Estado']['nombre']; ?></td>
			<td><?= $salario['created']; ?></td>
			<td><?= $salario['modified']; ?></td>
			<td><?= $this->Authake->getUsuario($salario['user_created']); ?></td>
			<td><?= $this->Authake->getUsuario($salario['user_modified']); ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'salarios', 'action' => 'view', $salario['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'salarios', 'action' => 'edit', $salario['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'salarios', 'action' => 'eliminar', $salario['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $salario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
          
    </div>
</div>
