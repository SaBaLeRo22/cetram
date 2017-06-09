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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Agrupamiento', ['controller' => 'agrupamientos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Agrupamientos'); ?></h3>
            <?php if (!empty($estado['Agrupamiento'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Orden'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Agrupamiento'] as $agrupamiento): ?>
		<tr>
			<td><?= $agrupamiento['id']; ?></td>
			<td><?= $agrupamiento['nombre']; ?></td>
			<td><?= $agrupamiento['descripcion']; ?></td>
			<td><?= $agrupamiento['orden']; ?></td>
			<td><?= $agrupamiento['estado_id']; ?></td>
			<td><?= $agrupamiento['created']; ?></td>
			<td><?= $agrupamiento['modified']; ?></td>
			<td><?= $agrupamiento['user_created']; ?></td>
			<td><?= $agrupamiento['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'agrupamientos', 'action' => 'view', $agrupamiento['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'agrupamientos', 'action' => 'edit', $agrupamiento['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'agrupamientos', 'action' => 'delete', $agrupamiento['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $agrupamiento['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Categoria', ['controller' => 'categorias', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Categorias'); ?></h3>
            <?php if (!empty($estado['Categoria'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Cantidad'); ?></th>
		<th><?= __('Antiguedad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Categoria'] as $categoria): ?>
		<tr>
			<td><?= $categoria['id']; ?></td>
			<td><?= $categoria['nombre']; ?></td>
			<td><?= $categoria['descripcion']; ?></td>
			<td><?= $categoria['cantidad']; ?></td>
			<td><?= $categoria['antiguedad']; ?></td>
			<td><?= $categoria['estado_id']; ?></td>
			<td><?= $categoria['created']; ?></td>
			<td><?= $categoria['modified']; ?></td>
			<td><?= $categoria['user_created']; ?></td>
			<td><?= $categoria['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'categorias', 'action' => 'view', $categoria['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'categorias', 'action' => 'edit', $categoria['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'categorias', 'action' => 'delete', $categoria['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $categoria['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Coeficiente', ['controller' => 'coeficientes', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Coeficientes'); ?></h3>
            <?php if (!empty($estado['Coeficiente'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
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
                	<?php foreach ($estado['Coeficiente'] as $coeficiente): ?>
		<tr>
			<td><?= $coeficiente['id']; ?></td>
			<td><?= $coeficiente['nombre']; ?></td>
			<td><?= $coeficiente['descripcion']; ?></td>
			<td><?= $coeficiente['minimo']; ?></td>
			<td><?= $coeficiente['maximo']; ?></td>
			<td><?= $coeficiente['ambito_id']; ?></td>
			<td><?= $coeficiente['estado_id']; ?></td>
			<td><?= $coeficiente['created']; ?></td>
			<td><?= $coeficiente['modified']; ?></td>
			<td><?= $coeficiente['user_created']; ?></td>
			<td><?= $coeficiente['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'coeficientes', 'action' => 'view', $coeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'coeficientes', 'action' => 'edit', $coeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'coeficientes', 'action' => 'delete', $coeficiente['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $coeficiente['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Consulta', ['controller' => 'consultas', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Consultas'); ?></h3>
            <?php if (!empty($estado['Consulta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Costo'); ?></th>
		<th><?= __('Tarifa'); ?></th>
		<th><?= __('Subsidio'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Localidade Id'); ?></th>
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
                	<?php foreach ($estado['Consulta'] as $consulta): ?>
		<tr>
			<td><?= $consulta['id']; ?></td>
			<td><?= $consulta['costo']; ?></td>
			<td><?= $consulta['tarifa']; ?></td>
			<td><?= $consulta['subsidio']; ?></td>
			<td><?= $consulta['unidade_id']; ?></td>
			<td><?= $consulta['localidade_id']; ?></td>
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
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Convenio', ['controller' => 'convenios', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Convenios'); ?></h3>
            <?php if (!empty($estado['Convenio'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Anio'); ?></th>
		<th><?= __('Inio'); ?></th>
		<th><?= __('Fin'); ?></th>
		<th><?= __('Observaciones'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Convenio'] as $convenio): ?>
		<tr>
			<td><?= $convenio['id']; ?></td>
			<td><?= $convenio['anio']; ?></td>
			<td><?= $convenio['inio']; ?></td>
			<td><?= $convenio['fin']; ?></td>
			<td><?= $convenio['observaciones']; ?></td>
			<td><?= $convenio['estado_id']; ?></td>
			<td><?= $convenio['created']; ?></td>
			<td><?= $convenio['modified']; ?></td>
			<td><?= $convenio['user_created']; ?></td>
			<td><?= $convenio['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'convenios', 'action' => 'view', $convenio['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'convenios', 'action' => 'edit', $convenio['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'convenios', 'action' => 'delete', $convenio['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $convenio['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Dieta', ['controller' => 'dietas', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Dietas'); ?></h3>
            <?php if (!empty($estado['Dieta'])): ?>
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
                	<?php foreach ($estado['Dieta'] as $dieta): ?>
		<tr>
			<td><?= $dieta['id']; ?></td>
			<td><?= $dieta['nombre']; ?></td>
			<td><?= $dieta['descripcion']; ?></td>
			<td><?= $dieta['estado_id']; ?></td>
			<td><?= $dieta['created']; ?></td>
			<td><?= $dieta['modified']; ?></td>
			<td><?= $dieta['user_created']; ?></td>
			<td><?= $dieta['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'dietas', 'action' => 'view', $dieta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'dietas', 'action' => 'edit', $dieta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'dietas', 'action' => 'delete', $dieta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $dieta['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Factore', ['controller' => 'factores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Factores'); ?></h3>
            <?php if (!empty($estado['Factore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Antiguedad Maxima'); ?></th>
		<th><?= __('Valor Residual'); ?></th>
		<th><?= __('Porcentaje Amortizar'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Factore'] as $factore): ?>
		<tr>
			<td><?= $factore['id']; ?></td>
			<td><?= $factore['nombre']; ?></td>
			<td><?= $factore['descripcion']; ?></td>
			<td><?= $factore['antiguedad_maxima']; ?></td>
			<td><?= $factore['valor_residual']; ?></td>
			<td><?= $factore['porcentaje_amortizar']; ?></td>
			<td><?= $factore['estado_id']; ?></td>
			<td><?= $factore['created']; ?></td>
			<td><?= $factore['modified']; ?></td>
			<td><?= $factore['user_created']; ?></td>
			<td><?= $factore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'factores', 'action' => 'view', $factore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'factores', 'action' => 'edit', $factore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'factores', 'action' => 'delete', $factore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $factore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Indicadore', ['controller' => 'indicadores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Indicadores'); ?></h3>
            <?php if (!empty($estado['Indicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Calculo'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
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
                	<?php foreach ($estado['Indicadore'] as $indicadore): ?>
		<tr>
			<td><?= $indicadore['id']; ?></td>
			<td><?= $indicadore['nombre']; ?></td>
			<td><?= $indicadore['descripcion']; ?></td>
			<td><?= $indicadore['calculo']; ?></td>
			<td><?= $indicadore['minimo']; ?></td>
			<td><?= $indicadore['maximo']; ?></td>
			<td><?= $indicadore['unidade_id']; ?></td>
			<td><?= $indicadore['ambito_id']; ?></td>
			<td><?= $indicadore['estado_id']; ?></td>
			<td><?= $indicadore['created']; ?></td>
			<td><?= $indicadore['modified']; ?></td>
			<td><?= $indicadore['user_created']; ?></td>
			<td><?= $indicadore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'indicadores', 'action' => 'view', $indicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'indicadores', 'action' => 'edit', $indicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'indicadores', 'action' => 'delete', $indicadore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $indicadore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Intervencione', ['controller' => 'intervenciones', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Intervenciones'); ?></h3>
            <?php if (!empty($estado['Intervencione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Coeficiente Id'); ?></th>
		<th><?= __('Item Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Intervencione'] as $intervencione): ?>
		<tr>
			<td><?= $intervencione['id']; ?></td>
			<td><?= $intervencione['coeficiente_id']; ?></td>
			<td><?= $intervencione['item_id']; ?></td>
			<td><?= $intervencione['estado_id']; ?></td>
			<td><?= $intervencione['created']; ?></td>
			<td><?= $intervencione['modified']; ?></td>
			<td><?= $intervencione['user_created']; ?></td>
			<td><?= $intervencione['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'intervenciones', 'action' => 'view', $intervencione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'intervenciones', 'action' => 'edit', $intervencione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'intervenciones', 'action' => 'delete', $intervencione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $intervencione['id'])); ?>
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
		<th><?= __('Tipo Id'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
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
			<td><?= $item['tipo_id']; ?></td>
			<td><?= $item['unidade_id']; ?></td>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Matrix', ['controller' => 'matrices', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Matrices'); ?></h3>
            <?php if (!empty($estado['Matrix'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Coeficiente Id'); ?></th>
		<th><?= __('Multiplicadore Id'); ?></th>
		<th><?= __('Peso'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Matrix'] as $matrix): ?>
		<tr>
			<td><?= $matrix['id']; ?></td>
			<td><?= $matrix['coeficiente_id']; ?></td>
			<td><?= $matrix['multiplicadore_id']; ?></td>
			<td><?= $matrix['peso']; ?></td>
			<td><?= $matrix['estado_id']; ?></td>
			<td><?= $matrix['created']; ?></td>
			<td><?= $matrix['modified']; ?></td>
			<td><?= $matrix['user_created']; ?></td>
			<td><?= $matrix['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'matrices', 'action' => 'view', $matrix['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'matrices', 'action' => 'edit', $matrix['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'matrices', 'action' => 'delete', $matrix['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $matrix['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Modo', ['controller' => 'modos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Modos'); ?></h3>
            <?php if (!empty($estado['Modo'])): ?>
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
                	<?php foreach ($estado['Modo'] as $modo): ?>
		<tr>
			<td><?= $modo['id']; ?></td>
			<td><?= $modo['nombre']; ?></td>
			<td><?= $modo['descripcion']; ?></td>
			<td><?= $modo['estado_id']; ?></td>
			<td><?= $modo['created']; ?></td>
			<td><?= $modo['modified']; ?></td>
			<td><?= $modo['user_created']; ?></td>
			<td><?= $modo['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'modos', 'action' => 'view', $modo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'modos', 'action' => 'edit', $modo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'modos', 'action' => 'delete', $modo['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $modo['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Multiplicadore', ['controller' => 'multiplicadores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Multiplicadores'); ?></h3>
            <?php if (!empty($estado['Multiplicadore'])): ?>
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
                	<?php foreach ($estado['Multiplicadore'] as $multiplicadore): ?>
		<tr>
			<td><?= $multiplicadore['id']; ?></td>
			<td><?= $multiplicadore['nombre']; ?></td>
			<td><?= $multiplicadore['descripcion']; ?></td>
			<td><?= $multiplicadore['estado_id']; ?></td>
			<td><?= $multiplicadore['created']; ?></td>
			<td><?= $multiplicadore['modified']; ?></td>
			<td><?= $multiplicadore['user_created']; ?></td>
			<td><?= $multiplicadore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'multiplicadores', 'action' => 'view', $multiplicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'multiplicadores', 'action' => 'edit', $multiplicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'multiplicadores', 'action' => 'delete', $multiplicadore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $multiplicadore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Opcione', ['controller' => 'opciones', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Opciones'); ?></h3>
            <?php if (!empty($estado['Opcione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Pregunta Id'); ?></th>
		<th><?= __('Opcion'); ?></th>
		<th><?= __('Funcion'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Opcione'] as $opcione): ?>
		<tr>
			<td><?= $opcione['id']; ?></td>
			<td><?= $opcione['pregunta_id']; ?></td>
			<td><?= $opcione['opcion']; ?></td>
			<td><?= $opcione['funcion']; ?></td>
			<td><?= $opcione['unidade_id']; ?></td>
			<td><?= $opcione['estado_id']; ?></td>
			<td><?= $opcione['created']; ?></td>
			<td><?= $opcione['modified']; ?></td>
			<td><?= $opcione['user_created']; ?></td>
			<td><?= $opcione['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'opciones', 'action' => 'view', $opcione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'opciones', 'action' => 'edit', $opcione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'opciones', 'action' => 'delete', $opcione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $opcione['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Participacione', ['controller' => 'participaciones', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Participaciones'); ?></h3>
            <?php if (!empty($estado['Participacione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Parametro Id'); ?></th>
		<th><?= __('Item Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['Participacione'] as $participacione): ?>
		<tr>
			<td><?= $participacione['id']; ?></td>
			<td><?= $participacione['parametro_id']; ?></td>
			<td><?= $participacione['item_id']; ?></td>
			<td><?= $participacione['estado_id']; ?></td>
			<td><?= $participacione['created']; ?></td>
			<td><?= $participacione['modified']; ?></td>
			<td><?= $participacione['user_created']; ?></td>
			<td><?= $participacione['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'participaciones', 'action' => 'view', $participacione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'participaciones', 'action' => 'edit', $participacione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'participaciones', 'action' => 'delete', $participacione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $participacione['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Pregunta', ['controller' => 'preguntas', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Preguntas'); ?></h3>
            <?php if (!empty($estado['Pregunta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Pregunta'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Orden'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Multiplicadore Id'); ?></th>
		<th><?= __('Agrupamiento Id'); ?></th>
		<th><?= __('Opciones'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Titulo'); ?></th>
		<th><?= __('Ayuda'); ?></th>
		<th><?= __('Tipo'); ?></th>
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
                	<?php foreach ($estado['Pregunta'] as $pregunta): ?>
		<tr>
			<td><?= $pregunta['id']; ?></td>
			<td><?= $pregunta['pregunta']; ?></td>
			<td><?= $pregunta['descripcion']; ?></td>
			<td><?= $pregunta['orden']; ?></td>
			<td><?= $pregunta['minimo']; ?></td>
			<td><?= $pregunta['maximo']; ?></td>
			<td><?= $pregunta['multiplicadore_id']; ?></td>
			<td><?= $pregunta['agrupamiento_id']; ?></td>
			<td><?= $pregunta['opciones']; ?></td>
			<td><?= $pregunta['unidade_id']; ?></td>
			<td><?= $pregunta['titulo']; ?></td>
			<td><?= $pregunta['ayuda']; ?></td>
			<td><?= $pregunta['tipo']; ?></td>
			<td><?= $pregunta['ambito_id']; ?></td>
			<td><?= $pregunta['estado_id']; ?></td>
			<td><?= $pregunta['created']; ?></td>
			<td><?= $pregunta['modified']; ?></td>
			<td><?= $pregunta['user_created']; ?></td>
			<td><?= $pregunta['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'preguntas', 'action' => 'view', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'preguntas', 'action' => 'edit', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'preguntas', 'action' => 'delete', $pregunta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $pregunta['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Coeficiente', ['controller' => 'respuesta_coeficientes', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Coeficientes'); ?></h3>
            <?php if (!empty($estado['RespuestaCoeficiente'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Coeficiente Id'); ?></th>
		<th><?= __('Coeficiente'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaCoeficiente'] as $respuestaCoeficiente): ?>
		<tr>
			<td><?= $respuestaCoeficiente['id']; ?></td>
			<td><?= $respuestaCoeficiente['consulta_id']; ?></td>
			<td><?= $respuestaCoeficiente['coeficiente_id']; ?></td>
			<td><?= $respuestaCoeficiente['coeficiente']; ?></td>
			<td><?= $respuestaCoeficiente['valor']; ?></td>
			<td><?= $respuestaCoeficiente['minimo']; ?></td>
			<td><?= $respuestaCoeficiente['maximo']; ?></td>
			<td><?= $respuestaCoeficiente['unidade_id']; ?></td>
			<td><?= $respuestaCoeficiente['unidad']; ?></td>
			<td><?= $respuestaCoeficiente['estado_id']; ?></td>
			<td><?= $respuestaCoeficiente['created']; ?></td>
			<td><?= $respuestaCoeficiente['modified']; ?></td>
			<td><?= $respuestaCoeficiente['user_created']; ?></td>
			<td><?= $respuestaCoeficiente['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_coeficientes', 'action' => 'view', $respuestaCoeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_coeficientes', 'action' => 'edit', $respuestaCoeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_coeficientes', 'action' => 'delete', $respuestaCoeficiente['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaCoeficiente['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Indicadore', ['controller' => 'respuesta_indicadores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Indicadores'); ?></h3>
            <?php if (!empty($estado['RespuestaIndicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Indicadore Id'); ?></th>
		<th><?= __('Indicador'); ?></th>
		<th><?= __('Notificar'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaIndicadore'] as $respuestaIndicadore): ?>
		<tr>
			<td><?= $respuestaIndicadore['id']; ?></td>
			<td><?= $respuestaIndicadore['consulta_id']; ?></td>
			<td><?= $respuestaIndicadore['indicadore_id']; ?></td>
			<td><?= $respuestaIndicadore['indicador']; ?></td>
			<td><?= $respuestaIndicadore['notificar']; ?></td>
			<td><?= $respuestaIndicadore['valor']; ?></td>
			<td><?= $respuestaIndicadore['minimo']; ?></td>
			<td><?= $respuestaIndicadore['maximo']; ?></td>
			<td><?= $respuestaIndicadore['unidade_id']; ?></td>
			<td><?= $respuestaIndicadore['unidad']; ?></td>
			<td><?= $respuestaIndicadore['estado_id']; ?></td>
			<td><?= $respuestaIndicadore['created']; ?></td>
			<td><?= $respuestaIndicadore['modified']; ?></td>
			<td><?= $respuestaIndicadore['user_created']; ?></td>
			<td><?= $respuestaIndicadore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_indicadores', 'action' => 'view', $respuestaIndicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_indicadores', 'action' => 'edit', $respuestaIndicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_indicadores', 'action' => 'delete', $respuestaIndicadore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaIndicadore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Item', ['controller' => 'respuesta_items', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Items'); ?></h3>
            <?php if (!empty($estado['RespuestaItem'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Item Id'); ?></th>
		<th><?= __('Item'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Incidencia Valor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Incidencia Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Incidencia Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaItem'] as $respuestaItem): ?>
		<tr>
			<td><?= $respuestaItem['id']; ?></td>
			<td><?= $respuestaItem['consulta_id']; ?></td>
			<td><?= $respuestaItem['item_id']; ?></td>
			<td><?= $respuestaItem['item']; ?></td>
			<td><?= $respuestaItem['valor']; ?></td>
			<td><?= $respuestaItem['incidencia_valor']; ?></td>
			<td><?= $respuestaItem['minimo']; ?></td>
			<td><?= $respuestaItem['incidencia_minimo']; ?></td>
			<td><?= $respuestaItem['maximo']; ?></td>
			<td><?= $respuestaItem['incidencia_maximo']; ?></td>
			<td><?= $respuestaItem['unidade_id']; ?></td>
			<td><?= $respuestaItem['unidad']; ?></td>
			<td><?= $respuestaItem['estado_id']; ?></td>
			<td><?= $respuestaItem['created']; ?></td>
			<td><?= $respuestaItem['modified']; ?></td>
			<td><?= $respuestaItem['user_created']; ?></td>
			<td><?= $respuestaItem['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_items', 'action' => 'view', $respuestaItem['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_items', 'action' => 'edit', $respuestaItem['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_items', 'action' => 'delete', $respuestaItem['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaItem['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Multiplicadore', ['controller' => 'respuesta_multiplicadores', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Multiplicadores'); ?></h3>
            <?php if (!empty($estado['RespuestaMultiplicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Multiplicadore Id'); ?></th>
		<th><?= __('Multiplicador'); ?></th>
		<th><?= __('Ponderador'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaMultiplicadore'] as $respuestaMultiplicadore): ?>
		<tr>
			<td><?= $respuestaMultiplicadore['id']; ?></td>
			<td><?= $respuestaMultiplicadore['consulta_id']; ?></td>
			<td><?= $respuestaMultiplicadore['multiplicadore_id']; ?></td>
			<td><?= $respuestaMultiplicadore['multiplicador']; ?></td>
			<td><?= $respuestaMultiplicadore['ponderador']; ?></td>
			<td><?= $respuestaMultiplicadore['estado_id']; ?></td>
			<td><?= $respuestaMultiplicadore['created']; ?></td>
			<td><?= $respuestaMultiplicadore['modified']; ?></td>
			<td><?= $respuestaMultiplicadore['user_created']; ?></td>
			<td><?= $respuestaMultiplicadore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_multiplicadores', 'action' => 'view', $respuestaMultiplicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_multiplicadores', 'action' => 'edit', $respuestaMultiplicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_multiplicadores', 'action' => 'delete', $respuestaMultiplicadore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaMultiplicadore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Parametro', ['controller' => 'respuesta_parametros', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Parametros'); ?></h3>
            <?php if (!empty($estado['RespuestaParametro'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Parametro Id'); ?></th>
		<th><?= __('Parametro'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaParametro'] as $respuestaParametro): ?>
		<tr>
			<td><?= $respuestaParametro['id']; ?></td>
			<td><?= $respuestaParametro['consulta_id']; ?></td>
			<td><?= $respuestaParametro['parametro_id']; ?></td>
			<td><?= $respuestaParametro['parametro']; ?></td>
			<td><?= $respuestaParametro['valor']; ?></td>
			<td><?= $respuestaParametro['unidade_id']; ?></td>
			<td><?= $respuestaParametro['unidad']; ?></td>
			<td><?= $respuestaParametro['estado_id']; ?></td>
			<td><?= $respuestaParametro['created']; ?></td>
			<td><?= $respuestaParametro['modified']; ?></td>
			<td><?= $respuestaParametro['user_created']; ?></td>
			<td><?= $respuestaParametro['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_parametros', 'action' => 'view', $respuestaParametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_parametros', 'action' => 'edit', $respuestaParametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_parametros', 'action' => 'delete', $respuestaParametro['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaParametro['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Pregunta', ['controller' => 'respuesta_preguntas', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Preguntas'); ?></h3>
            <?php if (!empty($estado['RespuestaPregunta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Pregunta Id'); ?></th>
		<th><?= __('Pregunta'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Respuesta'); ?></th>
		<th><?= __('Opcione Id'); ?></th>
		<th><?= __('Funcion'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaPregunta'] as $respuestaPregunta): ?>
		<tr>
			<td><?= $respuestaPregunta['id']; ?></td>
			<td><?= $respuestaPregunta['consulta_id']; ?></td>
			<td><?= $respuestaPregunta['pregunta_id']; ?></td>
			<td><?= $respuestaPregunta['pregunta']; ?></td>
			<td><?= $respuestaPregunta['valor']; ?></td>
			<td><?= $respuestaPregunta['minimo']; ?></td>
			<td><?= $respuestaPregunta['maximo']; ?></td>
			<td><?= $respuestaPregunta['unidade_id']; ?></td>
			<td><?= $respuestaPregunta['unidad']; ?></td>
			<td><?= $respuestaPregunta['respuesta']; ?></td>
			<td><?= $respuestaPregunta['opcione_id']; ?></td>
			<td><?= $respuestaPregunta['funcion']; ?></td>
			<td><?= $respuestaPregunta['estado_id']; ?></td>
			<td><?= $respuestaPregunta['created']; ?></td>
			<td><?= $respuestaPregunta['modified']; ?></td>
			<td><?= $respuestaPregunta['user_created']; ?></td>
			<td><?= $respuestaPregunta['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_preguntas', 'action' => 'view', $respuestaPregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_preguntas', 'action' => 'edit', $respuestaPregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_preguntas', 'action' => 'delete', $respuestaPregunta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaPregunta['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Tipo', ['controller' => 'respuesta_tipos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Tipos'); ?></h3>
            <?php if (!empty($estado['RespuestaTipo'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Tipo Id'); ?></th>
		<th><?= __('Tipo'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Incidencia Valor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Incidencia Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Incidencia Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($estado['RespuestaTipo'] as $respuestaTipo): ?>
		<tr>
			<td><?= $respuestaTipo['id']; ?></td>
			<td><?= $respuestaTipo['consulta_id']; ?></td>
			<td><?= $respuestaTipo['tipo_id']; ?></td>
			<td><?= $respuestaTipo['tipo']; ?></td>
			<td><?= $respuestaTipo['valor']; ?></td>
			<td><?= $respuestaTipo['incidencia_valor']; ?></td>
			<td><?= $respuestaTipo['minimo']; ?></td>
			<td><?= $respuestaTipo['incidencia_minimo']; ?></td>
			<td><?= $respuestaTipo['maximo']; ?></td>
			<td><?= $respuestaTipo['incidencia_maximo']; ?></td>
			<td><?= $respuestaTipo['unidade_id']; ?></td>
			<td><?= $respuestaTipo['unidad']; ?></td>
			<td><?= $respuestaTipo['estado_id']; ?></td>
			<td><?= $respuestaTipo['created']; ?></td>
			<td><?= $respuestaTipo['modified']; ?></td>
			<td><?= $respuestaTipo['user_created']; ?></td>
			<td><?= $respuestaTipo['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'respuesta_tipos', 'action' => 'view', $respuestaTipo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'respuesta_tipos', 'action' => 'edit', $respuestaTipo['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'respuesta_tipos', 'action' => 'delete', $respuestaTipo['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $respuestaTipo['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Salario', ['controller' => 'salarios', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Salarios'); ?></h3>
            <?php if (!empty($estado['Salario'])): ?>
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
                	<?php foreach ($estado['Salario'] as $salario): ?>
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
		<th><?= __('Unidade Id'); ?></th>
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
			<td><?= $tipo['unidade_id']; ?></td>
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
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Viatico', ['controller' => 'viaticos', 'action' => 'add', 'estado_id' => $estado['Estado']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Viaticos'); ?></h3>
            <?php if (!empty($estado['Viatico'])): ?>
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
                	<?php foreach ($estado['Viatico'] as $viatico): ?>
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
