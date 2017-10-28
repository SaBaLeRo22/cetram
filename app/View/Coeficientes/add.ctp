<?php 
/**
 * @var $this View
 */
?><div class="row coeficientes form">
    <div class="col-md-9">
                <h2><?= __('Editar Coeficiente') ?></h2>
                <hr/>

        <?= $this->Form->create('Coeficiente', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
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
            <?= $this->Form->label('ambito_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('ambito_id'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Coeficientes'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Intervencion</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Intervenciones'), array('controller' => 'intervenciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Intervencion'), array('controller' => 'intervenciones', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Matriz</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Matrices'), array('controller' => 'matrices', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Matriz'), array('controller' => 'matrices', 'action' => 'add'), array('class' => 'list-group-item')); ?>
 
            </div>
        </div>
    </div>
</div>

