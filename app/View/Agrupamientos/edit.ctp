<?php 
/**
 * @var $this View
 */
?><div class="row agrupamientos form">
    <div class="col-md-9">
                <h2><?= __('Editar Agrupamiento') ?></h2>
                <hr/>

        <?= $this->Form->create('Agrupamiento', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('orden', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('orden'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('estado_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('estado_id'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Agrupamiento.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Agrupamiento.nombre'))); ?>                                <?= $this->Html->link(__('Listado de Agrupamientos'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>

            <h4 class="text-muted">Pregunta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Preguntas'), array('controller' => 'preguntas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Pregunta'), array('controller' => 'preguntas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

