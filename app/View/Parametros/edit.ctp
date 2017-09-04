<?php 
/**
 * @var $this View
 */
?><div class="row parametros form">
    <div class="col-md-9">
                <h2><?= __('Editar Parametro') ?></h2>
                <hr/>

        <?= $this->Form->create('Parametro', array('class' => 'form-horizontal')); ?>
 
                     
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
            <?= $this->Form->label('valor', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('valor'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('unidade_id', null, array('class' => 'control-label col-xs-3')); ?> 
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
                                                    <div class="form-group">
            <?= $this->Form->label('estado_id', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('estado_id'); ?> 
        </div>
                                                                                                                    <div class="form-group">
            <?= $this->Form->label('user_created', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_created'); ?> 
        </div>
                                                    <div class="form-group">
            <?= $this->Form->label('user_modified', null, array('class' => 'control-label col-xs-3')); ?> 
            <?= $this->Form->input('user_modified'); ?> 
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
                                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Parametro.id')), array('class' => 'list-group-item'), __('Se va a eliminar %s ¿Confirma la eliminación?', $this->Form->value('Parametro.nombre'))); ?>                                <?= $this->Html->link(__('Listado de Parametros'), array('action' => 'index'), array('class' => 'list-group-item')); ?>
                            </div>
            <h4 class="text-muted">Unidade</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Unidades'), array('controller' => 'unidades', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Unidade'), array('controller' => 'unidades', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
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
            <h4 class="text-muted">Estado</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Estados'), array('controller' => 'estados', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Estado'), array('controller' => 'estados', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
            </div>
            <h4 class="text-muted">Participacione</h4>
            <div class="list-group">
                		<?= $this->Html->link(__('Listado de  Participaciones'), array('controller' => 'participaciones', 'action' => 'index'), array('class' => 'list-group-item')); ?> 
		<?= $this->Html->link(__('Agregar Participacione'), array('controller' => 'participaciones', 'action' => 'add'), array('class' => 'list-group-item')); ?> 
 
            </div>
        </div>
    </div>
</div>

