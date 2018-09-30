<?php 
/**
 * @var $this View
 */
?><div class="row respuestaPreguntas view">
    <div class="col-md-12">
        <h2><?= $respuestaPregunta['RespuestaPregunta']['valor'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
				<?= $this->Html->link(__('Listado de Respuesta Preguntas'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('ID'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Consulta ID'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPregunta['Consulta']['id'], array('controller' => 'consultas', 'action' => 'view', $respuestaPregunta['Consulta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Pregunta Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPregunta['Pregunta']['pregunta'], array('controller' => 'preguntas', 'action' => 'view', $respuestaPregunta['Pregunta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Pregunta Origianal'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['pregunta']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Valor'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['valor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Minimo'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['minimo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Maximo'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['maximo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Actual'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPregunta['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $respuestaPregunta['Unidade']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Unidad Original'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['unidad']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Respuesta'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['respuesta']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Opcion ID'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['opcione_id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Funcion'); ?></dt>
				<dd>
					<?= h($respuestaPregunta['RespuestaPregunta']['funcion']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPregunta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaPregunta['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaPregunta['RespuestaPregunta']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($respuestaPregunta['RespuestaPregunta']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaPregunta['RespuestaPregunta']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($respuestaPregunta['RespuestaPregunta']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
    </div>
</div>
