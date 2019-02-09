<?php 
/**
 * @var $this View
 */
?><div class="row respuestaPasajeros view">
    <div class="col-md-12">
        <h2><?= $respuestaPasajero['RespuestaPasajero']['tarifa'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
				<?= $this->Html->link(__('Listado de Respuesta Pasajeros'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Consulta'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPasajero['Consulta']['id'], array('controller' => 'consultas', 'action' => 'resultado', $respuestaPasajero['Consulta']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Tarifa'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['tarifa']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Sube'); ?></dt>
				<dd>
					<?php if ($respuestaPasajero['RespuestaPasajero']['sube']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>
					&nbsp;
				</dd>
				<dt><?= __('Base'); ?></dt>
				<dd>
					<?php if ($respuestaPasajero['RespuestaPasajero']['base']=='1'): ?>SI<?php else: ?>NO<?php endif; ?>
					&nbsp;
				</dd>
				<dt><?= __('Costo'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['costo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Semestre1'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['semestre1']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Semestre2'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['semestre2']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes01'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes01']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes02'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes02']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes03'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes03']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes04'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes04']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes05'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes05']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes06'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes06']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes07'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes07']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes08'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes08']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes09'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes09']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes10'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes10']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes11'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes11']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mes12'); ?></dt>
				<dd>
					<?= h($respuestaPasajero['RespuestaPasajero']['mes12']); ?>
					&nbsp;
				</dd>
			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($respuestaPasajero['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $respuestaPasajero['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaPasajero['RespuestaPasajero']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($respuestaPasajero['RespuestaPasajero']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($respuestaPasajero['RespuestaPasajero']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($respuestaPasajero['RespuestaPasajero']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>
		<hr/>
    </div>
</div>
