<?php 
/**
 * @var $this View
 */
?><div class="row estados form">
    <div class="col-md-9">
                <h2><?= __('Editar Estado') ?></h2>
                <hr/>

        <?= $this->Form->create('Estado', array('class' => 'form-horizontal')); ?>
 
                     
        <?= $this->Form->input('id'); ?>  
                                                    <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
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
                <?= $this->Html->link(__('Listado de Estados'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>

        </div>
    </div>
</div>

