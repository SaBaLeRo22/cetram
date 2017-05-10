<?php 
/**
 * @var $this View
 */
?><div class="row respuestaItems view">
    <div class="col-md-12">
        <h2><?= $respuestaItem['RespuestaItem']['valor'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaItem['Consulta']['tarifa'], array('controller' => 'consultas', 'action' => 'view', $respuestaItem['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Item'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaItem['Item']['nombre'], array('controller' => 'items', 'action' => 'view', $respuestaItem['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Item'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['item']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Valor'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['incidencia_valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Minimo'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['incidencia_minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Maximo'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['incidencia_maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaItem['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaItem['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidad'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['unidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaItem['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaItem['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaItem['RespuestaItem']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaItem['RespuestaItem']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaItem['RespuestaItem']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Item'), array('action' => 'edit', $respuestaItem['RespuestaItem']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Item'), array('action' => 'delete', $respuestaItem['RespuestaItem']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaItem['RespuestaItem']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Items'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Item'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
