<?php 
/**
 * @var $this View
 */
?><div class="row parametros view">
    <div class="col-md-12">
        <h2><?= $parametro['Parametro']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Valor'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['valor']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($parametro['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $parametro['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Tipo'); ?></dt>
		<dd>
			<?= $this->Html->link($parametro['Tipo']['nombre'], array('controller' => 'tipos', 'action' => 'view', $parametro['Tipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ambito'); ?></dt>
		<dd>
			<?= $this->Html->link($parametro['Ambito']['nombre'], array('controller' => 'ambitos', 'action' => 'view', $parametro['Ambito']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($parametro['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $parametro['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($parametro['Parametro']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($parametro['Parametro']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($parametro['Parametro']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Parametro'), array('action' => 'edit', $parametro['Parametro']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Parametro'), array('action' => 'delete', $parametro['Parametro']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $parametro['Parametro']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Parametros'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Parametro'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Participacione', ['controller' => 'participaciones', 'action' => 'add', 'parametro_id' => $parametro['Parametro']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Participaciones'); ?></h3>
            <?php if (!empty($parametro['Participacione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Parametro Id'); ?></th>
		<th><?= __('Item Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($parametro['Participacione'] as $participacione): ?>
		<tr>
			<td><?= $participacione['id']; ?></td>
			<td><?= $participacione['parametro_id']; ?></td>
			<td><?= $participacione['item_id']; ?></td>
			<td><?= $participacione['estado_id']; ?></td>
			<td><?= $participacione['created']; ?></td>
			<td><?= $participacione['modified']; ?></td>
			<td><?= $participacione['user_created']; ?></td>
			<td><?= $participacione['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'participaciones', 'action' => 'view', $participacione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'participaciones', 'action' => 'edit', $participacione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'participaciones', 'action' => 'delete', $participacione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $participacione['id'])); ?>
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
