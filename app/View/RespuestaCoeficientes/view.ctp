<?php 
/**
 * @var $this View
 */
?><div class="row respuestaCoeficientes view">
    <div class="col-md-12">
        <h2><?= $respuestaCoeficiente['RespuestaCoeficiente']['valor'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaCoeficiente['Consulta']['tarifa'], array('controller' => 'consultas', 'action' => 'view', $respuestaCoeficiente['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Coeficiente'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaCoeficiente['Coeficiente']['nombre'], array('controller' => 'coeficientes', 'action' => 'view', $respuestaCoeficiente['Coeficiente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Coeficiente'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['coeficiente']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaCoeficiente['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaCoeficiente['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidad'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['unidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaCoeficiente['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaCoeficiente['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaCoeficiente['RespuestaCoeficiente']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaCoeficiente['RespuestaCoeficiente']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaCoeficiente['RespuestaCoeficiente']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Coeficiente'), array('action' => 'edit', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Coeficiente'), array('action' => 'delete', $respuestaCoeficiente['RespuestaCoeficiente']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaCoeficiente['RespuestaCoeficiente']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Coeficientes'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Coeficiente'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
