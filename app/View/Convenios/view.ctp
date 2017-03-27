<?php 
/**
 * @var $this View
 */
?><div class="row convenios view">
    <div class="col-md-12">
        <h2><?= $convenio['Convenio']['anio'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Anio'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['anio']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Inio'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['inio']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Fin'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['fin']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Observaciones'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($convenio['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $convenio['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($convenio['Convenio']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($convenio['Convenio']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($convenio['Convenio']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Convenio'), array('action' => 'edit', $convenio['Convenio']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Convenio'), array('action' => 'delete', $convenio['Convenio']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $convenio['Convenio']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Convenios'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Convenio'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Salario', ['controller' => 'salarios', 'action' => 'add', 'convenio_id' => $convenio['Convenio']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Salarios'); ?></h3>
            <?php if (!empty($convenio['Salario'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Convenio Id'); ?></th>
		<th><?= __('Categoria Id'); ?></th>
		<th><?= __('Sueldo'); ?></th>
		<th><?= __('Bonificacion Anual'); ?></th>
		<th><?= __('Sac'); ?></th>
		<th><?= __('Vacaciones'); ?></th>
		<th><?= __('Contribuciones'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($convenio['Salario'] as $salario): ?>
		<tr>
			<td><?= $salario['id']; ?></td>
			<td><?= $salario['convenio_id']; ?></td>
			<td><?= $salario['categoria_id']; ?></td>
			<td><?= $salario['sueldo']; ?></td>
			<td><?= $salario['bonificacion_anual']; ?></td>
			<td><?= $salario['sac']; ?></td>
			<td><?= $salario['vacaciones']; ?></td>
			<td><?= $salario['contribuciones']; ?></td>
			<td><?= $salario['estado_id']; ?></td>
			<td><?= $salario['created']; ?></td>
			<td><?= $salario['modified']; ?></td>
			<td><?= $salario['user_created']; ?></td>
			<td><?= $salario['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'salarios', 'action' => 'view', $salario['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'salarios', 'action' => 'edit', $salario['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'salarios', 'action' => 'delete', $salario['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $salario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Viatico', ['controller' => 'viaticos', 'action' => 'add', 'convenio_id' => $convenio['Convenio']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Viaticos'); ?></h3>
            <?php if (!empty($convenio['Viatico'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Convenio Id'); ?></th>
		<th><?= __('Dieta Id'); ?></th>
		<th><?= __('Costo'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($convenio['Viatico'] as $viatico): ?>
		<tr>
			<td><?= $viatico['id']; ?></td>
			<td><?= $viatico['convenio_id']; ?></td>
			<td><?= $viatico['dieta_id']; ?></td>
			<td><?= $viatico['costo']; ?></td>
			<td><?= $viatico['estado_id']; ?></td>
			<td><?= $viatico['created']; ?></td>
			<td><?= $viatico['modified']; ?></td>
			<td><?= $viatico['user_created']; ?></td>
			<td><?= $viatico['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'viaticos', 'action' => 'view', $viatico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'viaticos', 'action' => 'edit', $viatico['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'viaticos', 'action' => 'delete', $viatico['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $viatico['id'])); ?>
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
