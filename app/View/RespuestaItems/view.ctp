<?php 
/**
 * @var $this View
 */
?><div class="row respuestaItems view">
    <div class="col-md-12">
        <h2><?= $respuestaItem['RespuestaItem']['item'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
		<?= $this->Html->link(__('Listado de Respuesta Items'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($respuestaItem['RespuestaItem']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Consulta'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaItem['Consulta']['id'], array('controller' => 'consultas', 'action' => 'resultado', $respuestaItem['Consulta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Item Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaItem['Item']['nombre'], array('controller' => 'items', 'action' => 'view', $respuestaItem['Item']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Item Original'); ?></dt>
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
				<dt><?= __('Unidad Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaItem['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaItem['Unidade']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Original'); ?></dt>
				<dd>
					<?= h($respuestaItem['RespuestaItem']['unidad']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaItem['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaItem['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaItem['RespuestaItem']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($respuestaItem['RespuestaItem']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaItem['RespuestaItem']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($respuestaItem['RespuestaItem']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
    </div>
</div>
