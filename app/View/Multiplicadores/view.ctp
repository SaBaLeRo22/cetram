<?php 
/**
 * @var $this View
 */
?><div class="row multiplicadores view">
    <div class="col-md-12">
        <h2><?= $multiplicadore['Multiplicadore']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($multiplicadore['Multiplicadore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($multiplicadore['Multiplicadore']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($multiplicadore['Multiplicadore']['descripcion']); ?>
			&nbsp;
		</dd>



            </dl>
            <dl class="dl-horizontal text-muted">
				<dt><?= __('Estado'); ?></dt>
				<dd>
					<?= $this->Html->link($multiplicadore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $multiplicadore['Estado']['id'])); ?>
					&nbsp;
				</dd>
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($multiplicadore['Multiplicadore']['user_created']); ?>
					&nbsp;
				</dd>
                <dt>Created</dt>
                    <dd><?= h($multiplicadore['Multiplicadore']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($multiplicadore['Multiplicadore']['user_modified']); ?>
					&nbsp;
				</dd>
                <dt>Modified</dt>
                    <dd><?= h($multiplicadore['Multiplicadore']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
        <?= $this->Html->link(__('Editar Multiplicador'), array('action' => 'edit', $multiplicadore['Multiplicadore']['id']), array('class' => 'list-group-item')); ?>
		<?= $this->Form->postLink(__('Eliminar Multiplicador'), array('action' => 'eliminar', $multiplicadore['Multiplicadore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $multiplicadore['Multiplicadore']['id'])); ?>
		<?= $this->Html->link(__('Listado de Multiplicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Multiplicador'), array('action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Matriz', ['controller' => 'matrices', 'action' => 'add', 'multiplicadore_id' => $multiplicadore['Multiplicadore']['id']], ['class' => 'btn btn-sm btn-info']); ?>
            </div>
            <h3><?= __('Matrices'); ?></h3>
            <?php if (!empty($multiplicadore['Matrix'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
        <th><?= __('Id'); ?></th>
		<th><?= __('Coeficiente'); ?></th>
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
                	<?php foreach ($multiplicadore['Matrix'] as $matrix): ?>
		<tr>
			<td><?= $matrix['id']; ?></td>
			<td><?= $matrix['Coeficiente']['nombre']; ?></td>
			<td><?= $matrix['peso']; ?></td>
			<td><?= $matrix['Estado']['nombre']; ?></td>
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
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Pregunta', ['controller' => 'preguntas', 'action' => 'add', 'multiplicadore_id' => $multiplicadore['Multiplicadore']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Preguntas'); ?></h3>
            <?php if (!empty($multiplicadore['Pregunta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
        <th><?= __('Id'); ?></th>
		<th><?= __('Pregunta'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Orden'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Agrupamiento'); ?></th>
		<th><?= __('Unidad'); ?></th>
		<th><?= __('Estado'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($multiplicadore['Pregunta'] as $pregunta): ?>
		<tr>
			<td><?= $pregunta['id']; ?></td>
			<td><?= $pregunta['pregunta']; ?></td>
			<td><?= $pregunta['descripcion']; ?></td>
			<td><?= $pregunta['orden']; ?></td>
			<td><?= $pregunta['minimo']; ?></td>
			<td><?= $pregunta['maximo']; ?></td>
			<td><?= $pregunta['Agrupamiento']['nombre']; ?></td>
			<td><?= $pregunta['Unidade']['nombre']; ?></td>
			<td><?= $pregunta['Estado']['nombre']; ?></td>
			<td><?= $pregunta['created']; ?></td>
			<td><?= $pregunta['modified']; ?></td>
			<td><?= $this->Authake->getUsuario($pregunta['user_created']); ?></td>
			<td><?= $this->Authake->getUsuario($pregunta['user_modified']); ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'preguntas', 'action' => 'view', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'preguntas', 'action' => 'edit', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'preguntas', 'action' => 'eliminar', $pregunta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $pregunta['id'])); ?>
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
