<?php 
/**
 * @var $this View
 */
?><div class="row alertas form">
    <div class="col-md-9">
                <h2><?= __('Editar Alerta') ?></h2>
                <hr/>

        <?= $this->Form->create('Alerta', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('indicadore_id', 'Indicador', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('indicadore_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('evento_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('evento_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('menor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('menor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('minimo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('minimo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('maximo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('maximo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mayor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mayor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('notificar', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('notificar'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('mensaje', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('mensaje', array('type' => 'textarea')); ?>
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Alerta.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Alerta.nombre'))); ?>                                <?= $this->Html->link(__('Listado de Alertas'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Indicador</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Indicadores'), array('controller' => 'indicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Indicador'), array('controller' => 'indicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Evento</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Eventos'), array('controller' => 'eventos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Evento'), array('controller' => 'eventos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

        </div>
    </div>
</div>

