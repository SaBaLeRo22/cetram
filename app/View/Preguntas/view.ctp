<?php 
/**
 * @var $this View
 */
?><div class="row preguntas view">
    <div class="col-md-12">
        <h2><?= $pregunta['Pregunta']['pregunta'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Pregunta'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['pregunta']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Orden'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['orden']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Multiplicadore'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Multiplicadore']['nombre'], array('controller' => 'multiplicadores', 'action' => 'view', $pregunta['Multiplicadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Agrupamiento'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Agrupamiento']['nombre'], array('controller' => 'agrupamientos', 'action' => 'view', $pregunta['Agrupamiento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Opciones'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['opciones']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $pregunta['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Titulo'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ayuda'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['ayuda']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Tipo'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Step'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['step']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ambito'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Ambito']['nombre'], array('controller' => 'ambitos', 'action' => 'view', $pregunta['Ambito']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $pregunta['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($pregunta['Pregunta']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($pregunta['Pregunta']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($pregunta['Pregunta']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Pregunta'), array('action' => 'edit', $pregunta['Pregunta']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Pregunta'), array('action' => 'delete', $pregunta['Pregunta']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $pregunta['Pregunta']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Preguntas'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Opcione', ['controller' => 'opciones', 'action' => 'add', 'pregunta_id' => $pregunta['Pregunta']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Opciones'); ?></h3>
            <?php if (!empty($pregunta['Opcione'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Pregunta Id'); ?></th>
		<th><?= __('Opcion'); ?></th>
		<th><?= __('Funcion'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($pregunta['Opcione'] as $opcione): ?>
		<tr>
			<td><?= $opcione['id']; ?></td>
			<td><?= $opcione['pregunta_id']; ?></td>
			<td><?= $opcione['opcion']; ?></td>
			<td><?= $opcione['funcion']; ?></td>
			<td><?= $opcione['unidade_id']; ?></td>
			<td><?= $opcione['estado_id']; ?></td>
			<td><?= $opcione['created']; ?></td>
			<td><?= $opcione['modified']; ?></td>
			<td><?= $opcione['user_created']; ?></td>
			<td><?= $opcione['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'opciones', 'action' => 'view', $opcione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'opciones', 'action' => 'edit', $opcione['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'opciones', 'action' => 'delete', $opcione['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $opcione['id'])); ?>
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
