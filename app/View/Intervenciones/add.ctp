<?php 
/**
 * @var $this View
 */
?><div class="row intervenciones form">
    <div class="col-md-9">
                <h2><?= __('Editar Intervencion') ?></h2>
                <hr/>

        <?= $this->Form->create('Intervencione', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('coeficiente_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('coeficiente_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('item_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('item_id'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Intervenciones'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Coeficientes'), array('controller' => 'coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Coeficiente'), array('controller' => 'coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Item</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Items'), array('controller' => 'items', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Item'), array('controller' => 'items', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
        </div>
    </div>
</div>

