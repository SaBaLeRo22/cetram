<?php 
/**
 * @var $this View
 */
?><div class="row intervenciones view">
    <div class="col-md-12">
        <h2><?= $intervencione['Intervencione']['id'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($intervencione['Intervencione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Coeficiente'); ?></dt>
		<dd>
			<?= $this->Html->link($intervencione['Coeficiente']['nombre'], array('controller' => 'coeficientes', 'action' => 'view', $intervencione['Coeficiente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Item'); ?></dt>
		<dd>
			<?= $this->Html->link($intervencione['Item']['nombre'], array('controller' => 'items', 'action' => 'view', $intervencione['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($intervencione['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $intervencione['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($intervencione['Intervencione']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($intervencione['Intervencione']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($intervencione['Intervencione']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($intervencione['Intervencione']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Intervencione'), array('action' => 'edit', $intervencione['Intervencione']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Intervencione'), array('action' => 'delete', $intervencione['Intervencione']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $intervencione['Intervencione']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Intervenciones'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Intervencione'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
