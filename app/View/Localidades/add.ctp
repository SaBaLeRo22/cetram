<?php 
/**
 * @var $this View
 */
?><div class="row localidades form">
    <div class="col-md-9">
                <h2><?= __('Editar Localidad') ?></h2>
                <hr/>

        <?= $this->Form->create('Localidade', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('provincia_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('provincia_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('codigopostal', 'CP', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('codigopostal'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Localidades'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Provincia</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Provincias'), array('controller' => 'provincias', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Provincia'), array('controller' => 'provincias', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

        </div>
    </div>
</div>

