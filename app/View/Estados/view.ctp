<?php 
/**
 * @var $this View
 */
?><div class="row estados view">
    <div class="col-md-12">
        <h2><?= $estado['Estado']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($estado['Estado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($estado['Estado']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($estado['Estado']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($estado['Estado']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($estado['Estado']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($estado['Estado']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Estado'), array('action' => 'edit', $estado['Estado']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Estado'), array('action' => 'delete', $estado['Estado']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $estado['Estado']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Estados'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Ambito', ['controller' => 'ambitos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Ambitos'); ?></h3>
            <?php if (!empty($estado['Ambito'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Ambito'] as $ambito): ?>
		<tr>
			<td><?= $ambito['id']; ?></td>
			<td><?= $ambito['nombre']; ?></td>
			<td><?= $ambito['descripcion']; ?></td>
			<td><?= $ambito['estado_id']; ?></td>
			<td><?= $ambito['created']; ?></td>
			<td><?= $ambito['modified']; ?></td>
			<td><?= $ambito['user_created']; ?></td>
			<td><?= $ambito['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'ambitos', 'action' => 'view', $ambito['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'ambitos', 'action' => 'edit', $ambito['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'ambitos', 'action' => 'delete', $ambito['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $ambito['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Item', ['controller' => 'items', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Items'); ?></h3>
            <?php if (!empty($estado['Item'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Item'] as $item): ?>
		<tr>
			<td><?= $item['id']; ?></td>
			<td><?= $item['nombre']; ?></td>
			<td><?= $item['descripcion']; ?></td>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Localidade', ['controller' => 'localidades', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Localidades'); ?></h3>
            <?php if (!empty($estado['Localidade'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Provincia Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Codigopostal'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Estado Id'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Localidade'] as $localidade): ?>
		<tr>
			<td><?= $localidade['id']; ?></td>
			<td><?= $localidade['provincia_id']; ?></td>
			<td><?= $localidade['nombre']; ?></td>
			<td><?= $localidade['codigopostal']; ?></td>
			<td><?= $localidade['created']; ?></td>
			<td><?= $localidade['modified']; ?></td>
			<td><?= $localidade['estado_id']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'localidades', 'action' => 'view', $localidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'localidades', 'action' => 'edit', $localidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'localidades', 'action' => 'delete', $localidade['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $localidade['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Parametro', ['controller' => 'parametros', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Parametros'); ?></h3>
            <?php if (!empty($estado['Parametro'])): ?>
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
                	<?php foreach ($estado['Parametro'] as $parametro): ?>
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
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Provincia', ['controller' => 'provincias', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Provincias'); ?></h3>
            <?php if (!empty($estado['Provincia'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Codigo31662'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Estado Id'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Provincia'] as $provincia): ?>
		<tr>
			<td><?= $provincia['id']; ?></td>
			<td><?= $provincia['nombre']; ?></td>
			<td><?= $provincia['codigo31662']; ?></td>
			<td><?= $provincia['created']; ?></td>
			<td><?= $provincia['modified']; ?></td>
			<td><?= $provincia['estado_id']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'provincias', 'action' => 'view', $provincia['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'provincias', 'action' => 'edit', $provincia['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'provincias', 'action' => 'delete', $provincia['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $provincia['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Sectore', ['controller' => 'sectores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Sectores'); ?></h3>
            <?php if (!empty($estado['Sectore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Estado Id'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Sectore'] as $sectore): ?>
		<tr>
			<td><?= $sectore['id']; ?></td>
			<td><?= $sectore['nombre']; ?></td>
			<td><?= $sectore['created']; ?></td>
			<td><?= $sectore['modified']; ?></td>
			<td><?= $sectore['estado_id']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'sectores', 'action' => 'view', $sectore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'sectores', 'action' => 'edit', $sectore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'sectores', 'action' => 'delete', $sectore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $sectore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Tipo', ['controller' => 'tipos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Tipos'); ?></h3>
            <?php if (!empty($estado['Tipo'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Tipo'] as $tipo): ?>
		<tr>
			<td><?= $tipo['id']; ?></td>
			<td><?= $tipo['nombre']; ?></td>
			<td><?= $tipo['descripcion']; ?></td>
			<td><?= $tipo['estado_id']; ?></td>
			<td><?= $tipo['created']; ?></td>
			<td><?= $tipo['modified']; ?></td>
			<td><?= $tipo['user_created']; ?></td>
			<td><?= $tipo['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'tipos', 'action' => 'view', $tipo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'tipos', 'action' => 'edit', $tipo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'tipos', 'action' => 'delete', $tipo['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $tipo['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Unidade', ['controller' => 'unidades', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Unidades'); ?></h3>
            <?php if (!empty($estado['Unidade'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Unidade'] as $unidade): ?>
		<tr>
			<td><?= $unidade['id']; ?></td>
			<td><?= $unidade['nombre']; ?></td>
			<td><?= $unidade['descripcion']; ?></td>
			<td><?= $unidade['estado_id']; ?></td>
			<td><?= $unidade['created']; ?></td>
			<td><?= $unidade['modified']; ?></td>
			<td><?= $unidade['user_created']; ?></td>
			<td><?= $unidade['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'unidades', 'action' => 'view', $unidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'unidades', 'action' => 'edit', $unidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'unidades', 'action' => 'delete', $unidade['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $unidade['id'])); ?>
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
