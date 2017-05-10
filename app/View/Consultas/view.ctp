<?php 
/**
 * @var $this View
 */
?><div class="row consultas view">
    <div class="col-md-12">
        <h2><?= $consulta['Consulta']['tarifa'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Costo'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['costo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Tarifa'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['tarifa']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Subsidio'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['subsidio']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($consulta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $consulta['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($consulta['Consulta']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($consulta['Consulta']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($consulta['Consulta']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Consulta'), array('action' => 'edit', $consulta['Consulta']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Consulta'), array('action' => 'delete', $consulta['Consulta']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $consulta['Consulta']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Consultas'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Consulta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Coeficiente', ['controller' => 'respuesta_coeficientes', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Coeficientes'); ?></h3>
            <?php if (!empty($consulta['RespuestaCoeficiente'])): ?>
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
                	<?php foreach ($consulta['RespuestaCoeficiente'] as $respuestaCoeficiente): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Indicadore', ['controller' => 'respuesta_indicadores', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Indicadores'); ?></h3>
            <?php if (!empty($consulta['RespuestaIndicadore'])): ?>
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
                	<?php foreach ($consulta['RespuestaIndicadore'] as $respuestaIndicadore): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Item', ['controller' => 'respuesta_items', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Items'); ?></h3>
            <?php if (!empty($consulta['RespuestaItem'])): ?>
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
                	<?php foreach ($consulta['RespuestaItem'] as $respuestaItem): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Multiplicadore', ['controller' => 'respuesta_multiplicadores', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Multiplicadores'); ?></h3>
            <?php if (!empty($consulta['RespuestaMultiplicadore'])): ?>
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
                	<?php foreach ($consulta['RespuestaMultiplicadore'] as $respuestaMultiplicadore): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Parametro', ['controller' => 'respuesta_parametros', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Parametros'); ?></h3>
            <?php if (!empty($consulta['RespuestaParametro'])): ?>
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
                	<?php foreach ($consulta['RespuestaParametro'] as $respuestaParametro): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Pregunta', ['controller' => 'respuesta_preguntas', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Preguntas'); ?></h3>
            <?php if (!empty($consulta['RespuestaPregunta'])): ?>
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
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($consulta['RespuestaPregunta'] as $respuestaPregunta): ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Tipo', ['controller' => 'respuesta_tipos', 'action' => 'add', 'consulta_id' => $consulta['Consulta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Tipos'); ?></h3>
            <?php if (!empty($consulta['RespuestaTipo'])): ?>
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
                	<?php foreach ($consulta['RespuestaTipo'] as $respuestaTipo): ?>
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
          
    </div>
</div>
