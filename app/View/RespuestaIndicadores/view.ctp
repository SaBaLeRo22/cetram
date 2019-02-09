<?php 
/**
 * @var $this View
 */
?><div class="row respuestaIndicadores view">
    <div class="col-md-12">
        <h2><?= $respuestaIndicadore['RespuestaIndicadore']['indicador'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
					<?= $this->Html->link(__('Listado de Respuesta Indicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Consulta'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Consulta']['costo'], array('controller' => 'consultas', 'action' => 'resultado', $respuestaIndicadore['Consulta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Indicador Original'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['indicador']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Indicador Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Indicadore']['nombre'], array('controller' => 'indicadores', 'action' => 'view', $respuestaIndicadore['Indicadore']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Valor'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['valor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Alerta Original'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['alerta']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Alerta Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Alerta']['nombre'], array('controller' => 'alertas', 'action' => 'view', $respuestaIndicadore['Alerta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Evento Original'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['evento']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Evento Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Evento']['nombre'], array('controller' => 'eventos', 'action' => 'view', $respuestaIndicadore['Evento']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mensaje'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['mensaje']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Color'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['color']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Menor'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['menor']); ?>
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
				<dt><?= __('Mayor'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['mayor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaIndicadore['Unidade']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Original'); ?></dt>
				<dd>
					<?= h($respuestaIndicadore['RespuestaIndicadore']['unidad']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Notificar'); ?></dt>
				<dd>
					<?php if ($respuestaIndicadore['RespuestaIndicadore']['notificar']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaIndicadore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaIndicadore['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaIndicadore['RespuestaIndicadore']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($respuestaIndicadore['RespuestaIndicadore']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaIndicadore['RespuestaIndicadore']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($respuestaIndicadore['RespuestaIndicadore']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
    </div>
</div>
