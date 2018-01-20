<?php 
/**
 * @var $this View
 */
?><div class="row indicadores form">
    <div class="col-md-9">
                <h2><?= __('Editar Indicador') ?></h2>
                <hr/>

        <?= $this->Form->create('Indicadore', array('class' => 'form-horizontal')); ?>
 
                     
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
            <?= $this->Form->label('calculo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('calculo'); ?> 
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
            <?= $this->Form->label('unidade_id', 'Unidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('unidade_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('ambito_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('ambito_id'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $this->Form->value('Indicadore.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Indicadore.nombre'))); ?>                                <?= $this->Html->link(__('Listado de Indicadores'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidad'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

            <h4 class="text-muted">Alerta</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Alertas'), array('controller' => 'alertas', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Alerta'), array('controller' => 'alertas', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

