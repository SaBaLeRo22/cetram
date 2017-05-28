<?php 
/**
 * @var $this View
 */
?><div class="row tipos view">
    <div class="col-md-12">
        <h2><?= $tipo['Tipo']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($tipo['Tipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($tipo['Tipo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($tipo['Tipo']['descripcion']); ?>
			&nbsp;
		</dd>
				<dt><?= __('Unidade'); ?></dt>
				<dd>
					<?= $this->Html->link($tipo['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $tipo['Unidade']['id'])); ?>
					&nbsp;
				</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($tipo['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $tipo['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($tipo['Tipo']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($tipo['Tipo']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($tipo['Tipo']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($tipo['Tipo']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Tipo'), array('action' => 'edit', $tipo['Tipo']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Tipo'), array('action' => 'delete', $tipo['Tipo']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $tipo['Tipo']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Tipos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Tipo'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Item', ['controller' => 'items', 'action' => 'add', 'tipo_id' => $tipo['Tipo']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Items'); ?></h3>
            <?php if (!empty($tipo['Item'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Tipo Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($tipo['Item'] as $item): ?>
		<tr>
			<td><?= $item['id']; ?></td>
			<td><?= $item['nombre']; ?></td>
			<td><?= $item['descripcion']; ?></td>
			<td><?= $item['tipo_id']; ?></td>
			<td><?= $item['estado_id']; ?></td>
			<td><?= $item['created']; ?></td>
			<td><?= $item['modified']; ?></td>
			<td><?= $item['user_created']; ?></td>
			<td><?= $item['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'items', 'action' => 'view', $item['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'items', 'action' => 'edit', $item['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'items', 'action' => 'delete', $item['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $item['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Parametro', ['controller' => 'parametros', 'action' => 'add', 'tipo_id' => $tipo['Tipo']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Parametros'); ?></h3>
            <?php if (!empty($tipo['Parametro'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Tipo Id'); ?></th>
		<th><?= __('Ambito Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($tipo['Parametro'] as $parametro): ?>
		<tr>
			<td><?= $parametro['id']; ?></td>
			<td><?= $parametro['nombre']; ?></td>
			<td><?= $parametro['descripcion']; ?></td>
			<td><?= $parametro['valor']; ?></td>
			<td><?= $parametro['unidade_id']; ?></td>
			<td><?= $parametro['tipo_id']; ?></td>
			<td><?= $parametro['ambito_id']; ?></td>
			<td><?= $parametro['estado_id']; ?></td>
			<td><?= $parametro['created']; ?></td>
			<td><?= $parametro['modified']; ?></td>
			<td><?= $parametro['user_created']; ?></td>
			<td><?= $parametro['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'parametros', 'action' => 'view', $parametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'parametros', 'action' => 'edit', $parametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'parametros', 'action' => 'delete', $parametro['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $parametro['id'])); ?>
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
