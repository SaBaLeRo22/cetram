<?php 
/**
 * @var $this View
 */
?><div class="row opciones view">
    <div class="col-md-12">
        <h2><?= $opcione['Opcione']['opcion'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($opcione['Opcione']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Pregunta'); ?></dt>
		<dd>
			<?= $this->Html->link($opcione['Pregunta']['pregunta'], array('controller' => 'preguntas', 'action' => 'view', $opcione['Pregunta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Opcion'); ?></dt>
		<dd>
			<?= h($opcione['Opcione']['opcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Funcion'); ?></dt>
		<dd>
			<?= h($opcione['Opcione']['funcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($opcione['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $opcione['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($opcione['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $opcione['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($opcione['Opcione']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($opcione['Opcione']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($opcione['Opcione']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($opcione['Opcione']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Opcione'), array('action' => 'edit', $opcione['Opcione']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Opcione'), array('action' => 'delete', $opcione['Opcione']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $opcione['Opcione']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Opciones'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Opcione'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
