<?php 
/**
 * @var $this View
 */
?><div class="row provincias form">
    <div class="col-md-9">
                <h2><?= __('Editar Provincia') ?></h2>
                <hr/>

        <?= $this->Form->create('Provincia', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('codigo31662', 'Codigo', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('codigo31662'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Provincia.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Provincia.nombre'))); ?>                                <?= $this->Html->link(__('Listado de Provincias'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>

            <h4 class="text-muted">Localidad</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Localidades'), array('controller' => 'localidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Localidad'), array('controller' => 'localidades', 'action' => 'add'), array('class' => 'list-group-item')); ?>
 
            </div>
        </div>
    </div>
</div>

