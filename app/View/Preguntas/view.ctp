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
		<dt><?= __('Unidade'); ?></dt>
		<dd>
			<?= $this->Html->link($pregunta['Unidade']['nombre'], array('controller' => 'unidades', 'action' => 'view', $pregunta['Unidade']['id'])); ?>
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
          
    </div>
</div>
