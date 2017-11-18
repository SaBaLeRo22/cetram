<?php 
/**
 * @var $this View
 */
?><div class="row coeficientes view">
    <div class="col-md-12">
        <h2><?= $coeficiente['Coeficiente']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($coeficiente['Coeficiente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($coeficiente['Coeficiente']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($coeficiente['Coeficiente']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($coeficiente['Coeficiente']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($coeficiente['Coeficiente']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ambito'); ?></dt>
		<dd>
			<?= $this->Html->link($coeficiente['Ambito']['nombre'], array('controller' => 'ambitos', 'action' => 'view', $coeficiente['Ambito']['id'])); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($coeficiente['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $coeficiente['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($coeficiente['Coeficiente']['user_created'])); ?>
					&nbsp;
				</dd>
                <dt>Created</dt>
                    <dd><?= h($coeficiente['Coeficiente']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($coeficiente['Coeficiente']['user_modified'])); ?>
					&nbsp;
				</dd>
                <dt>Modified</dt>
                    <dd><?= h($coeficiente['Coeficiente']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Coeficiente'), array('action' => 'edit', $coeficiente['Coeficiente']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Coeficiente'), array('action' => 'eliminar', $coeficiente['Coeficiente']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $coeficiente['Coeficiente']['id'])); ?>
		<?= $this->Html->link(__('Listado de Coeficientes'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Coeficiente'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Intervencion', ['controller' => 'intervenciones', 'action' => 'add', 'coeficiente_id' => $coeficiente['Coeficiente']['id']], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
            <h3><?= __('Intervenciones'); ?></h3>
            <?php if (!empty($coeficiente['Intervencione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Item'); ?></th>
		<th><?= __('Estado'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($coeficiente['Intervencione'] as $intervencione): ?>
		<tr>
			<td><?= $intervencione['id']; ?></td>
			<td><?= $intervencione['Item']['nombre'] ; ?></td>
			<td><?= $intervencione['Estado']['nombre']; ?></td>
			<td><?= $intervencione['created']; ?></td>
			<td><?= $intervencione['modified']; ?></td>

			<td><?= $this->Authake->getUsuario($intervencione['user_created']); ?></td>
			<td><?= $this->Authake->getUsuario($intervencione['user_modified']); ?></td>

			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'intervenciones', 'action' => 'view', $intervencione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'intervenciones', 'action' => 'edit', $intervencione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'intervenciones', 'action' => 'eliminar', $intervencione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $intervencione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php endif; ?>

        </div>
        <hr/>
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Matriz', ['controller' => 'matrices', 'action' => 'add', 'coeficiente_id' => $coeficiente['Coeficiente']['id']], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
            <h3><?= __('Matrices'); ?></h3>
            <?php if (!empty($coeficiente['Matrix'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Multiplicador'); ?></th>
		<th><?= __('Peso'); ?></th>
		<th><?= __('Estado'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($coeficiente['Matrix'] as $matrix): ?>
		<tr>
			<td><?= $matrix['id']; ?></td>
			<td><?= $matrix['Multiplicadore']['nombre'] ; ?></td>
			<td><?= $matrix['peso']; ?></td>
			<td><?= $matrix['Estado']['nombre'] ?></td>
			<td><?= $matrix['created']; ?></td>
			<td><?= $matrix['modified']; ?></td>

			<td><?= $this->Authake->getUsuario($matrix['user_created']); ?></td>
			<td><?= $this->Authake->getUsuario($matrix['user_modified']); ?></td>

			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'matrices', 'action' => 'view', $matrix['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'matrices', 'action' => 'edit', $matrix['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'matrices', 'action' => 'eliminar', $matrix['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $matrix['id'])); ?>
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
