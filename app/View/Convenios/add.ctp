<?php 
/**
 * @var $this View
 */
?><div class="row convenios form">
    <div class="col-md-9">
                <h2><?= __('Editar Convenio') ?></h2>
                <hr/>

        <?= $this->Form->create('Convenio', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('anio', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('anio'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('inio', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('inio'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('fin', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('fin'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('observaciones', null, array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('observaciones', array('type' => 'textarea')); ?>
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
                                                <?= $this->Html->link(__('Listado de Convenios'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Salario</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Salarios'), array('controller' => 'salarios', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Salario'), array('controller' => 'salarios', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Viatico</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Viaticos'), array('controller' => 'viaticos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Viatico'), array('controller' => 'viaticos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

