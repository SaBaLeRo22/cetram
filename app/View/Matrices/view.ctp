<?php 
/**
 * @var $this View
 */
?><div class="row matrices view">
    <div class="col-md-12">
        <h2><?= $matrix['Matrix']['id'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($matrix['Matrix']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Coeficiente'); ?></dt>
		<dd>
			<?= $this->Html->link($matrix['Coeficiente']['nombre'], array('controller' => 'coeficientes', 'action' => 'view', $matrix['Coeficiente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Multiplicadore'); ?></dt>
		<dd>
			<?= $this->Html->link($matrix['Multiplicadore']['nombre'], array('controller' => 'multiplicadores', 'action' => 'view', $matrix['Multiplicadore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Peso'); ?></dt>
		<dd>
			<?= h($matrix['Matrix']['peso']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($matrix['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $matrix['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($matrix['Matrix']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($matrix['Matrix']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($matrix['Matrix']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($matrix['Matrix']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Matrix'), array('action' => 'edit', $matrix['Matrix']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Matrix'), array('action' => 'delete', $matrix['Matrix']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $matrix['Matrix']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Matrices'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Matrix'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
