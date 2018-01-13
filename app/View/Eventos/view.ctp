<?php 
/**
 * @var $this View
 */
?><div class="row eventos view">
    <div class="col-md-12">
        <h2><?= $evento['Evento']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($evento['Evento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($evento['Evento']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Color'); ?></dt>
		<dd>
			<?= h($evento['Evento']['color']); ?>
			&nbsp;
		</dd>


            </dl>
            <dl class="dl-horizontal text-muted">
				<dt><?= __('User Created'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($evento['Evento']['user_created'])); ?>
					&nbsp;
				</dd>
                <dt>Created</dt>
                    <dd><?= h($evento['Evento']['created']); ?>&nbsp;</dd>
				<dt><?= __('User Modified'); ?></dt>
				<dd>
					<?= h($this->Authake->getUsuario($evento['Evento']['user_modified'])); ?>
					&nbsp;
				</dd>
                <dt>Modified</dt>
                    <dd><?= h($evento['Evento']['modified']); ?>&nbsp;</dd>

                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
				<?= $this->Html->link(__('Listado de Eventos'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Alerta', ['controller' => 'alertas', 'action' => 'add', 'evento_id' => $evento['Evento']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Alertas'); ?></h3>
            <?php if (!empty($evento['Alerta'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
					<th><?= __('Id'); ?></th>
		<th><?= __('Indicadore'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Menor'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Mayor'); ?></th>
		<th><?= __('Notificar'); ?></th>
		<th><?= __('Mensaje'); ?></th>
		<th><?= __('Estado'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($evento['Alerta'] as $alerta): ?>
		<tr>
			<td><?= $alerta['id']; ?></td>
			<td><?= $alerta['Indicadore']['nombre']; ?></td>
			<td><?= $alerta['nombre']; ?></td>
			<td><?= $alerta['menor']; ?></td>
			<td><?= $alerta['minimo']; ?></td>
			<td><?= $alerta['maximo']; ?></td>
			<td><?= $alerta['mayor']; ?></td>
			<td><?= $alerta['notificar']; ?></td>
			<td><?= $alerta['mensaje']; ?></td>
			<td><?= $alerta['Estado']['nombre']; ?></td>
			<td><?= $alerta['created']; ?></td>
			<td><?= $alerta['modified']; ?></td>
			<td><?= $this->Authake->getUsuario($alerta['user_created']); ?></td>
			<td><?= $this->Authake->getUsuario($alerta['user_modified']); ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'alertas', 'action' => 'view', $alerta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'alertas', 'action' => 'edit', $alerta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'alertas', 'action' => 'eliminar', $alerta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $alerta['id'])); ?>
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
