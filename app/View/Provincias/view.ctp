<?php 
/**
 * @var $this View
 */
?><div class="row provincias view">
    <div class="col-md-12">
        <h2><?= $provincia['Provincia']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($provincia['Provincia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($provincia['Provincia']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Codigo'); ?></dt>
		<dd>
			<?= h($provincia['Provincia']['codigo31662']); ?>
			&nbsp;
		</dd>

            </dl>
            <dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($provincia['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $provincia['Estado']['id'])); ?>
					&nbsp;
				</dd>
                <dt>Created</dt>
                    <dd><?= h($provincia['Provincia']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($provincia['Provincia']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Provincia'), array('action' => 'edit', $provincia['Provincia']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Provincia'), array('action' => 'eliminar', $provincia['Provincia']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $provincia['Provincia']['id'])); ?>
		<?= $this->Html->link(__('Listado de Provincias'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Provincia'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Localidad', ['controller' => 'localidades', 'action' => 'add', 'provincia_id' => $provincia['Provincia']['id']], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
            <h3><?= __('Localidades'); ?></h3>
            <?php if (!empty($provincia['Localidade'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('CP'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('Estado'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($provincia['Localidade'] as $localidade): ?>
		<tr>
			<td><?= $localidade['id']; ?></td>
			<td><?= $localidade['nombre']; ?></td>
			<td><?= $localidade['codigopostal']; ?></td>
			<td><?= $localidade['created']; ?></td>
			<td><?= $localidade['modified']; ?></td>
			<td><?= $localidade['Estado']['nombre']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'localidades', 'action' => 'view', $localidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'localidades', 'action' => 'edit', $localidade['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'localidades', 'action' => 'eliminar', $localidade['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $localidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
          
    </div>
</div>
