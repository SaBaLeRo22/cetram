<?php 
/**
 * @var $this View
 */
?><div class="row opciones form">
    <div class="col-md-9">
                <h2><?= __('Editar Opcion') ?></h2>
                <hr/>

        <?= $this->Form->create('Opcione', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('pregunta_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('pregunta_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('opcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('opcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('funcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('funcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidade_id', 'Unidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('unidade_id'); ?> 
        </div>

                                        <div class="well well-sm text-right">
            <?= $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar', array('class' => 'btn btn-primary')); ?> 
        </div>
        <?= $this->Form->end(); ?> 
    </div>
    <div class="col-md-3">
        <div class="actions">
            <h3><i class="icon-wrench"></i> <?= __('Acciones'); ?></h3>
            
            <div class="list-group">
                                                <?= $this->Html->link(__('Listado de Opciones'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Preguntas'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Unidad</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidad'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
        </div>
    </div>
</div>

