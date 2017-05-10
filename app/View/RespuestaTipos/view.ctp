<?php 
/**
 * @var $this View
 */
?><div class="row respuestaTipos view">
    <div class="col-md-12">
        <h2><?= $respuestaTipo['RespuestaTipo']['valor'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaTipo['Consulta']['tarifa'], array('controller' => 'consultas', 'action' => 'view', $respuestaTipo['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Tipo'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaTipo['Tipo']['nombre'], array('controller' => 'tipos', 'action' => 'view', $respuestaTipo['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Tipo'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Valor'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['incidencia_valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Minimo'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['incidencia_minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Incidencia Maximo'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['incidencia_maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaTipo['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaTipo['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidad'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['unidad']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaTipo['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaTipo['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaTipo['RespuestaTipo']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaTipo['RespuestaTipo']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaTipo['RespuestaTipo']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Tipo'), array('action' => 'edit', $respuestaTipo['RespuestaTipo']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Tipo'), array('action' => 'delete', $respuestaTipo['RespuestaTipo']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaTipo['RespuestaTipo']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Tipos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Tipo'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
