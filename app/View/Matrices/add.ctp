<?php 
/**
 * @var $this View
 */
?><div class="row matrices form">
    <div class="col-md-9">
                <h2><?= __('Editar Matrix') ?></h2>
                <hr/>

        <?= $this->Form->create('Matrix', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('coeficiente_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('coeficiente_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('multiplicadore_id', 'Multiplicador', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('multiplicadore_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('peso', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('peso'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Matrices'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Coeficiente</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Coeficientes'), array('controller' => 'coeficientes', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Coeficiente'), array('controller' => 'coeficientes', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Multiplicador</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Multiplicadores'), array('controller' => 'multiplicadores', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Multiplicador'), array('controller' => 'multiplicadores', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>

        </div>
    </div>
</div>

