<?php 
/**
 * @var $this View
 */
?><div class="row unidades view">
    <div class="col-md-12">
        <h2><?= $unidade['Unidade']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($unidade['Unidade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($unidade['Unidade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($unidade['Unidade']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($unidade['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $unidade['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($unidade['Unidade']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($unidade['Unidade']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($unidade['Unidade']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($unidade['Unidade']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Unidade'), array('action' => 'edit', $unidade['Unidade']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Unidade'), array('action' => 'delete', $unidade['Unidade']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $unidade['Unidade']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Unidades'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Consulta', ['controller' => 'consultas', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Consultas'); ?></h3>
            <?php if (!empty($unidade['Consulta'])): ?>
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
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($unidade['Consulta'] as $consulta): ?>
		<tr>
			<td><?= $consulta['id']; ?></td>
			<td><?= $consulta['costo']; ?></td>
			<td><?= $consulta['tarifa']; ?></td>
			<td><?= $consulta['subsidio']; ?></td>
			<td><?= $consulta['unidade_id']; ?></td>
			<td><?= $consulta['observaciones']; ?></td>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Indicadore', ['controller' => 'indicadores', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Indicadores'); ?></h3>
            <?php if (!empty($unidade['Indicadore'])): ?>
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
                	<?php foreach ($unidade['Indicadore'] as $indicadore): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Item', ['controller' => 'items', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Items'); ?></h3>
            <?php if (!empty($unidade['Item'])): ?>
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
                	<?php foreach ($unidade['Item'] as $item): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Opcione', ['controller' => 'opciones', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Opciones'); ?></h3>
            <?php if (!empty($unidade['Opcione'])): ?>
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
                	<?php foreach ($unidade['Opcione'] as $opcione): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Parametro', ['controller' => 'parametros', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Parametros'); ?></h3>
            <?php if (!empty($unidade['Parametro'])): ?>
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
                	<?php foreach ($unidade['Parametro'] as $parametro): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Pregunta', ['controller' => 'preguntas', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Preguntas'); ?></h3>
            <?php if (!empty($unidade['Pregunta'])): ?>
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
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($unidade['Pregunta'] as $pregunta): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Coeficiente', ['controller' => 'respuesta_coeficientes', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Coeficientes'); ?></h3>
            <?php if (!empty($unidade['RespuestaCoeficiente'])): ?>
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
                	<?php foreach ($unidade['RespuestaCoeficiente'] as $respuestaCoeficiente): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Indicadore', ['controller' => 'respuesta_indicadores', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Indicadores'); ?></h3>
            <?php if (!empty($unidade['RespuestaIndicadore'])): ?>
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
                	<?php foreach ($unidade['RespuestaIndicadore'] as $respuestaIndicadore): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Item', ['controller' => 'respuesta_items', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Items'); ?></h3>
            <?php if (!empty($unidade['RespuestaItem'])): ?>
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
                	<?php foreach ($unidade['RespuestaItem'] as $respuestaItem): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Parametro', ['controller' => 'respuesta_parametros', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Parametros'); ?></h3>
            <?php if (!empty($unidade['RespuestaParametro'])): ?>
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
                	<?php foreach ($unidade['RespuestaParametro'] as $respuestaParametro): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Pregunta', ['controller' => 'respuesta_preguntas', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Preguntas'); ?></h3>
            <?php if (!empty($unidade['RespuestaPregunta'])): ?>
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
                	<?php foreach ($unidade['RespuestaPregunta'] as $respuestaPregunta): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Tipo', ['controller' => 'respuesta_tipos', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Tipos'); ?></h3>
            <?php if (!empty($unidade['RespuestaTipo'])): ?>
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
                	<?php foreach ($unidade['RespuestaTipo'] as $respuestaTipo): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Tipo', ['controller' => 'tipos', 'action' => 'add', 'unidade_id' => $unidade['Unidade']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Tipos'); ?></h3>
            <?php if (!empty($unidade['Tipo'])): ?>
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
                	<?php foreach ($unidade['Tipo'] as $tipo): ?>
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
          
    </div>
</div>
