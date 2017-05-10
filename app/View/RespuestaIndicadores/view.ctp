<?php 
/**
 * @var $this View
 */
?><div class="row respuestaIndicadores view">
    <div class="col-md-12">
        <h2><?= $respuestaIndicadore['RespuestaIndicadore']['valor'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaIndicadore['Consulta']['tarifa'], array('controller' => 'consultas', 'action' => 'view', $respuestaIndicadore['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Indicadore'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaIndicadore['Indicadore']['nombre'], array('controller' => 'indicadores', 'action' => 'view', $respuestaIndicadore['Indicadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Indicador'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['indicador']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Notificar'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['notificar']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaIndicadore['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaIndicadore['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidad'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['unidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaIndicadore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaIndicadore['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaIndicadore['RespuestaIndicadore']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaIndicadore['RespuestaIndicadore']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaIndicadore['RespuestaIndicadore']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Indicadore'), array('action' => 'edit', $respuestaIndicadore['RespuestaIndicadore']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Indicadore'), array('action' => 'delete', $respuestaIndicadore['RespuestaIndicadore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaIndicadore['RespuestaIndicadore']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Indicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Indicadore'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
