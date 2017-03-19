<?php 
/**
 * @var $this View
 */
?><div class="row participaciones view">
    <div class="col-md-12">
        <h2><?= $participacione['Participacione']['id'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($participacione['Participacione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Parametro'); ?></dt>
		<dd>
			<?= $this->Html->link($participacione['Parametro']['nombre'], array('controller' => 'parametros', 'action' => 'view', $participacione['Parametro']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Item'); ?></dt>
		<dd>
			<?= $this->Html->link($participacione['Item']['nombre'], array('controller' => 'items', 'action' => 'view', $participacione['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($participacione['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $participacione['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($participacione['Participacione']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($participacione['Participacione']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($participacione['Participacione']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($participacione['Participacione']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Participacione'), array('action' => 'edit', $participacione['Participacione']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Participacione'), array('action' => 'delete', $participacione['Participacione']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $participacione['Participacione']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Participaciones'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Participacione'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
