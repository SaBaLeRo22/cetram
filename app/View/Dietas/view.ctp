<?php 
/**
 * @var $this View
 */
?><div class="row dietas view">
    <div class="col-md-12">
        <h2><?= $dieta['Dieta']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($dieta['Dieta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($dieta['Dieta']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($dieta['Dieta']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($dieta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $dieta['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($dieta['Dieta']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($dieta['Dieta']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($dieta['Dieta']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($dieta['Dieta']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Dieta'), array('action' => 'edit', $dieta['Dieta']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Dieta'), array('action' => 'delete', $dieta['Dieta']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $dieta['Dieta']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Dietas'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Dieta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Viatico', ['controller' => 'viaticos', 'action' => 'add', 'dieta_id' => $dieta['Dieta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Viaticos'); ?></h3>
            <?php if (!empty($dieta['Viatico'])): ?>
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
                	<?php foreach ($dieta['Viatico'] as $viatico): ?>
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
