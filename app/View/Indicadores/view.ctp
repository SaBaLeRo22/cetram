<?php 
/**
 * @var $this View
 */
?><div class="row indicadores view">
    <div class="col-md-12">
        <h2><?= $indicadore['Indicadore']['nombre'] ?></h2>
        <hr/>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <dl class="dl-horizontal">
                		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Nombre'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Descripcion'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Calculo'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['calculo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Minimo'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['minimo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Maximo'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['maximo']); ?>
			&nbsp;
		</dd>
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($indicadore['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $indicadore['Unidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Ambito'); ?></dt>
		<dd>
			<?= $this->Html->link($indicadore['Ambito']['nombre'], array('controller' => 'ambitos', 'action' => 'view', $indicadore['Ambito']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('Estado'); ?></dt>
		<dd>
			<?= $this->Html->link($indicadore['Estado']['nombre'], array('controller' => 'estados', 'action' => 'view', $indicadore['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Created'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['user_created']); ?>
			&nbsp;
		</dd>
		<dt><?= __('User Modified'); ?></dt>
		<dd>
			<?= h($indicadore['Indicadore']['user_modified']); ?>
			&nbsp;
		</dd>
            </dl>
            <dl class="dl-horizontal text-muted">
                <dt>Created</dt>
                    <dd><?= h($indicadore['Indicadore']['created']); ?>&nbsp;</dd>
                <dt>Modified</dt>
                    <dd><?= h($indicadore['Indicadore']['modified']); ?>&nbsp;</dd>
                            </dl>
        </div>
        <hr/>
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>

            <div class="list-group">
                                		<?= $this->Html->link(__('Editar Indicadore'), array('action' => 'edit', $indicadore['Indicadore']['id']), array('class' => 'list-group-item')); ?> 
		<?= $this->Form->postLink(__('Eliminar Indicadore'), array('action' => 'delete', $indicadore['Indicadore']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $indicadore['Indicadore']['id'])); ?> 
		<?= $this->Html->link(__('Listado de Indicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Indicadore'), array('action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
    <div class="col-md-8">
          
    </div>
</div>
