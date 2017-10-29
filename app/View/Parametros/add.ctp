<?php 
/**
 * @var $this View
 */
?><div class="row parametros form">
    <div class="col-md-9">
                <h2><?= __('Editar Parametro') ?></h2>
                <hr/>

        <?= $this->Form->create('Parametro', array('class' => 'form-horizontal')); ?>
 
                            <div class="form-group">
            <?= $this->Form->label('nombre', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('nombre'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('descripcion', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('descripcion'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('valor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('valor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidade_id', 'Unidad', array('class' => 'control-label col-xs-3')); ?>
            <?= $this->Form->input('unidade_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('tipo_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('tipo_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('ambito_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('ambito_id'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('editable', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('editable'); ?> 
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
            <?= $this->Form->label('tipo', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('tipo'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('step', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('step'); ?> 
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
                                                <?= $this->Html->link(__('Listado de Parametros'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Unidad</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidad'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?>
            </div>
            <h4 class="text-muted">Tipo</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Tipos'), array('controller' => 'tipos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Tipo'), array('controller' => 'tipos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Ambito</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Ambitos'), array('controller' => 'ambitos', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Ambito'), array('controller' => 'ambitos', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>

            <h4 class="text-muted">Participacion</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Participaciones'), array('controller' => 'participaciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Participacion'), array('controller' => 'participaciones', 'action' => 'add'), array('class' => 'list-group-item')); ?>
 
            </div>
        </div>
    </div>
</div>

