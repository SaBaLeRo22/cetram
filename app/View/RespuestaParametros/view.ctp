<?php 
/**
 * @var $this View
 */
?><div class="row respuestaParametros view">
    <div class="col-md-12">
        <h2><?= $respuestaParametro['RespuestaParametro']['parametro'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
				<?= $this->Html->link(__('Listado de Respuesta Parametros'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Consulta'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaParametro['Consulta']['id'], array('controller' => 'consultas', 'action' => 'resultado', $respuestaParametro['Consulta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Pregunta Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaParametro['Parametro']['nombre'], array('controller' => 'parametros', 'action' => 'view', $respuestaParametro['Parametro']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Parametro Original'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['parametro']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Valor'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['valor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaParametro['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaParametro['Unidade']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Original'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['unidad']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Editado'); ?></dt>
				<dd>
					<?php if ($respuestaParametro['RespuestaParametro']['editado']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>
					&nbsp;
				</dd>
				<dt><?= __('Minimo'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['minimo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Maximo'); ?></dt>
				<dd>
					<?= h($respuestaParametro['RespuestaParametro']['maximo']); ?>
					&nbsp;
				</dd>
			</dl>
				<dl class="dl-horizontal text-muted">
					<dt><?= __('Estado'); ?></dt>
					<dd>
						<?= $this->Html->link($respuestaParametro['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaParametro['Estado']['id'])); ?>
						&nbsp;
					</dd>
					<dt><?= __('User Created'); ?></dt>
					<dd>
						<?= h($this->Authake->getUsuario($respuestaParametro['RespuestaParametro']['user_created'])); ?>
						&nbsp;
					</dd>
					<dt>Created</dt>
					<dd><?= h($respuestaParametro['RespuestaParametro']['created']); ?>&nbsp;</dd>
					<dt><?= __('User Modified'); ?></dt>
					<dd>
						<?= h($this->Authake->getUsuario($respuestaParametro['RespuestaParametro']['user_modified'])); ?>
						&nbsp;
					</dd>
					<dt>Modified</dt>
					<dd><?= h($respuestaParametro['RespuestaParametro']['modified']); ?>&nbsp;</dd>
				</dl>
		</div>
		<hr/>
    </div>
</div>
