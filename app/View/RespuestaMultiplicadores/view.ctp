<?php 
/**
 * @var $this View
 */
?><div class="row respuestaMultiplicadores view">
    <div class="col-md-12">
        <h2><?= $respuestaMultiplicadore['RespuestaMultiplicadore']['id'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Consulta'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaMultiplicadore['Consulta']['tarifa'], array('controller' => 'consultas', 'action' => 'view', $respuestaMultiplicadore['Consulta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Multiplicadore'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaMultiplicadore['Multiplicadore']['nombre'], array('controller' => 'multiplicadores', 'action' => 'view', $respuestaMultiplicadore['Multiplicadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Multiplicador'); ?></dt>
		<dd>
			<?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['multiplicador']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ponderador'); ?></dt>
		<dd>
			<?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['ponderador']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($respuestaMultiplicadore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaMultiplicadore['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($respuestaMultiplicadore['RespuestaMultiplicadore']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Respuesta Multiplicadore'), array('action' => 'edit', $respuestaMultiplicadore['RespuestaMultiplicadore']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Respuesta Multiplicadore'), array('action' => 'delete', $respuestaMultiplicadore['RespuestaMultiplicadore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $respuestaMultiplicadore['RespuestaMultiplicadore']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Respuesta Multiplicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Respuesta Multiplicadore'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
