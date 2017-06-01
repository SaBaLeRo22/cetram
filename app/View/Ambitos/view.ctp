<?php 
/**
 * @var $this View
 */
?><div class="row ambitos view">
    <div class="col-md-12">
        <h2><?= $ambito['Ambito']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($ambito['Ambito']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($ambito['Ambito']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($ambito['Ambito']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($ambito['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $ambito['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($ambito['Ambito']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($ambito['Ambito']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($ambito['Ambito']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($ambito['Ambito']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Ambito'), array('action' => 'edit', $ambito['Ambito']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Ambito'), array('action' => 'delete', $ambito['Ambito']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $ambito['Ambito']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Ambitos'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
                <div class="related">
            <div class="actions">
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Coeficiente', ['controller' => 'coeficientes', 'action' => 'add', 'ambito_id' => $ambito['Ambito']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Coeficientes'); ?></h3>
            <?php if (!empty($ambito['Coeficiente'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Ambito Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($ambito['Coeficiente'] as $coeficiente): ?>
		<tr>
			<td><?= $coeficiente['id']; ?></td>
			<td><?= $coeficiente['nombre']; ?></td>
			<td><?= $coeficiente['descripcion']; ?></td>
			<td><?= $coeficiente['minimo']; ?></td>
			<td><?= $coeficiente['maximo']; ?></td>
			<td><?= $coeficiente['ambito_id']; ?></td>
			<td><?= $coeficiente['estado_id']; ?></td>
			<td><?= $coeficiente['created']; ?></td>
			<td><?= $coeficiente['modified']; ?></td>
			<td><?= $coeficiente['user_created']; ?></td>
			<td><?= $coeficiente['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'coeficientes', 'action' => 'view', $coeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'coeficientes', 'action' => 'edit', $coeficiente['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'coeficientes', 'action' => 'delete', $coeficiente['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $coeficiente['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Indicadore', ['controller' => 'indicadores', 'action' => 'add', 'ambito_id' => $ambito['Ambito']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Indicadores'); ?></h3>
            <?php if (!empty($ambito['Indicadore'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Calculo'); ?></th>
		<th><?= __('Minimo'); ?></th>
		<th><?= __('Maximo'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Ambito Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($ambito['Indicadore'] as $indicadore): ?>
		<tr>
			<td><?= $indicadore['id']; ?></td>
			<td><?= $indicadore['nombre']; ?></td>
			<td><?= $indicadore['descripcion']; ?></td>
			<td><?= $indicadore['calculo']; ?></td>
			<td><?= $indicadore['minimo']; ?></td>
			<td><?= $indicadore['maximo']; ?></td>
			<td><?= $indicadore['unidade_id']; ?></td>
			<td><?= $indicadore['ambito_id']; ?></td>
			<td><?= $indicadore['estado_id']; ?></td>
			<td><?= $indicadore['created']; ?></td>
			<td><?= $indicadore['modified']; ?></td>
			<td><?= $indicadore['user_created']; ?></td>
			<td><?= $indicadore['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'indicadores', 'action' => 'view', $indicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'indicadores', 'action' => 'edit', $indicadore['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'indicadores', 'action' => 'delete', $indicadore['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $indicadore['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Parametro', ['controller' => 'parametros', 'action' => 'add', 'ambito_id' => $ambito['Ambito']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Parametros'); ?></h3>
            <?php if (!empty($ambito['Parametro'])): ?>
            <div class="table-responsive">
            <table class="table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    		<th><?= __('Id'); ?></th>
		<th><?= __('Nombre'); ?></th>
		<th><?= __('Descripcion'); ?></th>
		<th><?= __('Valor'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Tipo Id'); ?></th>
		<th><?= __('Ambito Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($ambito['Parametro'] as $parametro): ?>
		<tr>
			<td><?= $parametro['id']; ?></td>
			<td><?= $parametro['nombre']; ?></td>
			<td><?= $parametro['descripcion']; ?></td>
			<td><?= $parametro['valor']; ?></td>
			<td><?= $parametro['unidade_id']; ?></td>
			<td><?= $parametro['tipo_id']; ?></td>
			<td><?= $parametro['ambito_id']; ?></td>
			<td><?= $parametro['estado_id']; ?></td>
			<td><?= $parametro['created']; ?></td>
			<td><?= $parametro['modified']; ?></td>
			<td><?= $parametro['user_created']; ?></td>
			<td><?= $parametro['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'parametros', 'action' => 'view', $parametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'parametros', 'action' => 'edit', $parametro['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'parametros', 'action' => 'delete', $parametro['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $parametro['id'])); ?>
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
                <?= $this->Html->link( '<i class="fa fa-plus fa-fw"></i> Agregar Pregunta', ['controller' => 'preguntas', 'action' => 'add', 'ambito_id' => $ambito['Ambito']['id']], ['class' => 'btn btn-sm btn-info']); ?> 
            </div>
            <h3><?= __('Preguntas'); ?></h3>
            <?php if (!empty($ambito['Pregunta'])): ?>
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
		<th><?= __('Multiplicadore Id'); ?></th>
		<th><?= __('Agrupamiento Id'); ?></th>
		<th><?= __('Opciones'); ?></th>
		<th><?= __('Unidade Id'); ?></th>
		<th><?= __('Titulo'); ?></th>
		<th><?= __('Ayuda'); ?></th>
		<th><?= __('Tipo'); ?></th>
		<th><?= __('Ambito Id'); ?></th>
		<th><?= __('Estado Id'); ?></th>
		<th><?= __('Created'); ?></th>
		<th><?= __('Modified'); ?></th>
		<th><?= __('User Created'); ?></th>
		<th><?= __('User Modified'); ?></th>
                    <th class="actions"><?= __('Acciones'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($ambito['Pregunta'] as $pregunta): ?>
		<tr>
			<td><?= $pregunta['id']; ?></td>
			<td><?= $pregunta['pregunta']; ?></td>
			<td><?= $pregunta['descripcion']; ?></td>
			<td><?= $pregunta['orden']; ?></td>
			<td><?= $pregunta['minimo']; ?></td>
			<td><?= $pregunta['maximo']; ?></td>
			<td><?= $pregunta['multiplicadore_id']; ?></td>
			<td><?= $pregunta['agrupamiento_id']; ?></td>
			<td><?= $pregunta['opciones']; ?></td>
			<td><?= $pregunta['unidade_id']; ?></td>
			<td><?= $pregunta['titulo']; ?></td>
			<td><?= $pregunta['ayuda']; ?></td>
			<td><?= $pregunta['tipo']; ?></td>
			<td><?= $pregunta['ambito_id']; ?></td>
			<td><?= $pregunta['estado_id']; ?></td>
			<td><?= $pregunta['created']; ?></td>
			<td><?= $pregunta['modified']; ?></td>
			<td><?= $pregunta['user_created']; ?></td>
			<td><?= $pregunta['user_modified']; ?></td>
			<td class="actions">
				<?= $this->Html->link(__('Ver'), array('controller' => 'preguntas', 'action' => 'view', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Html->link(__('Editar'), array('controller' => 'preguntas', 'action' => 'edit', $pregunta['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?= $this->Form->postLink(__('Eliminar'), array('controller' => 'preguntas', 'action' => 'delete', $pregunta['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $pregunta['id'])); ?>
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
