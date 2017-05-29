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
                <dt>Created</dt>
                    <dd><?= h($modo['Modo']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($modo['Modo']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Modo'), array('action' => 'edit', $modo['Modo']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Modo'), array('action' => 'delete', $modo['Modo']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $modo['Modo']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Modos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Modo'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Consulta', ['controller' => 'consultas', 'action' => 'add', 'modo_id' => $modo['Modo']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Consultas'); ?></h3>
            <?php if (!empty($modo['Consulta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Costo'); ?></th>
		<th><?= __('Tarifa'); ?></th>
		<th><?= __('Subsidio'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Observaciones'); ?></th>
		<th><?= __('Modo Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($modo['Consulta'] as $consulta): ?>
		<tr>
			<td><?= $consulta['id']; ?></td>
			<td><?= $consulta['costo']; ?></td>
			<td><?= $consulta['tarifa']; ?></td>
			<td><?= $consulta['subsidio']; ?></td>
			<td><?= $consulta['unidade_id']; ?></td>
			<td><?= $consulta['observaciones']; ?></td>
			<td><?= $consulta['modo_id']; ?></td>
			<td><?= $consulta['estado_id']; ?></td>
			<td><?= $consulta['created']; ?></td>
			<td><?= $consulta['modified']; ?></td>
			<td><?= $consulta['user_created']; ?></td>
			<td><?= $consulta['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'consultas', 'action' => 'view', $consulta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'consultas', 'action' => 'edit', $consulta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'consultas', 'action' => 'delete', $consulta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $consulta['id'])); ?>
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
