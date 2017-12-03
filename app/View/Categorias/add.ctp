<?php 
/**
 * @var $this View
 */
?><div class="row categorias form">
    <div class="col-md-9">
                <h2><?= __('Editar Categoria') ?></h2>
                <hr/>

        <?= $this->Form->create('Categoria', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('cantidad', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('cantidad'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('antiguedad', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('antiguedad'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Categorias'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>

        </div>
    </div>
</div>

