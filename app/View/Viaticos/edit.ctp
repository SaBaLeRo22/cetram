<?php 
/**
 * @var $this View
 */
?><div class="row viaticos form">
    <div class="col-md-9">
                <h2><?= __('Editar Viatico') ?></h2>
                <hr/>

        <?= $this->Form->create('Viatico', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('convenio_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('convenio_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('dieta_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('dieta_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('costo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('costo'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Viatico.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Viatico.costo'))); ?>                                <?= $this->Html->link(__('Listado de Viaticos'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Convenio</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Convenios'), array('controller' => 'convenios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Convenio'), array('controller' => 'convenios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Dieta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Dietas'), array('controller' => 'dietas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Dieta'), array('controller' => 'dietas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

        </div>
    </div>
</div>

