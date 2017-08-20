<?php 
/**
 * @var $this View
 */
?><div class="row alertas view">
    <div class="col-md-12">
        <h2><?= $alerta['Alerta']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Indicadore'); ?></dt>
		<dd>
			<?= $this->Html->link($alerta['Indicadore']['nombre'], array('controller' => 'indicadores', 'action' => 'view', $alerta['Indicadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Evento'); ?></dt>
		<dd>
			<?= $this->Html->link($alerta['Evento']['nombre'], array('controller' => 'eventos', 'action' => 'view', $alerta['Evento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Menor'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['menor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Mayor'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['mayor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Notificar'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['notificar']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Mensaje'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['mensaje']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($alerta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $alerta['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($alerta['Alerta']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($alerta['Alerta']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($alerta['Alerta']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Alerta'), array('action' => 'edit', $alerta['Alerta']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Alerta'), array('action' => 'delete', $alerta['Alerta']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $alerta['Alerta']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Alertas'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Alerta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Respuesta Indicadore', ['controller' => 'respuesta_indicadores', 'action' => 'add', 'alerta_id' => $alerta['Alerta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Respuesta Indicadores'); ?></h3>
            <?php if (!empty($alerta['RespuestaIndicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Consulta Id'); ?></th>
		<th><?= __('Indicadore Id'); ?></th>
		<th><?= __('Alerta Id'); ?></th>
		<th><?= __('Evento Id'); ?></th>
		<th><?= __('Indicador'); ?></th>
		<th><?= __('Alerta'); ?></th>
		<th><?= __('Notificar'); ?></th>
		<th><?= __('Mensaje'); ?></th>
		<th><?= __('Evento'); ?></th>
		<th><?= __('Color'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Menor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Mayor'); ?></th>
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
                	<?php foreach ($alerta['RespuestaIndicadore'] as $respuestaIndicadore): ?>
		<tr>
			<td><?= $respuestaIndicadore['id']; ?></td>
			<td><?= $respuestaIndicadore['consulta_id']; ?></td>
			<td><?= $respuestaIndicadore['indicadore_id']; ?></td>
			<td><?= $respuestaIndicadore['alerta_id']; ?></td>
			<td><?= $respuestaIndicadore['evento_id']; ?></td>
			<td><?= $respuestaIndicadore['indicador']; ?></td>
			<td><?= $respuestaIndicadore['alerta']; ?></td>
			<td><?= $respuestaIndicadore['notificar']; ?></td>
			<td><?= $respuestaIndicadore['mensaje']; ?></td>
			<td><?= $respuestaIndicadore['evento']; ?></td>
			<td><?= $respuestaIndicadore['color']; ?></td>
			<td><?= $respuestaIndicadore['valor']; ?></td>
			<td><?= $respuestaIndicadore['menor']; ?></td>
			<td><?= $respuestaIndicadore['minimo']; ?></td>
			<td><?= $respuestaIndicadore['maximo']; ?></td>
			<td><?= $respuestaIndicadore['mayor']; ?></td>
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
          
    </div>
</div>
