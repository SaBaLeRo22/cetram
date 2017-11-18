<?php 
/**
 * @var $this View
 */
?><div class="row alertas view">
    <div class="col-md-12">
        <h2><?= $alerta['Alerta']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">

        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
        <?= $this->Html->link(__('Editar Alerta'), array('action' => 'edit', $alerta['Alerta']['id']), array('class' => 'list-group-item')); ?>
		<?= $this->Form->postLink(__('Eliminar Alerta'), array('action' => 'eliminar', $alerta['Alerta']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $alerta['Alerta']['id'])); ?>
		<?= $this->Html->link(__('Listado de Alertas'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Alerta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">

		<div class="well well-sm">
			<dl class="dl-horizontal">
				<dt><?= __('Id'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['id']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Indicador'); ?></dt>
				<dd>
					<?= $this->Html->link($alerta['Indicadore']['nombre'], array('controller' => 'indicadores', 'action' => 'view', $alerta['Indicadore']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Evento'); ?></dt>
				<dd>
					<?= $this->Html->link($alerta['Evento']['nombre'], array('controller' => 'eventos', 'action' => 'view', $alerta['Evento']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('Nombre'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['nombre']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Menor'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['menor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Minimo'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['minimo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Maximo'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['maximo']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mayor'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['mayor']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Notificar'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['notificar']); ?>
					&nbsp;
				</dd>
				<dt><?= __('Mensaje'); ?></dt>
				<dd>
					<?= h($alerta['Alerta']['mensaje']); ?>
					&nbsp;
				</dd>

			</dl>
			<dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($alerta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $alerta['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($alerta['Alerta']['user_created'])); ?>
					&nbsp;
				</dd>
				<dt>Created</dt>
				<dd><?= h($alerta['Alerta']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($alerta['Alerta']['user_modified'])); ?>
					&nbsp;
				</dd>
				<dt>Modified</dt>
				<dd><?= h($alerta['Alerta']['modified']); ?>&nbsp;</dd>
			</dl>
		</div>

    </div>
</div>
