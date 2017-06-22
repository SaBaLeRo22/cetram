<?php 
/**
 * @var $this View
 */
?><div class="row factores view">
    <div class="col-md-12">
        <h2><?= $factore['Factore']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($factore['Factore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($factore['Factore']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($factore['Factore']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Antiguedad Maxima'); ?></dt>
		<dd>
			<?= h($factore['Factore']['antiguedad_maxima']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor Residual'); ?></dt>
		<dd>
			<?= h($factore['Factore']['valor_residual']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Porcentaje Amortizar'); ?></dt>
		<dd>
			<?= h($factore['Factore']['porcentaje_amortizar']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($factore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $factore['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($factore['Factore']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($factore['Factore']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($factore['Factore']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($factore['Factore']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Factore'), array('action' => 'edit', $factore['Factore']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Factore'), array('action' => 'delete', $factore['Factore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $factore['Factore']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Factores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Factore'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
		<div class="related">
			<h3><?= __('Factores'); ?></h3>
			<?php if (!empty($tablas)): ?>
			<div class="table-responsive">
				<table class="table" cellpadding="0" cellspacing="0">
					<thead>
					<tr>
						<th><?= __('Fase'); ?></th>
						<th><?= __('Antig&uuml;edad'); ?></th>
						<th><?= __('Coef. Depreciaci&oacute;n'); ?></th>
						<th><?= __('% A Deducir &sup1;'); ?></th>
						<th><?= __('Factor Anual de Remuneraci&oacute;n'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($tablas as $tabla): ?>
					<tr>
						<td><?= $tabla['fase']; ?></td>
						<td><?= $tabla['antiguedad']; ?></td>
						<td><?= $tabla['depreciacion']; ?></td>
						<td><?= $tabla['deducir']; ?></td>
						<td><?= $tabla['remuneracion']; ?></td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php endif; ?>

		</div>
		<hr/>
		<h4><?= __('Notas:'); ?></h4>
		<p>&sup1; Este valor debe multiplicarse por la tasa nominal anual (TNA) para obtener el "Factor Anual de Remuneraci&oacute;n" correspondiente.</p>
		<hr/>
    </div>
</div>
